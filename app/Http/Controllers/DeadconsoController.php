<?php namespace App\Http\Controllers;

use App\Models\Deadconso;
use App\Models\deadcosoextra;
use App\Models\location;
use App\Models\deadconsohistory;
use App\Models\ritfiled;
use App\Models\rtiprovincefiled;
use App\Models\typefiled;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Validator, Input, Redirect ;


class DeadconsoController extends Controller {

	protected $layout = "layouts.main";
	protected $data = array();
	public $module = 'deadconso';
	public $sidebar = 'layouts';
	static $per_page	= '10';

	public function __construct()
	{
		parent::__construct();
		$this->model = new Deadconso();

		$this->info = $this->model->makeInfo( $this->module);
		$this->data = array(
			'pageTitle'	=> 	$this->info['title'],
			'pageNote'	=>  $this->info['note'],
			'pageModule'=> 'deadconso',
			'return'	=> self::returnUrl()
		);

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


	public function index( Request $request )
	{
        $province_id =  Auth::user()->province_id;
        $this->checkAuth();
		// Make Sure users Logged
		if(!\Auth::check())
			return redirect('user/login')->with('status', 'error')->with('message','You are not login');
		$this->grab( $request) ;
		if($this->access['is_view'] ==0)
			return redirect('dashboard')->with('message', __('core.note_restric'))->with('status','error');
		// Render into template
//		return view( $this->module.'.index',$this->data);
		return redirect( 'deadconso/create?province_id='.$province_id);
	}

	function create( Request $request , $id =0 ){
	    $this->checkAuth();
		$this->hook( $request  );
		if($this->access['is_add'] ==0)
			return redirect('dashboard')->with('message', __('core.note_restric'))->with('status','error');

		$this->data['row'] = $this->model->getColumnTable( $this->info['table']);
        $this->data['url'] =  \Illuminate\Support\Facades\Input::get('return');


//        $province_id = 10;
        if( Auth::user()->group_id == 3){
            $province_id =  Auth::user()->province_id;
        }else {
            if($request->input('province_id')){
                $province_id = $request->input('province_id');
            }
        }

        $this->data['url'] =  \Illuminate\Support\Facades\Input::get('return');
        $this->data['AccProv'] = location::where("LOC_CODE",$province_id)->first();
        $this->data['DeathProv'] = location::where("LOC_CODE",$province_id)->first();

        // จัดการตัวแปร
        $rti_provinces = rtiprovincefiled::where('province_code',$request->province_id)
                ->with('rti_fields','inputtypefield')
                ->get();

//        echo $rti_provinces.'<br>';
//        dd();
        $rti_field = deadcosoextra::where('dead_coso_id',$id)
            ->where('province_code', $request->province_id)
            ->pluck('option_data');

        $location = location::all();
        $this->data['location'] = $location;
        $this->data['province_id'] = $request->province_id;

		$this->data['id'] = '';
		$this->data['rti_field'] = '';

		return view($this->module.'.form',$this->data)->with('rti_provinces', $rti_provinces);
	}
	function edit( Request $request , $id ) {
	    $this->checkAuth();
		$this->hook( $request , $id );
		if(!isset($this->data['row']))
			return redirect($this->module)->with('message','Record Not Found !')->with('status','error');
		if($this->access['is_edit'] ==0 )
			return redirect('dashboard')->with('message',__('core.note_restric'))->with('status','error');
		$this->data['row'] = (array) $this->data['row'];

        $this->data['url'] =  \Illuminate\Support\Facades\Input::get('return');
		$this->data['AccProv'] = location::where("LOC_CODE",$this->data['row']['AccProv'])->first();
        $this->data['DeathProv'] = location::where("LOC_CODE",$this->data['row']['DeathProv'])->first();


        //Convert Dead Date
        $deadDate = $this->data['row']['DeadDate'];
        $dead_date = new Carbon($deadDate);
        $dead_date = $dead_date->subYear(543);
        $this->data['row']['DeadDate'] = $dead_date->format('Y-m-d');

        //Convert Birth Date
        $birthDate = $this->data['row']['BirthDate'];
        $birth_date = new Carbon($birthDate);
        $birth_date = $birth_date->subYear(543);
//        dd($birth_date);
        $this->data['row']['BirthDate'] = $birth_date->format('Y-m-d');

        //จัดการตัวแปล
        $rti_provinces = rtiprovincefiled::where('province_code',$request->province_id)
            ->with('rti_fields','inputtypefield')
            ->get();
        $rti_field = deadcosoextra::where('dead_coso_id',$id)
            ->where('province_code', $request->province_id)
            ->pluck('option_data');
//        dump($rti_provinces);
//        dump($rti_field);
//        dd();
        $location = location::all();
        $this->data['location'] = $location;

        $this->data['province_id'] = $request->province_id;

		$this->data['id'] = $id;
		$this->data['rti_provinces'] = $rti_provinces;
		$this->data['rti_field'] = $rti_field;

		return view($this->module.'.form',$this->data);
	}
	function show( Request $request , $id )
	{$this->checkAuth();
		/* Handle import , export and view */
		$task =$id ;
		switch( $task)
		{
			case 'search':
				return $this->getSearch();
				break;
			case 'lookup':
				return $this->getLookup($request );
				break;
			case 'comboselect':
				return $this->getComboselect( $request );
				break;
			case 'import':
				return $this->getImport( $request );
				break;
			case 'export':
				return $this->getExport( $request );
				break;
			default:
				$this->hook( $request , $id );
				if(!isset($this->data['row']))
					return redirect($this->module)->with('message','Record Not Found !')->with('status','error');

				if($this->access['is_detail'] ==0)
					return redirect('dashboard')->with('message', __('core.note_restric'))->with('status','error');

				return view($this->module.'.view',$this->data);
				break;
		}
	}
	function store( Request $request  )
	{
//	    dd($request->all());

	    $this->checkAuth();
//	    $url = $request->input('url');
	    $url = 'deathdata';
		$task = $request->input('action_task');
		switch ($task)
		{
			default:
				$rules = $this->validateForm();
				$validator = Validator::make($request->all(), $rules);
				if ($validator->passes())
				{
					$data = $this->validatePost( $request );

                    $dead_date = Carbon::createFromFormat('Y-m-d', $data['DeadDate']);
                    try{
                        $birth_date = Carbon::createFromFormat('Y-m-d', $data['BirthDate']);
                    }catch (\Exception $e){
                        $birth_date = Carbon::now();
                    }

                    $now = Carbon::now();

                    if($dead_date->year < 2030 ){
                        $data['DeadDate'] = $dead_date->addYear(543);
                        $data['DeadDate'] = $dead_date->format('Y-m-d');
                    }

                    if($birth_date->year < 2030 ){
                        $data['BirthDate'] = $birth_date->addYear(543);
                        $data['BirthDate'] = $birth_date->format('Y-m-d');
                    }

                    $upload_name = Auth::user()->first_name." ".Auth::user()->last_name;
                    $upload_id =Auth::user()->id;

                    $data['upload_by'] = $upload_id;
                    $data['upload_name'] = $upload_name;
                    $data['IS_UPLOAD'] = "Y";
                    $data['IS_UPLOAD'] = "Y";

                    $data['road_type'] = $request->road_type;
                    $data['road_department'] = $request->road_department;
                    $data['risk'] = $request->risk;

					$id = $this->model->insertRow($data , $request->input( $this->info['key']));

                    // Save to dead_coso_extra DB
                    $rti_provinces = rtiprovincefiled::where('province_code',$request->province_id)
                        ->with('rti_fields','inputtypefield')
                        ->get();
                    $dead_coso_extra = new deadcosoextra();
                    $dead_coso_extra->province_code = $request->AccProv;
                    $dead_coso_extra->dead_coso_id = $id;
                    $array = array();
                    if ($rti_provinces) {
                        foreach ($rti_provinces as $rti_province) {
                            $name_field = $rti_province->rti_fields->name;
                            $array[$name_field] = $request->$name_field;
                        }
                    }
//                    $array = json_encode($array);
                    $dead_coso_extra->option_data = $array;
                    $dead_coso_extra->save();

                    //Save Data Edit History
                    $deadconsohistory = new deadconsohistory();
                    $deadconsohistory['id_dead_conso'] = $request->id;
                    $deadconsohistory['DEAD_CONSO_ID'] = $request->DEAD_CONSO_ID;
                    $deadconsohistory['DEAD_YEAR'] = $request->DEAD_YEAR;
                    $deadconsohistory['Fname'] = $request->Fname;
                    $deadconsohistory['Lname'] = $request->Lname;
                    $deadconsohistory['Prefix'] = $request->Prefix;
                    $deadconsohistory['DrvSocNO'] = $request->DrvSocNO;
                    $deadconsohistory['Age'] = $request->Age;
                    $deadconsohistory['Sex'] = $request->Sex;
                    $deadconsohistory['BirthDate'] = $request->BirthDate;
                    $deadconsohistory['DeadDate'] = $request->DeadDate;
                    $deadconsohistory['AccSubDist'] = $request->AccSubDist;
                    $deadconsohistory['AccDist'] = $request->AccDist;
                    $deadconsohistory['AccProv'] = $request->AccProv;
                    $deadconsohistory['AccLatlong'] = $request->AccLatlong;
                    $deadconsohistory['Acclong'] = $request->Acclong;
                    $deadconsohistory['NCAUSE'] = $request->NCAUSE;
                    $deadconsohistory['DeathProv'] = $request->DeathProv;
                    $deadconsohistory['Vehicle'] = $request->Vehicle;
                    $deadconsohistory['upload_by'] = $request->upload_by;
                    $deadconsohistory['upload_name'] = $request->upload_name;
                    $deadconsohistory['IS_UPLOAD'] = $request->IS_UPLOAD;
                    $deadconsohistory['road_type'] = $request->road_type;
                    $deadconsohistory['road_department'] = $request->road_department;
                    $deadconsohistory['risk'] = $request->risk;
                    $deadconsohistory->save();

                    /* Insert logs */
					$this->model->logs($request , $id);
					if(!is_null($request->input('apply')))
						return redirect( $this->module .'/'.$id.'/edit?'. $this->returnUrl() )->with('message',__('core.note_success'))->with('status','success');

					return redirect( $url )->with('message',__('core.note_success'))->with('status','success');
                }
				else {
					return redirect($this->module.'/'. $request->input(  $this->info['key'] ).'/edit')
							->with('message',__('core.note_error'))->with('status','error')
							->withErrors($validator)->withInput();

				}
				break;
			case 'public':
				return $this->store_public( $request );
				break;

			case 'delete':
				$result = $this->destroy( $request );
				return redirect($this->module.'?'.$this->returnUrl())->with($result);
				break;

			case 'import':
				return $this->PostImport( $request );
				break;

			case 'copy':
				$result = $this->copy( $request );
				return redirect($this->module.'?'.$this->returnUrl())->with($result);
				break;
		}

	}

	public function destroy( $request)
	{$this->checkAuth();
		// Make Sure users Logged
		if(!\Auth::check())
			return redirect('user/login')->with('status', 'error')->with('message','You are not login');

		$this->access = $this->model->validAccess($this->info['id'] , session('gid'));
		if($this->access['is_remove'] ==0)
			return redirect('dashboard')
				->with('message', __('core.note_restric'))->with('status','error');
		// delete multipe rows
		if(count($request->input('ids')) >=1)
		{
			$this->model->destroy($request->input('ids'));

			\SiteHelpers::auditTrail( $request , "ID : ".implode(",",$request->input('ids'))."  , Has Been Removed Successfull");
			// redirect
        	return ['message'=>__('core.note_success_delete'),'status'=>'success'];

		} else {
			return ['message'=>__('No Item Deleted'),'status'=>'error'];
		}

	}

	public static function display(  )
	{
		$mode  = isset($_GET['view']) ? 'view' : 'default' ;
		$model  = new Deadconso();
		$info = $model::makeInfo('deadconso');
		$data = array(
			'pageTitle'	=> 	$info['title'],
			'pageNote'	=>  $info['note']
		);
		if($mode == 'view')
		{
			$id = $_GET['view'];
			$row = $model::getRow($id);
			if($row)
			{
				$data['row'] =  $row;
				$data['fields'] 		=  \SiteHelpers::fieldLang($info['config']['grid']);
				$data['id'] = $id;
				return view('deadconso.public.view',$data);
			}
		}
		else {

			$page = isset($_GET['page']) ? $_GET['page'] : 1;
			$params = array(
				'page'		=> $page ,
				'limit'		=>  (isset($_GET['rows']) ? filter_var($_GET['rows'],FILTER_VALIDATE_INT) : 10 ) ,
				'sort'		=> $info['key'] ,
				'order'		=> 'asc',
				'params'	=> '',
				'global'	=> 1
			);

			$result = $model::getRows( $params );
			$data['tableGrid'] 	= $info['config']['grid'];
			$data['rowData'] 	= $result['rows'];

			$page = $page >= 1 && filter_var($page, FILTER_VALIDATE_INT) !== false ? $page : 1;
			$pagination = new Paginator($result['rows'], $result['total'], $params['limit']);
			$pagination->setPath('');
			$data['i']			= ($page * $params['limit'])- $params['limit'];
			$data['pagination'] = $pagination;
			return view('deadconso.public.index',$data);
		}

	}
	function store_public( $request)
	{
		$rules = $this->validateForm();
		$validator = Validator::make($request->all(), $rules);
		if ($validator->passes()) {
			$data = $this->validatePost(  $request );
			 $this->model->insertRow($data , $request->input('id'));
			return  Redirect::back()->with('message',__('core.note_success'))->with('status','success');
		} else {

			return  Redirect::back()->with('message',__('core.note_error'))->with('status','error')
			->withErrors($validator)->withInput();

		}

	}

    function convertDate($date)
    {
        try {
            $dateCarbon = new Carbon($date);

        } catch (\Exception $exception) {

        }
    }
}
