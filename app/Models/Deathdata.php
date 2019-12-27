<?php namespace App\Models;

use Carbon\Carbon;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class deathdata extends Sximo  {

    protected $table = 'dead_conso';
    protected $primaryKey = 'id';
    public $fillable = [
        'id',
        'Prefix',
        'Fname',
        'Lname',
        'DrvSocNO',
        'Age',
        'Sex',
        'BirthDate',
        'DeadDate',
        'AccSubDist',
        'AccDist',
        'NCAUSE',
        'Vehicle',
        'AccProv',
        'DeathProv',
        'AccLatlong',
        'Acclong',
        'upload_by',
        'IS_UPLOAD',
        'upload_name',
    ];
    use SoftDeletes;

    protected $dateFormat = 'Y-m-d H:i:sO';


    public function __construct() {
        parent::__construct();

    }


    protected function getDateFormat()
    {
        return 'Y-m-d H:i:s.u';
    }

    public function getGenderAttribute()
    {

        $source = "";

        if($this->Sex == 1){
            $source = "ชาย";
        }else if($this->Sex == 2){
            $source = "หญิง";
        }

        return $source;
    }


    public function getLatlongAttribute()
    {

        $source = "";

        if( strlen($this->AccLatlong) > 0 ){
            $source = $this->AccLatlong.", ".$this->Acclong;
        }

        return $source;
    }


    public function getSourceAttribute(){
        $source = "";

        if($this->IS_DEATH_CERT == "Y"){
            $source = $source."มบ.";
        }

        if($this->IS_POLIS == "Y"){
            if(strlen($source) > 0)
                $source = $source.", ";

            $source = $source."ตร.";
        }

        if($this->IS_E_CLAIM== "Y"){

            if(strlen($source) > 0)
                $source = $source.", ";

            $source = $source."บก.";
        }

        if($this->IS_UPLOAD == "Y"){

            if(strlen($source) > 0)
                $source = $source.", ";

            $source = $source.$this->upload_name;
        }

        return $source;
    }

    public static function querySelect(  ){

        return "  SELECT dead_conso.* FROM dead_conso  ";
    }

    public static function queryWhere(  ){

        return "  WHERE dead_conso.id IS NOT NULL ";
    }

    public static function queryGroup(){
        return "  ";
    }

    public function deadcosoextra(){
        return $this->belongsTo('App\Models\Deadcosoextra', 'id', 'dead_coso_id');
    }
}
