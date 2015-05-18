@extends('layouts.master')

@section('title')
Projects
{{-- SHOW FILTER IF SET --}}
@if(isset($filter))
| {{ $cleanFilter }}
@endif
{{-- SHOW TITLE OF PROJECT DETAIL IF SET --}}
@if(isset($single))
| {{ $cleanSingle }}
@endif
@stop
	
@section('content')

	{{--CHECK FOR DETAIL, THEN FILTER--}}
	{{-- SINGLE PROJECT VIEW --}}
	@if(isset($single))
		
		<div class="row">
			<div class="col-md-7 proj-hero">
				<img src="{{ URL::asset('library/img/img-proj-davis-hero.jpg') }}" alt="" />
			</div>
			<div class="col-md-5 proj-details">
				<h3>{{ $cleanFilter }}</h3>
				<div class="proj-description">
					<h4>{{ $cleanSingle }}</h4>
					<p>The Davis Building is located in downtown Dallas, Texas.  Included on the National Register of Historic Places, the Davis Building was originally built in the 1920's as the headquarters for Republic National Bank. The re-development of this building as a residential facility includes 183 lofts and street level retail as well as a new rooftop pool and cabana. </p>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-6 proj-nav"><a href="">&lsaquo; Previous Image</a></div>
						<div class="col-md-6 proj-nav text-right"><a href="">Next Image &rsaquo;</a></div>
						<div class="col-md-4"><a href="#"><img src="{{ URL::asset('library/img/img-proj-detail-davis-01.jpg') }}" alt="" /></a></div>
						<div class="col-md-4"><a href="#"><img src="{{ URL::asset('library/img/img-proj-detail-davis-02.jpg') }}" alt="" /></a></div>
						<div class="col-md-4"><a href="#"><img src="{{ URL::asset('library/img/img-proj-detail-davis-03.jpg') }}" alt="" /></a></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	
	
	{{-- PROJECT FILTER VIEW--}}
	@elseif(isset($filter))
	
		<h3>{{ $cleanFilter }}</h3>
		
		<div class="clearfix"></div>
		<div class="row">
			<div class="project-list col-md-4">
				<a href="#"><img src="{{ URL::asset('library/img/img-proj-archer.jpg') }}" alt="" /></a>
				<h4><a href="#">ARCHER COUNTY COURTHOUSE</a></h4>
			</div>
			<div class="project-list col-md-4">
				<a href="#"><img src="{{ URL::asset('library/img/img-proj-atom.jpg') }}" alt="" /></a>
				<h4><a href="#">ATOMS COMPLEX</a></h4>
			</div>
			<div class="project-list col-md-4">
				<a href="#"><img src="{{ URL::asset('library/img/img-proj-continental.jpg') }}" alt="" /></a>
				<h4><a href="#">CONTINENTAL BUILDING</a></h4>
			</div>
			<div class="project-list col-md-4">
				<a href="#"><img src="{{ URL::asset('library/img/img-proj-dallas-power.jpg') }}" alt="" /></a>
				<h4><a href="#">DALLAS POWER AND LIGHT</a></h4>
			</div>
			<div class="project-list col-md-4">
				<a href="{{ URL::to('projects/'.$filter.'/davis-building') }}"><img src="{{ URL::asset('library/img/img-proj-davis.jpg') }}" alt="" /></a>
				<h4><a href="#">DAVIS BUILDING</a></h4>
			</div>
			<div class="project-list col-md-4">
				<a href="#"><img src="{{ URL::asset('library/img/img-proj-fidelity.jpg') }}" alt="" /></a>
				<h4><a href="#">FIDELITY UNION BUILDING - MOSAIC LOFT APARTMENTS</a></h4>
			</div>
			<div class="project-list col-md-4">
				<a href="#"><img src="{{ URL::asset('library/img/img-proj-santa-fe.jpg') }}" alt="" /></a>
				<h4><a href="#">SANTA FE #4 BUILDING -ALOFT HOTEL</a></h4>
			</div>
		</div>
		<div class="clearfix"></div>

	{{-- PROJECT OVERVIEW VIEW --}}
	@else
	
		<div class="jumbotron">
			<h2 style="color:#ccc;">PENDING</h2>
		</div>
		
	@endif

@stop

@section('script')

@stop