<?php namespace App\Http\Controllers;

use App\Models\deadconso;
use App\Models\deadcosoextra;
use App\Models\location;
use App\Models\rtiprovincefiled;
use App\Models\Viewdeadconso;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Collection;
use Validator, Input, Redirect ;


class ViewdeadconsoController extends Controller {

	protected $layout = "layouts.main";
	protected $data = array();
	public $module = 'viewdeadconso';
	static $per_page	= '10';

	public function __construct()
	{
		parent::__construct();
		$this->model = new Viewdeadconso();
		$this->info = $this->model->makeInfo( $this->module);
		$this->access = array();

		$this->data = array_merge(array(
			'pageTitle'	=> 	$this->info['title'],
			'pageNote'	=>  $this->info['note'],
			'pageModule'=> 'viewdeadconso',
			'return'	=> self::returnUrl()

		),$this->data);


	}

	public function index( Request $request )
	{
		return view('viewdeadconso.index',$this->data);
	}
	function show(Request $request, $id)
	{
        $this->checkAuth();
        $this->hook( $request , $id );


        if(!isset($this->data['row']))
            return redirect($this->module)->with('message','Record Not Found !')->with('status','error');

//        if($this->access['is_detail'] ==0)
//            return redirect('deathdata')->with('message', __('core.note_restric'))->with('status','error');

        $AccProv = location::where('LOC_CODE', $this->data['row']->AccProv)->first();
        $this->data['row']->AccProv = $AccProv->LOC_PROVINCE;

        $DeathProv = location::where('LOC_CODE', $this->data['row']->DeathProv)->first();
        $this->data['row']->DeathProv = $DeathProv->LOC_PROVINCE;

        if ($this->data['row']->Sex === '1') {
            $this->data['row']->Sex = 'ชาย';
        } else {
            $this->data['row']->Sex = 'หญิง';
        }

        if ($this->data['row']->road_type === '1') {
            $this->data['row']->road_type = 'ถนนลูกรัง';
        } else if($this->data['row']->road_type === '2') {
            $this->data['row']->road_type = 'ถนนคอนกรีต';
        } else if ( $this->data['row']->road_type === '3') {
            $this->data['row']->road_type = 'ถนนลาดยาง';
        } else {
            $this->data['row']->road_type = '';
        }
        if ($this->data['row']->road_department === '1') {
            $this->data['row']->road_department = 'กรมทางหลวงชนบท';
        } else if($this->data['row']->road_department === '2') {
            $this->data['row']->road_department = 'กรมทางหลวงท้องถิ่น';
        } else if ( $this->data['row']->road_department === '3') {
            $this->data['row']->road_department = 'กรมทางหลวงสัมปทาน';
        } else {
            $this->data['row']->road_department = '';
        }
        if ($this->data['row']->risk === '1') {
            $this->data['row']->risk = 'แอลกอฮอล';
        } else if($this->data['row']->risk === '2') {
            $this->data['row']->risk = 'หมวกนิรภัย(เฉพาะจยย)';
        } else if ($this->data['row']->risk === '3') {
            $this->data['row']->risk = 'เข็มขัดนิรภัย (เฉพาะรถ)';
        } else if ($this->data['row']->risk === '4') {
            $this->data['row']->risk = 'ยา  ';
        } else if ($this->data['row']->risk === '5') {
            $this->data['row']->risk = 'โทรศัพท์';
        }else {
            $this->data['row']->risk = '';
        }

        $rti_field = deadcosoextra::where('dead_coso_id',$id)->first();
        if (!$rti_field) {
            $this->data['rti_fields'] = '';
            $this->data['rti_provinces'] = '';
        } else {
            $rti_field->option_data = collect([$rti_field->option_data]);
            $this->data['rti_fields'] = $rti_field->option_data;
            $rti_provinces = rtiprovincefiled::where('province_code',$rti_field->province_code)
                ->with('rti_fields','inputtypefield')
                ->get();
            $this->data['rti_provinces'] = $rti_provinces;
        }

        $this->data['row'] = (array) $this->data['row'];

		return view('viewdeadconso.view',$this->data);
	}
	public function create( $id = null)
	{
		return view('viewdeadconso.form',$this->data);
	}
	public function edit( $id = null)
	{
		return view('viewdeadconso.form',$this->data);
	}
	function store( Request $request)
	{

	}
	public function destroy( Request $request)
	{


	}
    public function checkAuth(){
        if(!Auth::check()){
            return redirect()->guest('user/login');
        }

        if(Auth::user()->active =='0')
        {
            // inactive
            Auth::logout();
            return redirect('user/login')->with(['message'=>'Your Account is not active','status'=>'error']);

        } else if(Auth::user()->active=='2')
        {
            // BLocked users
            Auth::logout();
            return redirect('user/login')->with(['message'=>'Your Account is BLocked','status'=>'error']);
        }
    }

}
