@extends('layouts.main')

@section('content')
	<div class="sale lightblue">
		<div class="container">
			<h2>Manege</h2>
			<div class="row">
				<div class="col-md-8 col-sm-12 rightborder rbshow">
					<div class="col-md-6 col-sm-6 rbshow">
						<h3 class="underlined">Rijlessen</h3>
						<p class="small">Op woensdagmiddag, vrijdagavond en zaterdag geven wij groepslessen op verschillende niveaus, van beginneling tot gevorderde, <br> van jong tot oud. <br>
						De lessen worden gegeven door onze eigen ervaren lesgevers. </p>
						<p class="small">Natuurlijk bestaat er ook de mogelijkheid tot het nemen van privelessen met een van onze lesgevers. <br>
						 <br>
						Deze kunnen plaatsvinden op tijdstippen buiten onze groepslessen. </p>
						<h3 class="underlined">Prijzen</h3>
						<ul class="accomodation">
							<li>
								€16 per les met manegepony
							</li>
							<li>
								€10 per les met eigen pony/paard
							</li>
							<li>
								€130 voor een 10-beurtenkaart
							</li>
							<li>
								€20 per prive les per 1/2 uur
							</li>
						</ul>
					</div>
					<div class="col-md-6 col-sm-6 nopadright leftborder">
						<h3 class="underlined">Ponykampen</h3>
						<p class="small">Tijdens de schoolvakanties organiseren wij in samenwerking met de stad lokeren ponykampen. <br>
						 De duur van de kampen varieert van 2 dagen tot een hele week, waar er tal van activiteiten gepland staan voor de deelnemers.
							Er bestaat ook de mogelijkheid om te overnachten, en ook eten is voorzien.</p>
						<p class="small">De plaatsen voor deze kampen zijn beperkt, dus snel zijn is de boodschap. <br>
							Contacteer ons om in te schrijven, of kom gerust eens langs.</p> <br>
						<h3 class="underlined">Data 2015</h3>
						<ul class="accomodation">
							<li>08 Februari - 12 Februari</li>
							<li>04 April - 08 April</li>
						</ul>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 marginleft">
					<div class="thumbnail salethumb noshow blue">
						<div class="slider">
							<ul id="wrapper">
								<li>
									<a href=" {{ URL::to('images/manege/manege2.png') }} " rel="gallery" title="manege2" class="lightbox">
                                        <img src="{{ asset('/images/manege/manege2.png') }}" alt="">
									</a>
								</li>
								<li>
									<a href=" {{ URL::to('images/manege/manege3.jpg') }} " rel="gallery" title="manege3" class="lightbox">
                                        <img src="{{ asset('/images/manege/manege3.jpg') }}" alt="">
									</a>
								</li>
								<li>
									<a href=" {{ URL::to('images/manege/manege5.jpeg') }} " rel="gallery" title="manege5" class="lightbox">
                                        <img src="{{ asset('/images/manege/manege5.jpeg') }}" alt="">
									</a>
								</li>
								<li>
									<a href=" {{ URL::to('images/manege/manege6.jpg') }} " rel="gallery" title="manege6" class="lightbox">
                                        <img src="{{ asset('/images/manege/manege6.jpg') }}" alt="">
									</a>
								</li>
								<li>
									<a href=" {{ URL::to('images/manege/manege7.jpg') }} " rel="gallery" title="manege7" class="lightbox">
                                        <img src="{{ asset('/images/manege/manege7.jpg') }}" alt="">
									</a>
								</li>
								<li>
									<a href=" {{ URL::to('images/manege/manege8.jpg') }} " rel="gallery" title="manege8" class="lightbox">
                                        <img src="{{ asset('/images/manege/manege8.jpg') }}" alt="">
									</a>
								</li>
							</ul> <!-- End wrapper -->
						</div> <!-- End slider -->
						<div id="slider-nav" class="centered">
							<button data-dir="prev" class="blue"><span class="glyphicon glyphicon-arrow-left"></span></button>
							<button data-dir="next" class="blue"><span class="glyphicon glyphicon-arrow-right"></span></button>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 centered bottom">
					<li>
						<a href=" {{ URL::route('home') }} " ><span class="glyphicon glyphicon-home"></span></a>
					</li>
				</div>
			</div>
		</div>
	</div>
@stop
