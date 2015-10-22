<?php namespace App\Http\Controllers;

use Request;
use App\Models\invoice;
use App\Models\tool;
use DB;

class InvoiceController extends Controller {

	public function getAllInvoices(){
	
		// Invoice ID, Invoice Date, Total Price, Customer, Details(link)
		try {

    		return view('/invoices', ["invoices"=>Invoice::getAll()]);
		} catch (PDOException $e) {
   			die($e->getMessage());
		}
	}

	public function viewInvoiceDetails($invoiceId){

		try{


			$invoice = Invoice::get($invoiceId);

			/// 

			$allTools = Tool::getAll();

			// $invoice->items // this is an array of Item Objects

			return view("/invoiceDetails", ["invoice"=>$invoice, "tools"=>$allTools]);

		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function deleteToolFromInvoice($invoiceID, $ID){

		try {
			Invoice::removeTool($invoiceID, $ID);
			return redirect("/invoices/$invoiceID");
		} catch (Exception $e) {
			
		}

	}

	public function addToolToInvoice($invoiceID){

		try {
			$toolID = REQUEST::input('tool');
			Invoice::addTool($invoiceID, $toolID);
			return redirect("/invoices/$invoiceID");
		} catch (Exception $e) {
			
		}

	}
};