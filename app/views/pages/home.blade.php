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
			{{-- ITERATE THROUGH FEATURED PROJECTS --}}
			@if(Project::where('featured', 1)->count() == 2)
				@foreach(Project::where('featured', 1)->orderby('updated_at', 'asc')->get() as $project)
				<div class="featured-project col-md-6">
					<img src="{{ checkThumbnail($project->thumbnail) }}" alt="" />
					<h5>{{ $project->name }}</h5>
					<p>{{ $project->description }}</p>
					<a href="{{ URL::to('projects/'.Category::find($project->category_id)->id.'/'.Category::find($project->category_id)->url.'/'.$project->id.'/'.urlencode(strtolower(str_replace(' ', '-', $project->name)))) }}">see more &raquo;</a>
				</div>
				@endforeach
			{{-- IF ONLY ONE PROJECT FEATURED, SHOW THE FEATURED AND THE MOST RECENT --}}
			@elseif(Project::where('featured', 1)->count() == 1)
			{{-- IF NO PROJECTS FEATURED, TAKE THE 2 NEWEST PROJECTS --}}
				<div class="featured-project col-md-6">
					<img src="{{ checkThumbnail(Project::where('featured', 1)->first()->thumbnail) }}" alt="" />
					<h5>{{ Project::where('featured', 1)->first()->name }}</h5>
					<p>{{ Project::where('featured', 1)->first()->description }}</p>
					<a href="{{ URL::to('projects/'.Category::find(Project::where('featured', 1)->first()->category_id)->id.'/'.Category::find(Project::where('featured', 1)->first()->category_id)->url.'/'.Project::where('featured', 1)->first()->id.'/'.urlencode(strtolower(str_replace(' ', '-', Project::where('featured', 1)->first()->name)))) }}">see more &raquo;</a>
				</div>
				<div class="featured-project col-md-6">
					<img src="{{ checkThumbnail(Project::orderby('created_at', 'desc')->first()->thumbnail) }}" alt="" />
					<h5>{{ Project::orderby('created_at', 'desc')->first()->name }}</h5>
					<p>{{ Project::orderby('created_at', 'desc')->first()->description }}</p>
					<a href="{{ URL::to('projects/'.Category::find(Project::orderby('created_at', 'desc')->first()->category_id)->id.'/'.Category::find(Project::orderby('created_at', 'desc')->first()->category_id)->url.'/'.Project::orderby('created_at', 'desc')->first()->id.'/'.urlencode(strtolower(str_replace(' ', '-', Project::orderby('created_at', 'desc')->first()->name)))) }}">see more &raquo;</a>
				</div>
			@else
				@foreach(Project::orderby('updated_at', 'asc')->take(2)->get() as $project)
				<div class="featured-project col-md-6">
					<img src="{{ checkThumbnail($project->thumbnail) }}" alt="" />
					<h5>{{ $project->name }}</h5>
					<p>{{ $project->description }}</p>
					<a href="{{ URL::to('projects/'.Category::find($project->category_id)->id.'/'.Category::find($project->category_id)->url.'/'.$project->id.'/'.urlencode(strtolower(str_replace(' ', '-', $project->name)))) }}">see more &raquo;</a>
				</div>
				@endforeach
			@endif
		</div>
	</div>
@stop

@section('script')

@stop