<?php namespace App\Http\Controllers;

use App\Models\deathdata;
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
//        $deaths = deathdata::query();
        $deaths = deathdata::withTrashed()->whereNotNull("deleted_at");
        $deaths = $deaths->paginate(10);
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

        $return_url = $request->input('return');

        $id = $request->input('id');
        deathdata::withTrashed()->where("id",$id)->restore();

        return redirect( $return_url )->with('message',__('core.note_success'))->with('status','success');
    }

}