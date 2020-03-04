@extends('layouts.app')

@section('content')
	<div  class="panel panel-default">
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<th>
						Category Name
					</th>
					<th>
		 				Edit
					</th>
					<th>
						Delete
					</th>
				</thead>

				<tbody>
					@foreach($cat as $category)
						<tr>
							<td>
								{{ $category->name }}
							</td>
							<td>
								<a href="{{ route('category.edit',['category'=>$category->id])}}">	
									<button class="btn btn-info xx-small">Edit</button>
								</a>
								<!--<button class="btn btn-info">Edit</button>-->
							</td>
							<td>
								<a href="{{ route('category.delete',['category'=>$category->id])}}">
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