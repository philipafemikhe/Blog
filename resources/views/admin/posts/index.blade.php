@extends('layouts.app3')

@section('content')


<div  class="panel panel-default">
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<th>
						Title
					</th>

					<th>
						Content
					</th>

					<th>
						Featured
					</th>
					<th>
						Edit
					</th>
					<th>
						Trash
					</th>
				</thead>
				
				@foreach($posts as $post)
					<tr>
						<td>
						<a href="{{ route('post.single',['id'=>$post->id]) }}">	{{ $post->title }}</a>
						</td>

						<td>
							{{ substr($post->content,0,50) }}...
						</td>

						<td>
							<img src="\{{ $post->featured }}" alt="featured image" width="90" height="50">
						</td>

						<td>
							<a href="{{ route('admin.post.edit',['id'=>$post->id])}}" class="btn btn-info">Edit</a>
						</td>
						<td>
							<a href="{{ route('post.delete',['id'=>$post->id]) }}" class="btn btn-danger">Trash</a>
						</td>
					</tr>


				@endforeach
			</table>
		</div>
	</div>


@stop