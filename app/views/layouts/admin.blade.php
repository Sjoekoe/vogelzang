<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin pages - Vogelzang lokeren</title>
	{{ HTML::style('css/mohave.css') }}
	{{ HTML::style('css/bootstrap.css') }}
	{{ HTML::style('css/admin.css') }}
</head>
<body>
	<div class="container-fluid">
		<div class="row titleheader">
			<div class="col-md-12">
				<h3 class="pull-left">Stal de vogelzang - Administration panel </h3>
				<p class="pull-right">Ingelogd als {{  Auth::user()->username }}</p>
			</div> <!-- End col-md-11 -->
		</div><!-- End row titleheader -->
		<div class="nav row">
			@include('layouts.admingation')
		</div>
		@if (Session::has('global'))
		<div class="row global">
			<div class="col-md-4 col-md-offset-4">
				<p> {{ Session::get('global') }} </p>	
			</div>
		</div>		
	@endif
	<div class="row content">
		<div class="col-md-12 ">
			@yield('content')		
		</div>
	</div>
	</div> <!-- End containerfluid -->

	{{ HTML::script('js/jquery.js') }}
	{{ HTML::script('js/slider.js') }}
</body>
</html>