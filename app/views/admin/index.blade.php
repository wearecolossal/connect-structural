@extends('layouts.admin')
	
@section('title')
 Admin
@stop

@section('content')
	
	<div class="col-md-10 col-md-offset-1">
		<h3 class="page-header">Welcome, {{ Auth::user()->name }} <a href="{{ URL::to('admin/project/new') }}" class="btn btn-sm btn-primary pull-right"><i class="glyphicon glyphicon-plus"></i> Add Project</a><br /><br /> </h4>
		<div role="tabpanel">

		  <!-- Nav tabs -->
		  <ul class="nav nav-tabs" role="tablist">
		    <li role="presentation" class="active"><a href="#active" aria-controls="active" role="tab" data-toggle="tab">Active Projects</a></li>
		    <li role="presentation"><a href="#draft" aria-controls="draft" role="tab" data-toggle="tab">Draft</a></li>
		    <li role="presentation"><a href="#archived" aria-controls="archived" role="tab" data-toggle="tab">Archived</a></li>
		  </ul>
		
		  <!-- Tab panes -->
		  <div class="tab-content">
		    <div role="tabpanel" class="tab-pane active in fade" id="active">
		    	{{-- LIST OF PROJECTS --}}
				<table class="table table-bordered project-table table-hover">
					<thead>
						<tr>
							<th colspan="2">Name</th>
							<th>Category</th>
							<th>Actions</th>
<!-- 							<th width="40">Feature</th> -->
						</tr>
					</thead>
					<tbody>
						{{-- ITERATE THROUGH PROJECTS --}}
						@foreach($projects as $project)
						<tr>
							<td width="70" style="background:url({{ URL::to('uploads/thumbnails/'.$project->thumbnail) }}) center center; background-size:cover"></td>
							<td>{{ $project->name }}</td>
							<td>{{ Category::find($project->category_id)->name }}</td>
							<td><a href="{{ URL::to('admin/project/'.$project->id) }}"><i class="glyphicon glyphicon-pencil"></i> Edit</a></td>
							{{-- toggle output of featured --}}
							@if($project->featured == 1)
<!-- 								<td align="center" class="bg-warning"><a href="{{ URL::to('admin/project/'.$project->id.'/feature') }}" class="text-warning"><i class="glyphicon glyphicon-star"></i></a></td> -->
							@else
								{{-- disable clicking on featured if number of featured project is 2 --}}
								@if(Project::where('featured', 1)->count() == 2)
<!-- 								<td align="center" class="active"><span class="text-muted"><i class="glyphicon glyphicon-star-empty"></i></span></td> -->
								@else
<!-- 								<td align="center"><a href="{{ URL::to('admin/project/'.$project->id.'/feature') }}" class="text-warning"><i class="glyphicon glyphicon-star-empty"></i></a></td> -->
								@endif
							@endif
							
						</tr>
						@endforeach
					</tbody>
				</table>
		    </div>
		    <div role="tabpanel" class="tab-pane fade" id="draft">
		    	{{-- LIST OF DRAFT PROJECTS --}}
				<table class="table table-bordered project-table table-hover">
					<thead>
						<tr>
							<th colspan="2">Name</th>
							<th>Category</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						{{-- ITERATE THROUGH PROJECTS --}}
						@foreach(Project::where('draft', 1)->where('archive', 0)->orderby('category_id', 'asc')->get() as $project)
						<tr class="active" style="font-style:italic;">
							<td width="70" style="background:url({{ URL::to('uploads/thumbnails/'.$project->thumbnail) }}) center center; background-size:cover"></td>
							<td>{{ $project->name }}</td>
							<td>{{ Category::find($project->category_id)->name }}</td>
							<td><a href="{{ URL::to('admin/project/draft/'.$project->id) }}"><i class="glyphicon glyphicon-pencil"></i> Edit</a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
		    </div>
		    <div role="tabpanel" class="tab-pane fade" id="archived">
		    	{{-- LIST OF DRAFT PROJECTS --}}
				<table class="table table-bordered project-table table-hover">
					<thead>
						<tr>
							<th colspan="2">Name</th>
							<th>Category</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody class="bg-danger">
						{{-- ITERATE THROUGH PROJECTS --}}
						@foreach(Project::where('archive', 1)->orderby('category_id', 'asc')->get() as $project)
						<tr style="font-style:italic;">
							<td width="70" style="background:url({{ URL::to('uploads/thumbnails/'.$project->thumbnail) }}) center center; background-size:cover"></td>
							<td>{{ $project->name }}</td>
							<td>{{ Category::find($project->category_id)->name }}</td>
							<td><a href="{{ URL::to('admin/project/archive/'.$project->id) }}"><i class="glyphicon glyphicon-pencil"></i> Edit</a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
		    </div>
		  </div>
		
		</div>
		<div class="clearfix"></div>
		
		
	</div>
	
	
	
@stop

@section('script')

@stop