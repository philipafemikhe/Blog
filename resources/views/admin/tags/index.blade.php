@extends('layouts.app')

@section('content')
	<div  class="panel panel-default">
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<th>
						Tag Name
					</th>
					<th>
		 				Edit
					</th>
					<th>
						Delete
					</th>
				</thead>

				<tbody>
					@foreach($tags as $tag)
						<tr>
							<td>
								{{ $tag->tag }}
							</td>
							<td>
								<a href="{{ route('tag.edit',['id'=>$tag->id]) }}">	
									<button class="btn btn-info xx-small">Edit</button>
								</a>
								<!--<button class="btn btn-info">Edit</button>-->
							</td>
							<td>
								<a href="{{ route('tag.delete',['id'=>$tag->id])}}">
									<button class="btn btn-danger xx-small">Delete</button>
								</a>
								<!--<button class="btn btn-danger">Delete</button>-->
							</td>
						</tr>

					@endforeach
				</tbody>
				
				

			</table>
		</div>
		
	</div>
@stop