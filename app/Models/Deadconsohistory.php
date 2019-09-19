<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class deadconsohistory extends Sximo  {
	
	protected $table = 'dead_conso_history';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT dead_conso_history.* FROM dead_conso_history  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE dead_conso_history.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
