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
		 	Create a new post
		 </div>
		 <div class="panel-body">
		 	<form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
		 		{{ csrf_field() }}

		 		<div class="form-group">
		 			<label for="title">Title</label>
		 			<input type="text" class="form-control" name="title"></input>
		 		</div>

		 		<div class="form-group">
		 			<label for="category">Select Category</label>
		 			<select class="form-control" name="category_id" id="category">
		 				@foreach($categories as $category)
		 					<option class="list-item" value="{{ $category->id}}">
		 						{{$category->name}}
		 					</option>

		 				@endforeach

		 			</select>
		 		</div>

		 		<div class="form-group">
		 			<label for="content">Content</label>
		 			<textarea class="form-control" name="content" id="summernote" rows="5" cols="5"></textarea>
		 		</div>

		 		<div class="form-group">
			 			<label for="tags">Select tags</label>
			 			@foreach($tags as $tag)
			 				<div class="checkbox">
			 					<label><input  type="checkbox" name="tags[]" value="{{ $tag->id}}"> {{ $tag->tag}}</label>
			 				</div>
			 			@endforeach
			 		
			 	</div>

		 		<div class="form-control">
		 			<label for="featured">Featured Img</label>
		 			<input type="file" class="form-control" name="featured"></input>
		 		</div>

		 		<div class="form-control">
		 			<div class="text-center">
		 				<button class="btn btn-success" type="submit">Submit</button>
		 			</div>
		 		</div>

		 	</form>
		 </div>
	 </div>

	
@stop

@section('styles')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
@stop


@section('scripts')
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>  
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>
@stop