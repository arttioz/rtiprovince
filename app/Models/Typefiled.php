<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class typefiled extends Sximo  {
	
	protected $table = 'type_filed';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT type_filed.* FROM type_filed  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE type_filed.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
