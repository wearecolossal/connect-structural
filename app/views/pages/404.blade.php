@extends('layouts.master')
	
@section('content')
	
	<div class="col-md-6 col-md-offset-3 jumbotron">
		<h1>404</h1>
		<h2>Page Not Found!</h2>
		<a href="{{ URL::to('/') }}" class="btn btn-primary">Return to homepage</a>
	</div>
	
@stop

@section('script')

@stop