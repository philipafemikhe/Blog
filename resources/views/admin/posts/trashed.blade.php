@extends('layouts.app');

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
						Restore
					</th>
					<th>
						Destroy
					</th>
				</thead>
				
				@foreach($posts as $post)
					<tr>
						<td>
							{{ $post->title }}
						</td>

						<td>
							{{ substr($post->content,0,50) }}
						</td>

						<td>
							<img src="/{{ $post->featured }}" alt="featured image" width="90" height="50">
						</td>

						<td>
							<a href="" class="btn btn-info">Edit</a>
						</td>
						<td>
							<a href="{{ route('post.restore',['id'=>$post->id]) }}" class="btn btn-success btn-xs">Restore</a>
						</td>

						<td>
							<a href="{{ route('post.kill',['id'=>$post->id]) }}" class="btn btn-danger btn-xs">Delete</a>
						</td>
					</tr>


				@endforeach
			</table>
		</div>
	</div>


@stop