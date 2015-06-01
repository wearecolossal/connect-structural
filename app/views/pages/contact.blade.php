@extends('layouts.master')

@section('title')
Contact
@stop
	
@section('content')
	
	<div class="col-md-7 contact-map">
		<a href="https://www.google.com/maps/place/Parkin+-+Perkins+-+Olsen+Consulting+Engineering,+Inc./@32.912195,-96.738763,17z/data=!4m6!1m3!3m2!1s0x864c1ff1d807b433:0xa64c30665f3af4b2!2sParkin+-+Perkins+-+Olsen+Consulting+Engineering,+Inc.!3m1!1s0x864c1ff1d807b433:0xa64c30665f3af4b2" target="_blank">
			<img src="{{ URL::asset('library/img/contact-map.jpg') }}" alt="" /><br />
		</a>
	</div>
	<div class="col-md-5">
		<h3>Contact</h3>
		<p>
		CONNECT STRUCTURAL ENGINEERING, INC.<br />
		9330 LBJ Freeway, Suite 1055<br />
		Dallas, Texas 75243<br />
		214.221.2220<br /><br />
		David Parkin, P.E.<br />
		<a href="mailto:dparkin@connectstructural.com">dparkin@connectstructural.com</a><br /><br />
		Chad Olson<br />
		<a href="mailto:colsen@connectstructural.com">colsen@connectstructural.com</a>
		</p>
	</div>
	
@stop

@section('script')

@stop