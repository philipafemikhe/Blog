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
				</thead>
				
				@foreach($posts as $post)
					<tr>
						<td>
							{{ $post->title }}
						</td>

						<td>
							{{ $post->content }}
						</td>

						<td>
							<img src="{{ $post->featured }}" alt="featured image" width="50" height="40">
						</td>
					</tr>


				@endforeach
			</table>
		</div>
	</div>


@stop