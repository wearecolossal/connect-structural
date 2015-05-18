<div class="container main-navigation">
	<nav class="navbar navbar-default">

	    <div class="container">
	    	<!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header navbar-right">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="{{ URL::to('/') }}"><img src="{{ URL::asset('library/img/logo.png') }}" class="logo" alt="Connect Structural" /></a>
		    </div>
		
		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse navbar-left" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		       <li class="{{ isActive('about') }}"><a href="{{ URL::to('about') }}">About Us</a></li>
		       <li class="{{ isActive('team') }}"><a href="{{ URL::to('team') }}">Meet Our Team</a></li>
		       <li class="{{ isActive('services') }}"><a href="{{ URL::to('services') }}">Services &amp; Registration</a></li>
		       <li class="dropdown {{ isActive('projects') }}">
		        	<a href="{{ URL::to('projects') }}">Projects</a>
		        	<ul class="dropdown-menu hidden-xs" role="menu">
		        		<li><a href="{{ URL::to('projects/education') }}">Education</a></li>
		        		<li><a href="{{ URL::to('projects/municipal') }}">Municipal</a></li>
		        		<li><a href="{{ URL::to('projects/multi-family') }}">Multi-Family</a></li>
		        		<li><a href="{{ URL::to('projects/religious') }}">Religious</a></li>
		        		<li><a href="{{ URL::to('projects/commercial') }}">Commercial</a></li>
		        		<li><a href="{{ URL::to('projects/healthcare') }}">Healthcare</a></li>
		        		<li><a href="{{ URL::to('projects/historic-restoration') }}">Historic Restoration</a></li>
		        		<li><a href="{{ URL::to('projects/senior-living') }}">Senior Living</a></li>
		        		<li><a href="{{ URL::to('projects/single-family') }}">Single-family</a></li>
		        	</ul>
		       </li>
		       <li class="{{ isActive('contact') }}"><a href="{{ URL::to('contact') }}">Contact</a></li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
	    </div>
		<hr class="wood-divider" />
	</nav>
</div>