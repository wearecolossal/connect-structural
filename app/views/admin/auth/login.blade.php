@extends('layouts.admin')
	
@section('title')
	Login To Admin
@stop

@section('content')
	
	<div class="col-md-6 col-md-offset-3">
		<div class="well login">
			<h3 class="page-header">Login to Control Panel</h3>
			{{ Form::open() }}
				
				{{-- VALIDATION --}}
				@if(Session::get('error'))
				<div class="alert alert-danger"><strong>Error!</strong> {{ Session::get('error') }}</div>
				@endif
				
				<div class="form-group">
					{{ Form::label('username', 'Username') }}
					{{ Form::text('username', '', array('class' => 'form-control')) }}
				</div>
				
				<div class="form-group">
					{{ Form::label('password', 'Password') }}
					{{ Form::password('password', array('class' => 'form-control')) }}
				</div>
				
				{{ Form::submit('Login', array('class' => 'btn btn-primary btn-sm')) }}
			{{ Form::close() }}
		</div>
	</div>
	
@stop

@section('script')
	
@stop