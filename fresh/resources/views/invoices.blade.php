@extends ('layouts.master')

@section ('title')

Invoices:

@endsection

@section ('content')

<table>
	<tr>
		<td>Invoice #</td>
		<td>Creation Date</td>
		<td>Total Price</td>
		<td>Customer Name</td>
		<td>Invoice Details</td>
	</tr>
	@foreach ($invoices as $invoice)
	<tr>
		<td>{{$invoice->id}}</td>
		<td>{{$invoice->date}}</td>
		<td>{{$invoice->totalPrice}}</td>
		<td>{{$invoice->customer}}</td>
		<td><a href="/invoices/{{$invoice->id}}">Details</a></td>
		<td><button>Delete Invoice</button></td>
	</tr>
	@endforeach
</table>
</button><a href="/newInvoice">Add New Invoice</a>

@endsection