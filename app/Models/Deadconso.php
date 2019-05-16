<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class deadconso extends Sximo  {
	
	protected $table = 'dead_conso';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
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
	

}
