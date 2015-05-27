@extends('layouts.admin')
	
@section('title')
 Admin
@stop

@section('content')
	
	<div class="col-md-10 col-md-offset-1">
		<h3 class="page-header">{{ $project->name }}</h4>
		<div class="clearfix"></div>
		<div class="col-md-6">
			<h4 class="page-header">Edit Basic Project Details</h4>
			{{ Form::open(['class' => 'edit-project']) }}
			
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
					{{ Form::label('order', 'Project Order') }}
					<div class="row">
						<div class="col-md-4">
							{{ Form::number('order', $project->order, array('class' => 'form-control')) }}
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
					<br />
					{{ Form::submit('Update Basic Project Details', array('class' => 'btn btn-primary')) }}
				</div>
			{{ Form::close() }}
		</div>
		<div class="col-md-6">
			<h4 class="page-header">Project Thumbnails</h4>
			{{ Form::open() }}
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

@stop