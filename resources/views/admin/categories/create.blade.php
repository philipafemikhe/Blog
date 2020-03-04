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
		 	Create a new Category
		 </div>
		 <div class="panel-body">
		 	<form action="{{ route('category.store') }}" method="post">
		 		{{ csrf_field() }}

		 		<div class="form-group">
		 			<label for="title">Title</label>
		 			<input type="text" class="form-control" name="title"></input>
		 		</div>

	 			<div class="text-center">
	 				<button class="btn btn-success" type="submit">Store Category</button>
	 			</div>
		 		 

		 	</form>
		 </div>
	 </div>

	
@stop