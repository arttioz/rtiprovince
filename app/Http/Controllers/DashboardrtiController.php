<?php namespace App\Http\Controllers;

use App\Models\Dashboardrti;
use App\Models\deathdata;
use App\Models\location;
use App\Models\province;
use Carbon\Carbon;
use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Illuminate\Support\Facades\Auth;
use Validator, Input, Redirect;


class DashboardrtiController extends Controller
{

    protected $layout = "layouts.main";
    protected $data = array();
    public $module = 'dashboardrti';
    static $per_page = '10';

    public function __construct()
    {
        parent::__construct();
        $this->model = new Dashboardrti();
        $this->info = $this->model->makeInfo($this->module);
        $this->access = array();

        $this->data = array_merge(array(
            'pageTitle' => $this->info['title'],
            'pageNote' => $this->info['note'],
            'pageModule' => 'dashboardrti',
            'return' => self::returnUrl()

        ), $this->data);


    }

    public function checkAuth()
    {
        if (!Auth::check()) {
            return redirect()->guest('user/login');
        }

        if (Auth::user()->active == '0') {
            // inactive
            Auth::logout();
            return redirect('user/login')->with(['message' => 'Your Account is not active', 'status' => 'error']);

        } else if (Auth::user()->active == '2') {
            // BLocked users
            Auth::logout();
            return redirect('user/login')->with(['message' => 'Your Account is BLocked', 'status' => 'error']);
        }
    }


    public function index(Request $request)
    {

        $this->checkAuth();


        $start = $request->input('start');

        if ($start) {
            $dateStart = Carbon::parse($start);
        } else {
            $dateStart = Carbon::now()->startOfMonth();
        }


        $locations = location::all();
        if (Auth::user()->group_id == 3) {
            $province_id = Auth::user()->province_id;
            $this->data['locations'] = location::where("LOC_CODE", $province_id)->get();

        } else {
            $province_id = $request->input('province_id');
            $this->data['locations'] = $locations;
        }

        $this->data['startdate'] = $dateStart->format('Y-m');

        $dateStart = $dateStart->addYear(543);

        $locale_name = "";
        $province = location::where('LOC_CODE', $province_id)->first();
        if ($province) {
            $locale_name = $province->LOC_PROVINCE;
        }

        $this->data['province'] = $locale_name;
        $this->data['province_id'] = $province_id;
        $this->data['year'] = $dateStart->format('Y');
        $this->data['months'] = $this->getMonths();
        $this->data['monthly'] = $this->getMonths($dateStart->format('m'));


        $deaths = $this->deathQuery($dateStart, $province_id);
        $monthlyDeathRate = $this->getMonthlyDeathRateOfProvince($deaths);
        $this->data['monthlyDeathRate'] = $monthlyDeathRate;

        $annualDeathRate = $this->getAnnualDeathRateOfProvince($dateStart, $province_id);
        $this->data['annualDeathRate'] = $annualDeathRate;

        $deathRate = $this->getDeathRateOfProvince($province_id);
        $this->data['deathRate'] = $deathRate;

        $compareAnnual = $this->getCompareAnnualDeathRateOfProvince($province_id);
        $this->data['compareAnnual'] = $compareAnnual;

        $deaths = $this->deathQuery($dateStart, $province_id, true);
        $compareMonthly = $this->getCompareMonthlyDeathRateOfProvince($dateStart, $province_id, $deaths);
        $this->data['compareMonthly'] = $compareMonthly;

        return view('dashboardrti.index', $this->data);
    }

    function getMonths($m = null)
    {
        $months = [
            '01' => 'มกราคม',
            '02' => 'กุมภาพันธ์',
            '03' => 'มีนาคม',
            '04' => 'เมษายน',
            '05' => 'พฤษภาคม',
            '06' => 'มิถุนายน',
            '07' => 'กรกฎาคม',
            '08' => 'สิงหาคม',
            '09' => 'กันยายน',
            '10' => 'ตุลาคม',
            '11' => 'พฤศจิกายน',
            '12' => 'ธันวาคม',
        ];
        return array_key_exists($m, $months) ?
            $months[$m] :
            $months;
    }

    function numberFormat($foo)
    {
        return number_format((float)$foo, 2, '.', '');
    }

    function deathQuery($date, $province_id ,$isMonthly = null)
    {
        $deaths = deathdata::query();
        $deaths = $deaths->whereNull("deleted_at");
        if($isMonthly){
            $deaths = $deaths->whereYear('DeadDate', $date->year)->whereMonth('DeadDate', $date->month);
        } else {
            $deaths = $deaths->whereYear('DeadDate', $date->year);
        }


        if ($province_id) {
            $deaths = $deaths->where(
                function ($query) use ($province_id) {
                    $query->where('dead_conso.AccProv', '=', $province_id)
                        ->orWhere('dead_conso.DeathProv', '=', $province_id);
                });
        }

        return $deaths;
    }

    // จำนวนและอัตราการตายจากอุบัติเหตุทางถนน จ.
    function getDeathRateOfProvince($province_id)
    {
        $info = [];
        for ($i = 0; $i < 4; $i++) {

            $now = Carbon::now()->addYear(540 + $i);
            $year = $now->year;
            $deaths = deathdata::query();
            $deaths = $deaths->whereNull("deleted_at");
            $deaths = $deaths->whereYear('DeadDate', $now);

            $deathNewyear = deathdata::query();
            $deathNewyear = $deathNewyear->whereNull("deleted_at");

            $fromNew = $year."-12-27";
            $toNew  =($year+1)."-01-3";

            $fromSong = $year."-04-11";
            $toSong  = $year."-04-17";


            if ($province_id) {
                $deaths = $deaths->where(
                    function ($query) use ($province_id) {
                        $query->where('dead_conso.AccProv', '=', $province_id)
                            ->orWhere('dead_conso.DeathProv', '=', $province_id);
                    });
                $deathNewyear = $deathNewyear->where(
                    function ($query) use ($province_id) {
                        $query->where('dead_conso.AccProv', '=', $province_id)
                            ->orWhere('dead_conso.DeathProv', '=', $province_id);
                    });
            }



            $death_count = $deaths->count();

            $death_newyear_count = $deathNewyear->whereBetween('DeadDate', array($fromNew, $toNew))->count();
            $death_songkran_count = $deaths->whereBetween('DeadDate', array($fromSong, $toSong))->count();

            $data = [
                'year' => $now->format('Y'),
                'total' => $deaths ? $death_count : 0,
                'per100K' => $deaths ? $this->numberFormat($death_count) : 0,
                'newYear' => $deaths ? $this->numberFormat($death_newyear_count) : 0,
                'songkran' => $deaths ? $this->numberFormat($death_songkran_count) : 0,
                'perMonth' => ceil((($deaths ? $this->numberFormat($death_count) : 0) / 12) * 100)/100,
                'perDay' =>  ceil((( $deaths ? $this->numberFormat($death_count) : 0) / 365)* 100)/100,
            ];
            array_push($info, $data);
        }

        return $info;
    }

    // จำนวนการตายจากอุบัติเหตุทางถนน จำแนกรายเดือนและตามแหล่งที่มา
    function getMonthlyDeathRateOfProvince($deaths)
    {
        $info = [];

        $deathCert = $deaths->where('IS_DEATH_CERT', 'Y')->orderBy('DeadDate')->get()->groupBy(function ($d) {
            return Carbon::parse($d->DeadDate)->format('m');
        });
        $deathCert = $deathCert->map(function ($item, $key) {
            return collect($item)->count();
        });
        $deathCertObj = [
            'source' => 'Death Cert',
            'data' => $deathCert,
        ];
        array_push($info, $deathCertObj);

        $eClaim = $deaths->where('IS_E_CLAIM', 'Y')->orderBy('DeadDate')->get()->groupBy(function ($d) {
            return Carbon::parse($d->DeadDate)->format('m');
        });
        $eClaim = $eClaim->map(function ($item, $key) {
            return collect($item)->count();
        });

        $eClaimObj = [
            'source' => 'E-Claim',
            'data' => $eClaim,
        ];
        array_push($info, $eClaimObj);

        $polis = $deaths->where('IS_POLIS', 'Y')->orderBy('DeadDate')->get()->groupBy(function ($d) {
            return Carbon::parse($d->DeadDate)->format('m');
        });
        $polis = $polis->map(function ($item, $key) {
            return collect($item)->count();
        });

        $polisObj = [
            'source' => 'Police',
            'data' => $polis,
        ];
        array_push($info, $polisObj);

        return $info;
    }

    // สถานการณ์ประจำเดือน
    function getMonthlySituation()
    {

    }

    // อัตราตายจากอุบัติเหตุทางถนน ประจำปี
    function getAnnualDeathRateOfProvince($date, $province_id)
    {
        $deaths = $this->deathQuery($date,$province_id);

        $deathObj = $deaths->where('AccDist', '!=', null)->where('AccDist', '!=', '')->orderBy('DeadDate')->get()->groupBy('AccDist');
        $deathObj = $deathObj->map(function ($item) {
            return collect($item)->count();
        })->all();

        return $deathObj;
    }

    // อัตราตายจากอุบัติเหตุทางถนน ประจำปี 1 และ ปี 2 ประจำเดือน...
    function getCompareMonthlyDeathRateOfProvince($date, $province_id, $deathsCurrent)
    {
        $info = [];
        $data = [
            'first' => '',
            'second' => $date->format('Y'),
            'data' => ''
        ];
        $last = $date->subYear(1);
        $data['first'] = $last->format('Y');
        $deathsLastYear = $this->deathQuery($last, $province_id, true);

        $query = [$deathsLastYear, $deathsCurrent];
        foreach ($query as $deaths) {

            $deathObj = $deaths->where('AccDist', '!=', null)->where('AccDist', '!=', '')->orderBy('DeadDate')->get()->groupBy('AccDist');
            $deathObj = $deathObj->map(function ($item) {
                return collect($item)->count();
            })->all();

            array_push($info, $deathObj);
        }

        $items1 = [];
        foreach ($info[0] as $key => $value){
            if(array_key_exists($key, $info[1])){
                $items1[$key] = [$value, $info[1][$key]];
            } else {
                $items1[$key] = [$value, 0];
            }
        }

        $items2 = [];
        foreach ($info[1] as $key => $value){
            if(array_key_exists($key, $info[0])){
                $items2[$key] = [$info[0][$key],$value];
            } else {
                $items2[$key] = [0, $value];
            }
        }
        $merge = array_merge($items1,$items2);
        $data['data'] = $merge;
        return $data;
    }

    // จำนวนตายจากอุบัติเหตุทางถนนจำแนกรายเดือน ปี 1 และ ปี 2
    function getCompareAnnualDeathRateOfProvince($province_id)
    {
        $info = [];
        for ($i = 0; $i < 2; $i++) {

            $now = Carbon::now()->addYear(542 + $i);
            $deaths = deathdata::query();
            $deaths = $deaths->whereNull("deleted_at");
            $deaths = $deaths->whereYear('DeadDate', $now);


            if ($province_id) {
                $deaths = $deaths->where(
                    function ($query) use ($province_id) {
                        $query->where('dead_conso.AccProv', '=', $province_id)
                            ->orWhere('dead_conso.DeathProv', '=', $province_id);
                    });
            }

            $deathCert = $deaths->orderBy('DeadDate')->get()->groupBy(function ($d) {
                return Carbon::parse($d->DeadDate)->format('m');
            });
            $deathCert = $deathCert->map(function ($item, $key) {
                return collect($item)->count();
            });
            $deathCertObj = [
                'year' => $now->format('Y'),
                'data' => $deathCert,
            ];
            array_push($info, $deathCertObj);
        }

        return $info;

    }

    function show(Request $request, $id = null)
    {
        return view('dashboardrti.view', $this->data);
    }

    public function create($id = null)
    {
        return view('dashboardrti.form', $this->data);
    }

    public function edit($id = null)
    {
        return view('dashboardrti.form', $this->data);
    }

    function store(Request $request)
    {

    }

    public function destroy(Request $request)
    {


    }


}
