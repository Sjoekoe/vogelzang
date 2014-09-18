<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>{{ $title }} - Stal de Vogelzang Lokeren</title>
	{{ HTML::style('css/mohave.css') }}
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans" type="text/css">
	{{ HTML::style('css/bootstrap.css') }}
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!-- [if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
	@yield('script')
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-52121401-1', 'staldevogelzang.be');
	  ga('send', 'pageview');

	</script>
</body>
</html>