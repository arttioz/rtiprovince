<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use App\Libary\SiteHelpers;
use Illuminate\Support\Facades\DB;
use Socialize;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Validator, Input, Redirect ; 

class GenUserController extends Controller {

	
	protected $layout = "layouts.main";

	public function __construct() {
		parent::__construct();
		$this->data = array();

	} 

	public function generateUser(){




    }
	
	
}