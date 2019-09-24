<?php namespace App\Http\Controllers;

use App\Models\Deathdata;
use App\Models\location;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Validator, Input, Redirect ;


class DeathdataController extends Controller {

    protected $layout = "layouts.main";
    protected $data = array();
    public $module = 'deathdata';
    static $per_page	= '10';

    public function __construct()
    {
        parent::__construct();
        $this->model = new Deathdata();
        $this->info = $this->model->makeInfo( $this->module);
        $this->access = array();

        $this->data = array_merge(array(
            'pageTitle'	=> 	$this->info['title'],
            'pageNote'	=>  $this->info['note'],
            'pageModule'=> 'deathdata',
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

    public function index( Request $request )
    {
        $this->checkAuth();
        $start = $request->input('start');
        $end = $request->input('end');

        if($start && $end){
            $dateStart =  Carbon::createFromFormat('Y-m-d', date($start));
            $dateEnd =  Carbon::createFromFormat('Y-m-d', date($end));
        }else{
            $dateStart = Carbon::now()->startOfMonth();
            $dateEnd =  Carbon::now();
        }


        $locations = location::all();
        if( Auth::user()->group_id == 3){
            $province_id =  Auth::user()->province_id;
            $this->data['locations'] = location::where("LOC_CODE",$province_id)->get();

        }else {
            $province_id = $request->input('province_id');
            $this->data['locations'] = $locations;
        }

        $this->data['startdate'] = $dateStart->format('Y-m-d');
        $this->data['enddate'] = $dateEnd->format('Y-m-d');

        $dateStart = $dateStart->addYear(543)->subDay(1);
        $dateEnd = $dateEnd->addYear(543);

//        $deaths = deathdata::query();
//        $deaths = $deaths->whereNull("deleted_at");
//
//        $deaths = $deaths->whereBetween('DeadDate', [$dateStart, $dateEnd]);

        //Check User level
        if (Auth::user()->user_level == "1") { //User ระดับเขต

            $district_code =  Auth::user()->district_code;
            $district_province = location::where('HEALTH_DISTRICT',$district_code)->pluck('LOC_CODE');
            $deaths = deathdata::query();
            $deaths = $deaths->whereIn("AccProv",$district_province)->whereNull("deleted_at");
            $deaths = $deaths->whereBetween('DeadDate', [$dateStart, $dateEnd]);

        }else if(Auth::user()->user_level == "2") { //User ระดับจังหวัด

            $user_province_id =  Auth::user()->province_id;
            if ($user_province_id == null) {
                Auth::logout();
                return redirect('user/login')->with(['message'=>'บัญชีนี้เป็นบัญชีผู้ใช้ที่ก่า กรุณาสมัครใหม่หรือติดต่อเจ้าหน้าที่เพื่อเข้าสู่ระบบ','status'=>'error']);
            } else {
                $deaths = deathdata::query();
                $deaths = $deaths->where('AccProv', $user_province_id)->whereNull("deleted_at");
                $deaths = $deaths->whereBetween('DeadDate', [$dateStart, $dateEnd]);
            }

        }else {
            Auth::logout();
            return redirect('user/login')->with(['message'=>'บัญชีนี้เป็นบัญชีผู้ใช้ที่ก่า กรุณาสมัครใหม่หรือติดต่อเจ้าหน้าที่เพื่อเข้าสู่ระบบ','status'=>'error']);
        }

        if($province_id){
            $deaths = $deaths->where(
                function($query) use ($province_id) {
                    $query->where('dead_conso.AccProv', '=', $province_id)
                        ->orWhere('dead_conso.DeathProv', '=', $province_id);
                });
        }

        $citizen_id = $request->input('citizen_id');
        if(strlen($citizen_id) > 0){
            $deaths = $deaths->where('DrvSocNO', $citizen_id);
        }

        $deaths = $deaths->paginate(10);


        $location_arr = [];
        foreach ($locations as $location){
            $location_arr[$location->LOC_CODE] = $location->LOC_PROVINCE;
        }
        foreach ($deaths as $row){

            if (array_key_exists($row->AccProv,$location_arr)){
                $row->AccProv = $location_arr[$row->AccProv] ;
            }

            if (array_key_exists($row->DeathProv,$location_arr)){
                $row->DeathProv = $location_arr[$row->DeathProv] ;
            }
        }

        $this->data['deaths'] = $deaths;
//        $this->data['daterange'] = $daterange;
        $this->data['province_id'] = $province_id;
        $this->data['user_level'] = Auth::user()->user_level;
        return view('deathdata.index',$this->data);
    }

    public function show(Request $request, $id = null)
    {
        return view('deathdata.view',$this->data);
    }
    public function create( $id = null)
    {
        return view('deathdata.form',$this->data);
    }

    public function edit( $id = null)
    {
        return view('deathdata.form',$this->data);
    }



    function store( Request $request)
    {
        //https://itsolutionstuff.com/post/laravel-56-import-export-to-excel-and-csv-exampleexample.html
        //https://itsolutionstuff.com/post/laravel-57-import-export-excel-to-database-exampleexample.html

        $this->checkAuth();


        $request->validate([
            'import_file' => 'required'
        ]);

        $excel = App::make('excel');

        $path = $request->file('import_file')->getRealPath();
        $data =  $excel->load($path)->get();

        if($data->count()){



            $province_data = null;
            $upload_name = Auth::user()->first_name." ".Auth::user()->last_name;
            $upload_id =Auth::user()->id;

            foreach ($data as $key => $value) {


                $accidentProv = "";
                $deathProv = "";
                if($province_data == null){


                    $accidentProv = location::where("LOC_PROVINCE",$value->accidentprovince)->first();
                    $deathProv = location::where("LOC_PROVINCE",$value->deathprovince)->first();

                    if($accidentProv != null){
                        $accidentProv = $accidentProv->LOC_CODE;
                    }

                    if($deathProv != null){
                        $deathProv = $deathProv->LOC_CODE;
                    }
                }

                if($value->sex == "ชาย"){
                    $value->sex = 1;
                }else if($value->sex == "หญิง"){
                    $value->sex = 2;
                }

                $death = deathdata::where("DrvSocNO",$value->citizenid)->whereNull("deleted_at")->first();

                try{
                    $value->birthdate = Carbon::createFromFormat( "d/m/Y", $value->birthdate);
                }catch (\Exception $exception){
                    $value->birthdate = null;
                }

                try{
                    $value->deaddate = Carbon::createFromFormat( "d/m/Y", $value->deaddate);
                }catch (\Exception $exception){

                }



                if($death){
                    if($value->prefix != "") $death->Prefix = $value->prefix;
                    if($value->fname != "") $death->Fname = $value->fname;
                    if($value->lname != "") $death->Lname = $value->lname;
                    if($value->citizenid != "") $death->DrvSocNO = $value->citizenid;
                    if($value->age != "") $death->Age = $value->age;
                    if($value->sex != "") $death->Sex = $value->sex;
                    if($value->birthdate) $death->BirthDate = $value->birthdate;
                    if($value->deaddate) $death->DeadDate = $value->deaddate;
                    if($value->accidenttumbol != "") $death->AccSubDist = $value->accidenttumbol;
                    if($value->accidentdistrict != "") $death->AccDist = $value->accidentdistrict;
                    if($value->icd10 != "") $death->NCAUSE = $value->icd10;
                    if($value->vehicle != "") $death->Vehicle = $value->vehicle;
                    if($accidentProv != "") $death->AccProv = $accidentProv;
                    if($deathProv != "") $death->DeathProv = $deathProv;
                    if($value->latitude!= "") $death->AccLatlong = $value->latitude;
                    if($value->longitude!= "") $death->Acclong = $value->longitude;

                    $death->upload_by = $upload_id;
                    $death->upload_name = $upload_name;
                    $death->IS_UPLOAD = "Y";

                    $death->save();
                }else {
                    $arr[] = ['Prefix' => $value->prefix,
                        'Fname' => $value->fname,
                        'Lname' => $value->lname,
                        'DrvSocNO' => $value->citizenid,
                        'Age' => $value->age,
                        'Sex' => $value->sex,
                        'BirthDate' => $value->birthdate,
                        'DeadDate' => $value->deaddate,
                        'AccSubDist' => $value->accidenttumbol,
                        'AccDist' => $value->accidentdistrict,
                        'NCAUSE' => $value->icd10,
                        'Vehicle' => $value->vehicle,
                        'AccProv' => $accidentProv,
                        'DeathProv' => $deathProv,
                        'AccLatlong' => $value->latitude,
                        'Acclong' => $value->longitude,
                        'upload_by' => $upload_id,
                        'IS_UPLOAD' => "Y",
                        'upload_name' => $upload_name,
                        'Sex' => $value->sex,
                    ];
                }
            }


            if(!empty($arr)){
                Deathdata::insert($arr);
            }
        }

        return back()->with('success', 'Insert Record successfully.');


    }


    function downloadTemplate( Request $request){

        $this->checkAuth();

        $excel = App::make('excel');

        return    $excel->load('excel\template.xlsx', function($file) {
            $file->sheet( 'Sheet1', function ( $sheet )
            {
                $province_id =  Auth::user()->province_id;
                if($province_id!=null){
                    $location = location::where("LOC_CODE",$province_id)->first();
                    $sheet->setCellValue( 'M2', $location->LOC_PROVINCE);
                    $sheet->setCellValue( 'N2', $location->LOC_PROVINCE);
                }
            } );
        })->export('xlsx');
    }

    function export( Request $request)
    {
        $this->checkAuth();

        $start = $request->input('start');
        $end = $request->input('end');

        if($start && $end){
            $dateStart =  Carbon::createFromFormat('Y-m-d', date($start));
            $dateEnd =  Carbon::createFromFormat('Y-m-d', date($end));
        }else{
            $dateStart = Carbon::now()->startOfMonth();
            $dateEnd =  Carbon::now();
        }

        if( Auth::user()->group_id == 3){

            $province_id =  Auth::user()->province_id;
        }else{

            $province_id = $request->input('province_id');
        }

        $citizen_id = $request->input('citizen_id');

        $dateStart = $dateStart->addYear(543)->subDay(1);
        $dateEnd = $dateEnd->addYear(543);

        $deaths = deathdata::select(
                'dead_conso.Prefix as Prefix',
                'dead_conso.Fname as Fname',
                'dead_conso.Lname as Lname',
                'dead_conso.DrvSocNO as CitizenID',
                'dead_conso.age as Age',
                DB::raw('CASE
                    WHEN dead_conso.sex = "1" THEN "ชาย"
                    WHEN dead_conso.sex = "2" THEN "หญิง"
                    ELSE ""
                 END as Sex'),
                DB::raw('DATE_FORMAT(dead_conso.BirthDate,"%d/%m/%Y") as BirthDate'),
                DB::raw('DATE_FORMAT(dead_conso.DeadDate,"%d/%m/%Y") as DeadDate'),
                'dead_conso.NCAUSE as ICD10',
                'dead_conso.Vehicle as Vehicle',
                'dead_conso.AccSubDist as AccidentTumbol',
                'dead_conso.AccDist as AccidentDistrict',
                'dead_conso.AccProv as AccidentProvince',
                'dead_conso.DeathProv as DeathProvince',
                'dead_conso.AccLatlong as Latitude',
                'dead_conso.Acclong as Longitude' );



        $deaths = $deaths->whereNull("deleted_at");

        if($province_id){
            $deaths = $deaths->where(
                function($query) use ($province_id) {
                    $query->where('dead_conso.AccProv', '=', $province_id)
                        ->orWhere('dead_conso.DeathProv', '=', $province_id);
                });
        }

        $deaths = $deaths->whereBetween('DeadDate', [$dateStart, $dateEnd]);

        if(strlen($citizen_id) > 0){
            $deaths = $deaths->where('DrvSocNO', $citizen_id);
        }


        $data = $deaths->get();

        $locations = location::all();
        $location_arr = [];
        foreach ($locations as $location){
            $location_arr[$location->LOC_CODE] = $location->LOC_PROVINCE;
        }
        foreach ($data as $row){

            if (array_key_exists($row->AccidentProvince,$location_arr))
            {
                $row->AccidentProvince = $location_arr[$row->AccidentProvince] ;
            }

            if (array_key_exists($row->DeathProvince,$location_arr))
            {
                $row->DeathProvince = $location_arr[$row->DeathProvince] ;
            }
        }


        return Excel::create('rtidata', function($excel) use ($data) {
            $excel->sheet('sheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download("xlsx");

    }

    public function destroy( Request $request)
    {
        $this->checkAuth();


        $return_url = $request->input('return');

        $id = $request->input('id');
        $data = deathdata::where("id",$id)->first();
        $province_id = Auth::user()->province_id;

        if( Auth::user()->group_id == 3){
            if($data->AccProv != $province_id && $data->DeathProv != $province_id ){
                exit();
            }
        }

//        $data->deleted_at = Carbon::now();
//        $data->save();
        $data->delete();


        return redirect( $return_url )->with('message',__('core.note_success'))->with('status','success');

    }


}
