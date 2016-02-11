@extends('layouts.master')
	
@section('content')
	<div id="homepage-slideshow" class="carousel slide" data-ride="carousel">
	  <!-- Indicators -->
	  <ol class="carousel-indicators">
	    <li data-target="#homepage-slideshow" data-slide-to="0" class="active"></li>
	    <li data-target="#homepage-slideshow" data-slide-to="1"></li>
	    <li data-target="#homepage-slideshow" data-slide-to="2"></li>
	    <li data-target="#homepage-slideshow" data-slide-to="3"></li>
	    <li data-target="#homepage-slideshow" data-slide-to="4"></li>
	  </ol>
	
	  <!-- Wrapper for slides -->
	  <div class="carousel-inner" role="listbox">
	    <div class="item active">
	      <img src="{{ URL::asset('library/img/img-homepage.jpg') }}" width="100%" alt="...">
	    </div>
	    <div class="item">
	      <img src="{{ URL::asset('library/img/img-homepage-02.jpg') }}" width="100%" alt="...">
	    </div>
	     <div class="item">
	      <img src="{{ URL::asset('library/img/img-homepage-03.jpg') }}" width="100%" alt="...">
	    </div>
	     <div class="item">
	      <img src="{{ URL::asset('library/img/img-homepage-04.jpg') }}" width="100%" alt="...">
	    </div>
	     <div class="item">
	      <img src="{{ URL::asset('library/img/img-homepage-05.jpg') }}" width="100%" alt="...">
	    </div>
	  </div>
	</div>
	<div class="clearfix"></div>
	<div class="col-md-8 col-md-offset-2">
		<br />
		<p><span class="text-primary">Connect Structural Engineering, Inc.</span> has been providing innovative structural engineering solutions throughout the country since 1999.</p>  

<p>Our experience includes engineering design and construction administration on a variety of projects including churches, medical, auto dealerships, municipal, historic restoration, offices, residential, multi-family, urban housing, student housing, senior living, and various forms of school district projects including high schools, middle schools, elementary schools, gymnasiums, activity centers, agricultural facilities, and storm shelters/safe rooms.</p>
	</div>
	<h4 class="page-header col-md-8 col-md-offset-2">Featured Projects</h4>
	<div class="col-md-8 col-md-offset-2">
		<div class="row">

				@foreach(Project::where('archive', 0)->orderby(DB::raw('RAND()'))->take(2)->get() as $project)
				<div class="featured-project col-md-6">
					<img src="{{ checkThumbnail($project->thumbnail) }}" alt="" />
					<h5>{{ $project->name }}</h5>
					<p>{{ $project->description }}</p>
					<a href="{{ URL::to('projects/'.Category::find($project->category_id)->id.'/'.Category::find($project->category_id)->url.'/'.$project->id.'/'.urlencode(strtolower(str_replace(' ', '-', $project->name)))) }}">see more &raquo;</a>
				</div>
				@endforeach
			
		</div>
	</div>
@stop

@section('script')

@stop