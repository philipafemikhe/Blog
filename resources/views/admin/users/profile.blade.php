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
		 	Edit your Profile
		 </div>
		 <div class="panel-body">
		 	<form action="{{ route('user.update', ['id'=>$user->id]) }}" method="post" enctype="multipart/form-data">
		 		{{ csrf_field() }}

		 		<div class="form-group">
		 			<label for="name">Username</label>
		 			<input type="text" class="form-control" name="username" value="{{ $user->name }}"></input>
		 		</div>

		 		<div class="form-group">
		 			<label for="email">Email</label>
		 			<input type="email" class="form-control" name="email" value="{{ $user->email }}"></input>
		 		</div>

		 		<div class="form-group">
		 			<label for="password">New Password</label>
		 			<input type="password" class="form-control" name="password" value=""></input>
		 		</div>

                <div class="form-group">
		 			<label for="password">Upload Avatar</label>
		 			<input type="file" class="form-control" name="avatar"></input>
		 		</div>

                 <div class="form-group">
		 			<label for="facebook">Facebook profile</label>
		 			<input type="text" class="form-control" name="facebook" value="{{ $user->profile->facebook }}"></input>
		 		</div>

                 <div class="form-group">
		 			<label for="youtube">Youtube profile</label>
		 			<input type="text" class="form-control" name="youtube" value="{{ $user->profile->youtube }}"></input>
		 		</div>

                 
                 <div class="form-group">
		 			<label for="about">About you</label>
		 			<textarea class="form-control" name="about" rows="6" cols="6">{{ $user->profile->about}}</textarea>
		 		</div>

	 			<div class="text-center">
	 				<button class="btn btn-success" type="submit">Update Profile</button>
	 			</div>
		 		 

		 	</form>
		 </div>
	 </div>

@stop