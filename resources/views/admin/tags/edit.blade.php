@extends('layouts.app')

@section('content')
Edit Tag: {{ $tag->tag }}
<form action="{{ route('tag.update', ['id'=>$tag->id]) }}" method="post">
	{{ csrf_field()}}
	<div class="form-group">
		<label for="tag"></label>
		<input type="text" class="form-control" name="tag" value="{{ $tag->tag }}"></input>
	</div>

	<div class="form-group">
		<button class="btn btn-info btn-xs" type="submit">Update</button>
	</div>

</form>

@stop