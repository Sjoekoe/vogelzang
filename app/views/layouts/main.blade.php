<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>{{ $title }} - Stal de Vogelzang Lokeren</title>
	{{ HTML::style('css/mohave.css') }}
	{{ HTML::style('css/bootstrap.css') }}
	{{ HTML::style('css/style.css') }}
</head>
<body>

	<!-- @if (Session::has('global'))
		<p class="global"> {{ Session::get('global') }} </p>
	@endif -->

	@include('layouts.navigation')

	<div class="jumbotron">
		<div class="container">
			<div class="container">
				<a href=" {{ URL::route('home') }} ">
					<h1>Stal de vogelzang</h1>
					<p>Waar paardrijden puur genot is!</p>
				</a>
			</div>
			@yield('content')
		</div> <!-- End container -->
	</div> <!-- End Jumbotron -->
	<div class="container">
		@include('layouts.footer')	
	</div>
	
	{{ HTML::script('js/jquery.js') }}
	{{ HTML::script('js/slider.js') }}
	{{ HTML::script('js/lightbox.js') }}
</body>
</html>