@include('layouts.partials.header')

  <body>
  	@include('layouts.partials.admin.navigation')
  
    <div class="container">
    	<div class="col-md-12">
    		@yield('content')
    	</div>
    	<div class="clearfix"></div>
    	<br /><br />
    </div>
    
    @include('layouts.partials.footer')

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ URL::asset('library/js/bootstrap.min.js') }}"></script>
    @yield('script')
  </body>
</html>