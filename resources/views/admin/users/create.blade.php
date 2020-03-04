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
		 	Create a new User
		 </div>
		 <div class="panel-body">
		 	<form action="{{ route('user.store') }}" method="post">
		 		{{ csrf_field() }}

		 		<div class="form-group">
		 			<label for="name">Username</label>
		 			<input type="text" class="form-control" name="name"></input>
		 		</div>

		 		<div class="form-group">
		 			<label for="email">Email</label>
		 			<input type="email" class="form-control" name="email"></input>
		 		</div>

		 		<div class="form-group">
		 			<label for="password">Password</label>
		 			<input type="password" class="form-control" name="password"></input>
		 		</div>

	 			<div class="text-center">
	 				<button class="btn btn-success" type="submit">Add user</button>
	 			</div>
		 		 

		 	</form>
		 </div>
	 </div>

@stop