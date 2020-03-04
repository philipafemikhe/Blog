@extends('layouts.app')

@section('content')
Edit Post: {{ $post->title }}
<form action="{{ route('admin.post.update', ['id'=>$post->id]) }}" method="post" enctype="multipart/form-data">
	{{ csrf_field()}}
	<div class="form-group">
		<label for="title">Title</label>
		<input type="text" class="form-control" name="title" value="{{ $post->title }}"></input>
	</div>

	<div class="form-group">
		<label for="slug">Slug</label>
		<input type="text" class="form-control" name="slug" value="{{ $post->slug }}"></input>
	</div>

	<div class="form-group">
		<label for="content">Content</label>
		<input type="text" class="form-control" name="content" value="{{ $post->content }}"></input>
	</div>

	<div class="form-group">
		<label for="category">Category</label>
		<select name="category" class="form-control">
			@foreach($categories as $category)
				
				<option value="{{ $post->category->id}}" 
					@if($category->id == $post->category->id)
						selected="selected"
					@endif
					>{{ $category->name}}
				</option>
			
			@endforeach
			
		</select>
	</div>
	<div class="form-group">
		<label for="featured">Featured</label>
		<img src="\{{ $post->featured }}" alt="featured image" width="90" height="50">
		Change Image<input type="file" name="featured">
	</div>

	<div class="form-group">
 			<label for="tags">Select tags</label>
 			@foreach($tags as $tag)
 				<div class="checkbox">
 					<label><input  type="checkbox" name="tags[]" value="{{ $tag->id}}"

 						@foreach($post->tags as $t)
 							@if($tag->id ==$t->id)
 								checked
 							@endif
 						@endforeach
 						> {{ $tag->tag}}</label>
 				</div>
 			@endforeach
 		
 	</div>

	<div class="form-group">
		<button class="btn btn-info btn-xs" type="submit">Update</button>
	</div>

</form>

@stop