<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class inputtypefield extends Sximo  {
	
	protected $table = 'input_type_field';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT input_type_field.* FROM input_type_field  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE input_type_field.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
