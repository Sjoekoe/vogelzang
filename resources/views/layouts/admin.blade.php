<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin pages - Vogelzang lokeren</title>
    <link rel="stylesheet" href="{{ asset('/css/mohave.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/admin.css') }}">
</head>
<body>
	<div class="container-fluid">
		<div class="row titleheader">
			<div class="col-md-12">
				<h3 class="pull-left">Stal de vogelzang</h3>
				<div class="pull-right">
					<p>Ingelogd als {{  Auth::user()->username }} - {{ link_to_route('user.sign-out', 'Log uit') }} </p>
				</div>
				<!-- <p class="pull-right">Ingelogd als {{  Auth::user()->username }}</p> -->
			</div> <!-- End col-md-11 -->
		</div><!-- End row titleheader -->
		@if (Session::has('global'))
		<div class="row global">
			<div class="col-md-4 col-md-offset-4">
				<p> {{ Session::get('global') }} </p>
			</div>
		</div>
	@endif
	<div class="row content">
		<div class="col-md-12 col-xs-12">
			@yield('content')
		</div>
	</div>
	</div> <!-- End containerfluid -->

    <script src="{{ asset('/js/jquery.js') }}"></script>
    <script src="{{ asset('/js/slider.js') }}"></script>
</body>
</html>
