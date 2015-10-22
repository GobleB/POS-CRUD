<?php 

namespace App\Http\Controllers;

use Request;
use App\Models\invoice;
use App\Models\tool;
use DB;

class ToolController extends Controller {

	public function getAllTools(){
	
		// Invoice ID, Invoice Date, Total Price, Customer, Details(link)
		try {

    		return view('/tools', ["tools"=>Tool::getAll()]);
		} catch (PDOException $e) {
   			die($e->getMessage());
		}
	}

};