<?php

namespace App\Models;

use DB;

class Tool {
	
	public $id;
	public $name;
	public $price;

	public static function getAll(){

		$sql = 'SELECT * FROM tools';
		$rows =  DB::select($sql);
		$tools = [];
		foreach($rows as $row){
			$tool = new Tool;
			$tool->id = $row->toolID;
			$tool->name = $row->name;
			$tool->price = $row->price;
			array_push($tools, $tool);
		}
		
		return $tools;

	}

	public static function getTools($x){

		$sql = "SELECT toolID FROM invoiceTools WHERE invoiceID = $x";
		$tools = DB::SELECT($sql);
		return $tools;

	}

	public static function getInvoiceTools($x){

		$sql = "SELECT * FROM tools WHERE toolID = $x";
		return DB::select($sql);

	}

	public static function getByInvoiceId($invoiceID){

		// return an array of Tools for a given invoiceId...
		$sql = "SELECT t.toolID, t.name, t.price from InvoiceTools as it, Tools as t where it.toolID = t.toolID and it.invoiceID = :x";
		$rows =  DB::select($sql, ["x"=>$invoiceID]);


		$tools = [];
		foreach($rows as $row){

			$tool = new Tool();
			$tool->id = $row->toolID;
			$tool->name = $row->name;
			$tool->price = $row->price;

			// add to array
			$tools[] = $tool;

		}

		return $tools;

	}


};