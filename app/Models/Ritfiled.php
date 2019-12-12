<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Models\typefiled;

class ritfiled extends Sximo  {

	protected $table = 'rti_filed';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();

	}

	public static function querySelect(  ){

		return "  SELECT rti_filed.* FROM rti_filed  ";
	}

	public static function queryWhere(  ){

		return "  WHERE rti_filed.id IS NOT NULL ";
	}

	public static function queryGroup(){
		return "  ";
	}
	public function type_filed(){
        return $this->belongsTo('App\Models\typefiled', 'type_filed_id', 'id');
	}


}
