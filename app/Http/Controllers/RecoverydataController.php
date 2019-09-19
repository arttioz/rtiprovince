<?php namespace App\Http\Controllers;

use App\Models\deathdata;
use App\Models\location;
use App\Models\Recoverydata;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Illuminate\Support\Facades\Auth;
use Validator, Input, Redirect ;


class RecoverydataController extends Controller {

	protected $layout = "layouts.main";
	protected $data = array();	
	public $module = 'recoverydata';
	static $per_page	= '10';

	public function __construct()
	{
		parent::__construct();
		$this->model = new Recoverydata();
		$this->info = $this->model->makeInfo( $this->module);
		$this->access = array();
	
		$this->data = array_merge(array(
			'pageTitle'	=> 	$this->info['title'],
			'pageNote'	=>  $this->info['note'],
			'pageModule'=> 'recoverydata',
			'return'	=> self::returnUrl()
			
		),$this->data);

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

	public function index(Request $request)
	{
        $this->checkAuth();

//        $start = $request->input('start');
//        $end = $request->input('end');
//
//        if($start && $end){
//            $dateStart =  Carbon::createFromFormat('Y-m-d', date($start));
//            $dateEnd =  Carbon::createFromFormat('Y-m-d', date($end));
//        }else{
//            $dateStart = Carbon::now()->startOfMonth();
//            $dateEnd =  Carbon::now();
//        }
//
//
//        $locations = location::all();
//        if( Auth::user()->group_id == 3){
//            $province_id =  Auth::user()->province_id;
//            $this->data['locations'] = location::where("LOC_CODE",$province_id)->get();
//
//        }else {
//            $province_id = $request->input('province_id');
//            $this->data['locations'] = $locations;
//        }
//
//        $citizen_id = $request->input('citizen_id');
//
//        $this->data['startdate'] = $dateStart->format('Y-m-d');
//        $this->data['enddate'] = $dateEnd->format('Y-m-d');
//
//        $dateStart = $dateStart->addYear(543)->subDay(1);
//        $dateEnd = $dateEnd->addYear(543);

        $deaths = deathdata::withTrashed()->whereNotNull("deleted_at");

//        $deaths = $deaths->whereBetween('DeadDate', [$dateStart, $dateEnd]);

//        if($province_id){
//            $deaths = $deaths->where(
//                function($query) use ($province_id) {
//                    $query->where('dead_conso.AccProv', '=', $province_id)
//                        ->orWhere('dead_conso.DeathProv', '=', $province_id);
//                });
//        }
//
//        if(strlen($citizen_id) > 0){
//            $deaths = $deaths->where('DrvSocNO', $citizen_id);
//        }

        $deaths = $deaths->paginate(10);
//
//        $location_arr = [];
//        foreach ($locations as $location){
//            $location_arr[$location->LOC_CODE] = $location->LOC_PROVINCE;
//        }
//        foreach ($deaths as $row){
//
//            if (array_key_exists($row->AccProv,$location_arr)){
//                $row->AccProv = $location_arr[$row->AccProv] ;
//            }
//
//            if (array_key_exists($row->DeathProv,$location_arr)){
//                $row->DeathProv = $location_arr[$row->DeathProv] ;
//            }
//        }

//        $this->data['province_id'] = $province_id;
        $this->data['recovery_data'] = $deaths;

		return view('recoverydata.index',$this->data);
	}
	function show(Request $request, $id = null)
	{
		return view('recoverydata.view',$this->data);
	}	
	public function create( $id = null)
	{		
		return view('recoverydata.form',$this->data);	
	}	
	public function edit( $id = null)
	{		
		return view('recoverydata.form',$this->data);	
	}	
	function store( Request $request)
	{
	}
	public function destroy( Request $request)
	{
	}			

	public function recovery(Request $request)
    {
        $this->checkAuth();
//        dd($request);
        $return_url = $request->input('return');
        $id = $request->input('id');

        deathdata::withTrashed()->where("id",$id)->restore();
        return redirect( $return_url )->with('message',__('core.note_success'))->with('status','success');
    }

}