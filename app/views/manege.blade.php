@extends('layouts.main')

@section('content')
	<div class="sale lightblue">
		<div class="container">
			<h2>Manege</h2>
			<div class="row">
				<div class="col-md-8 col-sm-12 rightborder">
					<div class="col-md-6 col-sm-6 rightborder rbshow">
						<h3 class="underlined">Rijlessen</h3>
						<p class="small">Op woensdagmiddag, vrijdagavond en zaterdag geven wij groepslessen op verschillende niveaus, van beginneling tot gevorderde, <br> van jong tot oud. <br>
						De lessen worden gegeven door onze eigen ervaren lesgevers. </p>
						<p class="small">Natuurlijk bestaat er ook de mogelijkheid tot het nemen van privelessen met een van onze lesgevers. <br>
						 <br>
						Deze kunnen plaatsvinden op tijdstippen buiten onze groepslessen. </p>
						<h3 class="underlined">Prijzen</h3>
						<ul class="accomodation">
							<li>
								€12 per les met manegepony
							</li>
							<li>
								€10 per les met eigen pony/paard
							</li>
							<li>
								€100 voor een 10-beurtenkaart
							</li>
							<li>
								€20 per prive les per 1/2 uur
							</li>
						</ul>
					</div>					
					<div class="col-md-6 col-sm-6 nopadright">
						<h3 class="underlined">Ponykampen</h3>
						<p class="small">Tijdens de schoolvakanties organiseren wij in samenwerking met de stad lokeren ponykampen. <br>
						 De duur van de kampen varieert van 2 dagen tot een hele week, waar er tal van activiteiten gepland staan voor de deelnemers.
							Er bestaat ook de mogelijkheid om te overnachten, en ook eten is voorzien.</p>
						<p class="small">De plaatsen voor deze kampen zijn beperkt, dus snel zijn is de boodschap. <br> 
							Contacteer ons om in te schrijven, of kom gerust eens langs.</p> <br>
						<h3 class="underlined">Data</h3>
						<ul class="accomodation">
							<li>30 juni - 4 juli</li>
							<li>11 augustus - 13 augustus</li>
							<li>25 augustus - 26 augustus</li>
						</ul>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 marginleft">
					<div class="thumbnail salethumb noshow blue">
						<div class="slider">
							<ul id="wrapper">
								<li>
									<a href=" {{ URL::to('images/manege/manege2.png') }} " rel="gallery" title="manege2" class="lightbox">
										{{ HTML::image('images/manege/manege2.png') }}
									</a>
								</li>
								<li>
									<a href=" {{ URL::to('images/manege/manege3.jpg') }} " rel="gallery" title="manege3" class="lightbox">
										{{ HTML::image('images/manege/manege3.jpg') }}
									</a>
								</li>
								<li>
									<a href=" {{ URL::to('images/manege/manege4.jpg') }} " rel="gallery" title="manege4" class="lightbox">
										{{ HTML::image('images/manege/manege4.jpg') }}
									</a>
								</li>
								<li>
									<a href=" {{ URL::to('images/manege/manege5.jpeg') }} " rel="gallery" title="manege5" class="lightbox">
										{{ HTML::image('images/manege/manege5.jpeg') }}
									</a>
								</li>
								<li>
									<a href=" {{ URL::to('images/manege/manege6.jpg') }} " rel="gallery" title="manege6" class="lightbox">
										{{ HTML::image('images/manege/manege6.jpg') }}
									</a>
								</li>
								<li>
									<a href=" {{ URL::to('images/manege/manege7.jpg') }} " rel="gallery" title="manege7" class="lightbox">
										{{ HTML::image('images/manege/manege7.jpg') }}
									</a>
								</li>
								<li>
									<a href=" {{ URL::to('images/manege/manege8.jpg') }} " rel="gallery" title="manege8" class="lightbox">
										{{ HTML::image('images/manege/manege8.jpg') }}
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