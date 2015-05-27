@extends('layouts.master')

@section('title')
Projects
{{-- SHOW FILTER IF SET --}}
@if(isset($category))
| {{ $category->name }}
@endif
{{-- SHOW TITLE OF PROJECT DETAIL IF SET --}}
@if(isset($single))
| {{ $single->name }}
@endif
@stop
	
@section('content')

	{{--CHECK FOR DETAIL, THEN FILTER--}}
	{{-- SINGLE PROJECT VIEW --}}
	@if(isset($single))
		
		<div class="row">
			@if(ProjectPhoto::where('project_id', $single->id)->first())
				<div class="col-md-7 proj-hero">
					<img src="{{ URL::to('uploads') }}/{{ ProjectPhoto::where('project_id', $single->id)->orderby('id', 'asc')->first()->image }}" alt="" />
				</div>
			@endif
			<div class="col-md-5 proj-details">
				<h3>{{ $category->name }}</h3>
				<div class="proj-description">
					<h4>{{ $single->name }}</h4>
					<p>{{ $single->description }}</p>
					<div class="clearfix"></div>
					@if(ProjectPhoto::where('project_id', $single->id)->first())
					<div class="row">
						<div class="col-md-6 proj-nav"><a class="prev_img">&lsaquo; Previous Image</a><br /></div>
						<div class="col-md-6 proj-nav text-right"><a class="next_img">Next Image &rsaquo;</a><br /><br /></div>
						{{-- ITERATE THROUGH PROJECT PHOTOS --}}
						<span class="hidden">{{ $iterator = 1; }}</span>
						@foreach(ProjectPhoto::where('project_id', $single->id)->orderby('id', 'asc')->get() as $photo)
							<div class="col-md-4"><a class="
							@if($iterator == 1)
							active
							@endif
							project-photo" data-iterator="{{ $iterator++ }}" data-photo="{{ URL::asset('uploads/'.$photo->image) }}"><img src="{{ URL::asset('uploads/thumbnails/'.$photo->thumbnail) }}" alt="" /></a><br /><br /></div>
						@endforeach
					</div>
					<div class="clearfix"></div>
					@endif
				</div>
			</div>
		</div>
	
	
	{{-- PROJECT FILTER VIEW--}}
	@elseif(isset($category))
	
		<h3>{{ $category->name }}</h3>
		
		<div class="clearfix"></div>
		<div class="row">
			{{-- ITERATE THROUGH PROJECTS OF THIS CATEGORY --}}
			@foreach(Project::where('category_id', $category->id)->orderby('order', 'asc')->get() as $project)
			<div class="project-list col-md-4">
				<a href="{{ URL::to('projects/'.$category->id.'/'.urlencode(strtolower(str_replace(' ', '-', $category->name))).'/'.$project->id.'/'.urlencode(strtolower(str_replace(' ', '-', $project->name)))) }}"><img src="{{ checkThumbnail($project->thumbnail) }}" alt="" /></a>
				<h4><a href="#">{{ $project->name }}</a></h4>
			</div>
			@endforeach
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
@if(isset($single))
	@if(ProjectPhoto::where('project_id', $single->id)->first())
	<script>
		$(document).ready(function(){
			//Get the amount of photos for the project
			var count = {{ ProjectPhoto::where('project_id', $single->id)->count() }};
			//Initiate current counter as 0, for navigation
			var current = 1;
			
			
			
			//Toggle Main photo by clicking on the nav
			$('a.project-photo').click(function(){
				
				
				//Get the original photo
				var photo = $(this).data('photo');
				//UPDATE MAIN PHOTO
				setTimeout(function(){
					$('.proj-hero img').fadeOut();
				}, 200);
				setTimeout(function(){
					$('.proj-hero img').attr('src', photo);
				}, 600);
				setTimeout(function(){
					$('.proj-hero img').fadeIn();
				}, 1000);
				
				//set current image chosen
				current = $(this).data('iterator');
				
				//Set current image as active
				$('a.project-photo').removeClass('active');
				$(this).addClass('active');
			});
			
			//Go to previous image
			$('a.prev_img').click(function(){
				//If current iterator is greater than 2
				if(current >= 2) {
					//get prev image
					var prev = current - 1;
					//get the image to toggle
					var photo = $('a.project-photo[data-iterator="'+prev+'"]').data('photo');
					
					//UPDATE MAIN PHOTO
					setTimeout(function(){
						$('.proj-hero img').fadeOut();
					}, 200);
					setTimeout(function(){
						$('.proj-hero img').attr('src', photo);
					}, 600);
					setTimeout(function(){
						$('.proj-hero img').fadeIn();
					}, 1000);
					
					//set current image chosen
					current = prev;
					
					//Set current image as active
					$('a.project-photo').removeClass('active');
					$('a.project-photo[data-iterator="'+prev+'"]').addClass('active');
					
				} else {
					var photo = $('a.project-photo[data-iterator="'+count+'"]').data('photo');
					
					//UPDATE MAIN PHOTO
					setTimeout(function(){
						$('.proj-hero img').fadeOut();
					}, 200);
					setTimeout(function(){
						$('.proj-hero img').attr('src', photo);
					}, 600);
					setTimeout(function(){
						$('.proj-hero img').fadeIn();
					}, 1000);
					
					//set current image chosen
					current = count;
					
					//Set current image as active
					$('a.project-photo').removeClass('active');
					$('a.project-photo[data-iterator="'+current+'"]').addClass('active');
				}
			});
			
			//Go to next image
			$('a.next_img').click(function(){
				//If current iterator is greater than 1 and less than the count of images
				if((current >= 1) && (current < count)) {
					//get prev image
					var next = current + 1;
					//get the image to toggle
					var photo = $('a.project-photo[data-iterator="'+next+'"]').data('photo');
					
					//UPDATE MAIN PHOTO
					setTimeout(function(){
						$('.proj-hero img').fadeOut();
					}, 200);
					setTimeout(function(){
						$('.proj-hero img').attr('src', photo);
					}, 600);
					setTimeout(function(){
						$('.proj-hero img').fadeIn();
					}, 1000);
					
					//set current image chosen
					current = next;
					
					//Set current image as active
					$('a.project-photo').removeClass('active');
					$('a.project-photo[data-iterator="'+next+'"]').addClass('active');
					
				} else {
					var photo = $('a.project-photo[data-iterator="1"]').data('photo');
					
					//UPDATE MAIN PHOTO
					setTimeout(function(){
						$('.proj-hero img').fadeOut();
					}, 200);
					setTimeout(function(){
						$('.proj-hero img').attr('src', photo);
					}, 600);
					setTimeout(function(){
						$('.proj-hero img').fadeIn();
					}, 1000);
					
					//set current image chosen
					current = 1;
					
					//Set current image as active
					$('a.project-photo').removeClass('active');
					$('a.project-photo[data-iterator="'+current+'"]').addClass('active');
				}
			});
			
		});
	</script>
	@endif
@endif
@stop