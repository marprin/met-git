<html>
<head>
	<title>Metta English Tuition</title>
	<link rel="stylesheet" type="text/css" href="{!! asset('assets/bootstrap/css/bootstrap.min.css') !!}">
	@yield('css')
		
</head>
<body class="loading">
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Metta English Tuition</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="{{ action('HomeController@getIndex') }}">Metta English Tuition</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	      @if(Auth::check())
            <li><a href="{{ action('StudentController@getRegistration') }}">Registrasi Murid</a></li>
	        @if(\App\User::hasRole('Admin'))
                <!-- <li><a href="">Customer</a> </li>
                <li><a href="">Category</a></li>
                <li><a href = ''>Catalog</a></li>
                <li><a href = ''>Event</a></li>
                <li><a href = ''>Event Participant</a></li>
                <li><a href = ''>Testimony</a></li> -->
			@elseif(\App\User::hasRole('Receptionist'))

			@endif
		@endif
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
				          <a href="{{ action('Auth\AuthController@getLogin') }}" class = 'btn btn-default' style = 'margin-top:0.5em;' role="button" aria-expanded="false">Login</a>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ action('Auth\AuthController@getLogout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>

	<div class="container">
		@if(isset($response))
			<p class="">{{$response}}</p>
		@endif
		
		@if(Session::has('success-message'))
			<div class="alert alert-success text-center">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
				<strong>{{Session::get('success-message')}}</strong>
			</div>
		@elseif(Session::has('error-message'))
			<div class="alert alert-danger text-center">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
				<strong>{{Session::get('error-message')}}</strong>
			</div>
		@endif

		@yield('content')

		<div class="clearfix"></div>	
		<div class="footer text-center">
			<hr>
			<footer><h4><small>Copyright 2015</small></h4></footer>
		</div>
	</div>
  	<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
	<script type="text/javascript" src="{!! asset('assets/bootstrap/js/jquery.min.js') !!}"></script>
	<script type="text/javascript" src="{!! asset('assets/bootstrap/js/bootstrap.min.js') !!}"></script>

  	<script type="text/javascript">
		var url = function(suffix) {
			suffix = (typeof suffix !== "undefined") ? suffix : "";
			return "{{ url() }}/" + suffix;
		};
		var asset = function(suffix) {
			return "{{ asset(null) }}" + suffix;
		};
	</script>

	@yield('js')
</body>
</html>