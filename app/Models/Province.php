<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class province extends Sximo  {
	
	protected $table = 'tb_provinces';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT tb_provinces.* FROM tb_provinces  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE tb_provinces.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
