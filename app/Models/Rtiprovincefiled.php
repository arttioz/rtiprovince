<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class rtiprovincefiled extends Sximo  {

	protected $table = 'rti_field_province';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();

	}

	public static function querySelect(  ){

		return "  SELECT rti_field_province.* FROM rti_field_province  ";
	}

	public static function queryWhere(  ){

		return "  WHERE rti_field_province.id IS NOT NULL ";
	}

	public static function queryGroup(){
		return "  ";
	}

    public function rti_fields(){
        return $this->belongsTo('App\Models\Ritfiled','rti_field_id', 'id')->with('type_filed');
    }
    public function inputtypefield(){
        return $this->belongsTo('App\Models\Inputtypefield','input_type', 'id');
    }


}
