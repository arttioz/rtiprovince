<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class userslevel extends Sximo  {
	
	protected $table = 'users_level';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT users_level.* FROM users_level  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE users_level.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
