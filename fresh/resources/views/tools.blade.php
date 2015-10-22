@extends ('layouts.master')

@section ('title')

Tools:

@endsection

@section ('content')

<table>
	<tr>
		<td>Tool #</td>
		<td>Name</td>
		<td>Price</td>
	</tr>
	@foreach ($tools as $tool)
	<tr>
		<td>{{$tool->id}}</td>
		<td>{{$tool->name}}</td>
		<td>{{$tool->price}}</td>
		<td><button>Edit</button></td>
		<td><button>Delete</button></td>
	</tr>
	@endforeach
</table>
</button><a href="/newTool">Add New Tool</a>

@endsection