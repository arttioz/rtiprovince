<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class deadcosoextra extends Sximo  {

	protected $table = 'dead_coso_extra';
	protected $primaryKey = 'id';
    public $fillable = [
        'province_code',
        'dead_coso_id',
        'option_data',
    ];
	protected $casts = ['option_data' => 'json'];

	public function __construct() {
		parent::__construct();

	}

	public static function querySelect(  ){

		return "  SELECT dead_coso_extra.* FROM dead_coso_extra  ";
	}

	public static function queryWhere(  ){

		return "  WHERE dead_coso_extra.id IS NOT NULL ";
	}

	public static function queryGroup(){
		return "  ";
	}


}
