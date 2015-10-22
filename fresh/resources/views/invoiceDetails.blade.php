@extends ('layouts.master')

@section ('title')

	Invoice {{$invoice->id}} Details:

@endsection

@section ('content')

	<div><h3>Customer: {{$invoice->customer}}</h3></div>
	<div><h3>Create Date: {{$invoice->date}}</h3></div>
	<div><h3>Tools:</h3></div>
	@foreach($invoice->tools as $tool)
		<li>Name - {{$tool->name}} | Price - {{$tool->price}} <a href="/invoices/{{$invoice->id}}/{{$tool->id}}">Remove</a></li>
	@endforeach
	<li>
		<form action="/invoices/{{$invoice->id}}" method="post">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<select name="tool">
				@foreach($tools as $tool)
					<option value="{{$tool->id}}">{{$tool->name}}</option>
				@endforeach
			</select>
			<button>Add</button>
		</form>
	</li>

@endsection
