@extends('layouts.app')

@section('content')
Edit Category: {{ $category->name }}
<form action="{{ route('category.update', ['id'=>$category->id]) }}" method="post">
	{{ csrf_field()}}
	<div class="form-group">
		<label for="categoryname"></label>
		<input type="text" class="form-control" name="categoryname" value="{{ $category->name }}"></input>
	</div>

	<div class="form-group">
		<button class="btn btn-info btn-xs" type="submit">Update</button>
	</div>

</form>

@stop