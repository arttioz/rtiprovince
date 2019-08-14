<?php namespace App\Http\Controllers;

use App\Models\Dashboardrti;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Validator, Input, Redirect ; 


class DashboardrtiController extends Controller {

	protected $layout = "layouts.main";
	protected $data = array();	
	public $module = 'dashboardrti';
	static $per_page	= '10';

	public function __construct()
	{
		parent::__construct();
		$this->model = new Dashboardrti();
		$this->info = $this->model->makeInfo( $this->module);
		$this->access = array();
	
		$this->data = array_merge(array(
			'pageTitle'	=> 	$this->info['title'],
			'pageNote'	=>  $this->info['note'],
			'pageModule'=> 'dashboardrti',
			'return'	=> self::returnUrl()
			
		),$this->data);

		
	}

	public function index( Request $request )
	{
	    //TODO: Pull data here

		return view('dashboardrti.index',$this->data);
	}
	function show(Request $request, $id = null)
	{
		return view('dashboardrti.view',$this->data);
	}	
	public function create( $id = null)
	{		
		return view('dashboardrti.form',$this->data);	
	}	
	public function edit( $id = null)
	{		
		return view('dashboardrti.form',$this->data);	
	}	
	function store( Request $request)
	{		
	
	}
	public function destroy( Request $request)
	{
		
		
	}			


}