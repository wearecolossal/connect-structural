@extends('layouts.master')

@section('title')
Contact
@stop
	
@section('content')
	
	<div class="col-md-8 contact-map">
		<img src="{{ URL::asset('library/img/contact-map.jpg') }}" alt="" />
	</div>
	<div class="col-md-4">
		<h3>Contact</h3>
		<p>
		214.221.2220<br />
info@connectstructural.com<br />
9330 LBJ Freeway, Suite 1055<br />
Dallas, Texas 75243
		</p>
	</div>
	
@stop

@section('script')

@stop