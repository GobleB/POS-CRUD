<?php

namespace App\Models;

use DB;

class Invoice {
	
	public $id;
	public $date;
	public $tools;
	public $totalPrice;
	public $customer;

	public static function getAll(){

		$sql = 'SELECT * FROM invoices';
		$rows =  DB::select($sql);

		$invoices = [];
		foreach($rows as $row){
			$invoice = Invoice::get($row->invoiceID);
			array_push($invoices, $invoice);
		}

		// foreach($invoices as $invoice){
		// 	$invoice->totalPrice = Tool::getPriceByInvoiceID($invoice->id);
		// }

		return $invoices;

	}

	public static function get($x){

		$sql = "SELECT * FROM invoices where invoiceID = :x";
		$row = DB::SelectOne($sql, ["x"=>$x]);

		$invoice = new Invoice();
		$invoice->id = $row->invoiceID;
		$invoice->date = $row->invoiceDate;
		$invoice->customer = $row->customer;

		// I really want an array of items here....
		/// How could i possibly fetch the items for just this inovice id????
		$invoice->tools = Tool::getByInvoiceId($x);
		$invoice->calcTotal();
		

		return $invoice;		

	}

	private function calcTotal(){

		foreach($this->tools as $tool){
			$this->totalPrice = $this->totalPrice + $tool->price;
		}

	}

	public static function addTool($invoiceID, $toolID){

		$sql = "INSERT INTO invoiceTools (invoiceID, toolID) VALUES (:invoiceID, :toolID)";
		DB::INSERT($sql, ['invoiceID'=>$invoiceID, 'toolID'=>$toolID]);
		
	}

	public static function removeTool($invoiceID, $ID){

		$sql = 'DELETE FROM invoiceTools WHERE invoiceID = :invoiceID AND ID = :ID';
		DB::DELETE($sql, ['invoiceID'=>$invoiceID, 'ID'=>$ID]);

	}

}