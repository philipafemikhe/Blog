@extends('layouts.app')

@section('content')
<div class="panel panel-default" style="padding: 1em">
	<form method="post" action="{{ route('user.update', ['id' => $user->id]) }}" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="username">Username</label>
			<input type="text" class="form-control" name="username" value="{{ $user->name }}">
		</div>

		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" class="form-control" name="email" value="{{ $user->email }}">
		</div>

		<div class="form-group">
			<label for="about">About</label>
			<textarea class="form-control" name="about">{{ $user->profile->about }}</textarea>
		</div>

		<div class="form-group">
			<label for="facebook">Facebook</label>
			<input type="text" class="form-control" name="facebook" value="{{ $user->profile->facebook }}">
		</div>

		<div class="form-group">
			<label for="youtube">Youtube</label>
			<input type="text" class="form-control" name="youtube" value="{{ $user->profile->youtube }}">
		</div>

		<div class="form-group">
			<span>
				<img src="{{ asset($user->profile->avatar) }}" width="25px" height="auto">Change Profile pix
				<input type="file" class="form-control" name="avatar">
			</span>
		</div>

		<div class="form-group">
			<button type="submit">Update</button>
		</div>
	</form>
</div>

@stop