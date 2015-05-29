@extends('layouts.admin')
	
@section('title')
 Admin
@stop

@section('content')
	
	<div class="col-md-10 col-md-offset-1">
		<h3 class="page-header">New Project <a href="{{ URL::to('admin') }}" class="btn btn-sm btn-default pull-right">Back to Projects</a><br /><br /></h4>
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
			<h4 class="page-header">Add Basic Project Details</h4>
			{{ Form::open(['class' => 'edit-project', 'files' => true]) }}
			
				<div class="form-group">
					<div class="row">
						<div class="col-md-12">
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
							{{ Form::number('order', '', array('class' => 'form-control')) }}
						</div>
						<div class="col-md-12">
						<hr />
							<label>Category Thumbnail <a data-toggle="tooltip" data-placement="top" title="Feature This Project on the Project Listing Page?" class="explain"><i class="glyphicon glyphicon-question-sign"></i> </a> {{ Form::checkbox('category_featured', 1, 0, array('class' => 'form-control')) }}</label>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
				
				<div class="form-group">
					{{ Form::label('name', 'Project Name') }}
					{{ Form::text('name', '', array('class' => 'form-control')) }}
				</div>
				
				<div class="form-group">
					{{ Form::label('description', 'Project Description') }}
					{{ Form::textarea('description', '', array('class' => 'form-control')) }}
				</div>
				
				<div class="form-group">
					{{ Form::label('category_id', 'Project Category') }}
					<select name="category_id" class="form-control" id="category_id">
						<option value="0">Choose Category</option>
						{{-- ITERATE THROUGH CATEGORIES --}}
						@foreach(Category::all() as $category)
							<option value="{{ $category->id }}">{{ $category->name }}</option>
						@endforeach
					</select>
				</div>
				
				<div class="form-group">
					{{ Form::hidden('draft') }}
					{{ Form::hidden('archive') }}
					<br />
					<a class="btn btn-sm btn-default draft-project">Save as Draft</a>
					{{ Form::submit('Update Basic Project Details', array('class' => 'btn btn-sm btn-primary')) }}
					<br />
				</div>
			{{ Form::close() }}
		</div>
		<div class="col-md-4">
			<h4 class="page-header">Project Thumbnails</h4>
			<div class="alert alert-info">Please Publish or Save as Draft before publishing Photos for this project</div>
			
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
			
		});
	</script>
@stop