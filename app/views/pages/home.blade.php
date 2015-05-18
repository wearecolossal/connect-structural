@extends('layouts.master')
	
@section('content')
	
	<img src="{{ URL::asset('library/img/img-homepage.jpg') }}" style="max-width:intrinsic;width:100%;" alt="" />
	<div class="clearfix"></div>
	<div class="col-md-8 col-md-offset-2">
		<br />
		<p>Connect Structural Engineering, Inc. (CSE) has been providing innovative structural engineering solutions throughout the country since 1999.</p>  

<p>Our experience includes engineering design and construction administration on a variety of projects including churches, medical, auto dealerships, municipal, historic restoration, offices, residential, multi-family, urban housing, student housing, senior living, and various forms of school district projects including high schools, middle schools, elementary schools, gymnasiums, activity centers, agricultural facilities, and storm shelters/safe rooms.</p>
	</div>
	<h4 class="page-header col-md-8 col-md-offset-2">Featured Projects</h4>
	<div class="col-md-8 col-md-offset-2">
		<div class="row">
			<div class="featured-project col-md-6">
				<img src="{{ URL::asset('library/img/img-featured-01.jpg') }}" alt="" />
				<h5>WATERMARK SENIOR LIVING</h5>
				<p>This project features a four-story, 150 unit senior living facility that includes a 35,000 square foot community center. Three stories of wood framing were constructed over a concrete podium that covered first floor parking.</p>
				<a href="#">see more &raquo;</a>
			</div>
			<div class="featured-project col-md-6">
				<img src="{{ URL::asset('library/img/img-featured-01.jpg') }}" alt="" />
				<h5>NICOMA PARK MIDDLE SCHOOL</h5>
				<p>Located in Nicoma Park, Oklahoma, this new addition includes a new 8,500 square foot administration wing, a new 8,500 square foot classroom wing that also serves as a tornado storm shelter, and a 3,500 square foot, stand-alone one story wrestling facility.</p>
				<a href="#">see more &raquo;</a>
			</div>
		</div>
	</div>
@stop

@section('script')

@stop