@extends('layouts.admin')
	
@section('title')
 Admin
@stop

@section('content')
	
	<div class="col-md-10 col-md-offset-1">
		<h3 class="page-header">Welcome, {{ Auth::user()->name }}</h4>
		
		{{-- LIST OF PROJECTS --}}
		<table class="table-condensed table table-bordered project-table">
			<thead>
				<tr>
					<th width="20">Order</th>
					<th>Name</th>
					<th>Category</th>
					<th>Actions</th>
					<th width="40">Feature</th>
				</tr>
			</thead>
			<tbody>
				{{-- ITERATE THROUGH PROJECTS --}}
				@foreach($projects as $project)
				<tr>
					<td>{{ $project->order }}</td>
					<td>{{ $project->name }}</td>
					<td>{{ Category::find($project->category_id)->name }}</td>
					<td><a href="{{ URL::to('admin/project/'.$project->id) }}"><i class="glyphicon glyphicon-pencil"></i> Edit</a></td>
					<td align="center"><a href="" class="text-warning"><i class="glyphicon glyphicon-star-empty"></i></a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
		
	</div>
	
	
	
@stop

@section('script')

@stop