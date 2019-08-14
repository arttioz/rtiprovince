<?php namespace App\Http\Controllers;

use App\Models\Recoverydata;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
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

	public function index( Request $request )
	{		
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


}