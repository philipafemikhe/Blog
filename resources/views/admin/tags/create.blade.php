@extends('layouts.app')

@section('content')

	@if(count($errors)>0)
		<ul class="list-group">
			@foreach($errors->all() as $error)
			<li class="list-group-item text-danger">
				{{ $error }}
			</li>
			@endforeach
		</ul>
		

	@endif
	 <div  class="panel panel-default">
	 	<div class="panel-heading">
		 	Create a Tag
		 </div>
		 <div class="panel-body">
		 	<form action="{{ route('tag.store') }}" method="post">
		 		{{ csrf_field() }}

		 		<div class="form-group">
		 			<label for="tag">Tag name</label>
		 			<input type="text" class="form-control" name="tag"></input><br>
		 			<button class="btn btn-success" type="submit">Submit</button>
		 		</div>

		 	</form>
		 </div>
	 </div>

	
@stop