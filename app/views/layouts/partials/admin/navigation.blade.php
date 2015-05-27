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
					{{-- ONLY SHOW IF LOGGED IN --}}
					@if(Auth::check())
					<li><a href="{{ URL::to('logout') }}">Logout</a></li>
					@endif
				</ul>
		    </div><!-- /.navbar-collapse -->
	    </div>
		<hr class="wood-divider" />
	</nav>
</div>