@extends('layouts.admin')
	
@section('title')
 Admin
@stop

@section('content')
	
	<div class="col-md-10 col-md-offset-1">
		<h3 class="page-header">{{ $project->name }} <span class="label label-default">DRAFT</span> <a href="{{ URL::to('admin') }}" class="btn btn-sm btn-default pull-right">Back to Projects</a><br /><br /></h4>
		<div class="clearfix"></div>
		@if(Session::get('Success'))
			<div class="col-md-12 fade-away">
				<div class="alert alert-success">{{ Session::get('Success') }}</div>
			</div>
		@endif
		@if(Session::get('Error'))
			<div class="col-md-12 fade-away">
				<div class="alert alert-danger">{{ Session::get('Error') }}</div>
			</div>
		@endif
		<div class="col-md-8">
			<h4 class="page-header">Edit Basic Project Details</h4>
			{{ Form::open(['class' => 'edit-project', 'route' => array('project.edit', $project->id), 'files' => true]) }}
			
				<div class="form-group">
					<div class="row">
						<div class="col-md-5">
							<img src="{{ checkThumbnail($project->thumbnail) }}" alt="" />
						</div>
						<div class="col-md-7">
							{{ Form::label('thumbnail', 'Project Thumbnail') }}
							{{ Form::file('thumbnail') }}
						</div>					
					</div>
				<div class="clearfix"></div>
				</div>
				
				<div class="form-group">

					<div class="row">
						<div class="col-md-12">
						<hr />
							<label>Category Thumbnail <a data-toggle="tooltip" data-placement="top" title="Feature This Project on the Project Listing Page?" class="explain"><i class="glyphicon glyphicon-question-sign"></i> </a> {{ Form::checkbox('category_featured', 1, $project->category_featured, array('class' => 'form-control')) }}</label>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
				
				<div class="form-group">
					{{ Form::label('name', 'Project Name') }}
					{{ Form::text('name', $project->name, array('class' => 'form-control')) }}
				</div>
				
				<div class="form-group">
					{{ Form::label('description', 'Project Description') }}
					{{ Form::textarea('description', $project->description, array('class' => 'form-control')) }}
				</div>
				
				<div class="form-group">
					{{ Form::label('category_id', 'Project Category') }}
					<select name="category_id" class="form-control" id="category_id">
						<option value="0">Choose Category</option>
						{{-- ITERATE THROUGH CATEGORIES --}}
						@foreach(Category::all() as $category)
							<option value="{{ $category->id }}"
							{{-- make the selected project categiry selected --}}
							@if($project->category_id == $category->id)
							selected
							@endif
							>{{ $category->name }}</option>
						@endforeach
					</select>
				</div>
				
				<div class="form-group">
					{{ Form::hidden('draft', $project->draft) }}
					{{ Form::hidden('archive', $project->archive) }}
					<br />
					<a class="btn btn-sm btn-success draft-project">Publish Project</a>
					<br />
					<hr />
					<a class="btn btn-sm btn-danger archive-project"><i class="glyphicon glyphicon-trash"></i> Archive</a>
				</div>
			{{ Form::close() }}
		</div>
		<div class="col-md-4">
			<h4 class="page-header">Project Thumbnails</h4>
			{{ Form::open(['route' => array('project.upload', $project->id), 'files' => true]) }}
			<div class="form-group">
				{{ Form::label('photo', 'Upload Project Photo') }}
				<div class="clearfix"></div>
				{{ Form::file('photo') }}
				<br />
				{{ Form::submit('Upload Photo', array('class' => 'btn btn-primary')) }}
				<div class="clearfix"></div>
			</div>
			{{ Form::close() }}
			<div class="clearfix"></div>
			<hr />
			<div class="well project-photos">
				<div class="col-md-12"><h5 class="page-header">Project Photos</h5></div>
				{{-- ITERATE THROUGH PROJECT PHOTOS --}}
				@foreach(ProjectPhoto::where('project_id', $project->id)->get() as $photo)
				<div class="col-md-6 col-sm-6 edit-photo">
					<a href="{{ URL::to('admin/project/photo/'.$photo->id.'/delete') }}" class="delete-photo btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove"></i></a>
					<img src="{{ checkProjectPhoto($photo->thumbnail) }}" class="thumbnail" alt="" />
				</div>
				@endforeach
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
	
	
	
@stop

@section('script')
	<script>
		$(document).ready(function(){
			//Show Alert
			$('a.explain').tooltip();
			
			//Draft Project
			$('.draft-project').on('click', function() {
				$(this).toggleClass('active');
			    var hiddenField = $('input[name="draft"]'),
			        val = hiddenField.val();
			
			    hiddenField.val(val === "1" ? "0" : "1");
			    setTimeout(function(){
				    $('form.edit-project').submit();
			    }, 500);
			});
			
			//Archive Project
			$('.archive-project').on('click', function() {
				$(this).toggleClass('active');
			    var hiddenField = $('input[name="archive"]'),
			        val = hiddenField.val();
			
			    hiddenField.val(val === "1" ? "0" : "1");
			    setTimeout(function(){
				    $('form.edit-project').submit();
			    }, 500);
			});
		});
	</script>
@stop