@extends('layouts.main')

@section('content')
	<div class="sale lightturqoise">
		<div class="container">
			<h2>Accomodatie</h2>
			<div class="row">
				<div class="col-md-8 rightborder">
					<div class="col-md-6 rightborder">
						<h3 class="underlined">Faciliteiten</h3>
						<ul class="accomodation">
							<li>+/- 50 verluchte binnenstallen</li>
							<li>5 buitenstallen</li>
							<li>4 grote loopstallen</li>
							<li>Automatische drinkbakken</li>
							<li>Stofvrije binnenpiste</li>
							<li>Verlichte Buitenpiste</li>
							<li>2 wasplaatsen met warm &amp; koud water</li>
							<li>Solarium</li>
							<li>Paddock</li>
							<li>Longeerpiste</li>
							<li>Verschillende ruime weides in de omgeving</li>
							<li>Voldoende springmateriaal</li>
							<li>Wandelroutes</li>		
							<li>Parking</li>
							<li>Verwarmde Cafetaria</li>
							<li>Sanitaire voorzieningen </li>
						</ul>
					</div>
					<div class="col-md-6 nopadright">
						<h3 class="underlined">Verhuur van stallen</h3>
						<p class="small"> U kan bij ons terecht voor het verhuur van stallingen. Dit kan voor voor zowel vol- als halfpension. Voor meer informatie kan u ons altijd contacteren. of kom gerust eens langs</p>
						<h3 class="underlined">Inbegrepen</h3>
						<ul class="accomodation">
							<li>Onbeperkt gebruik faciliteiten</li>
							<li>Dagelijks vers hooi</li>
							<li>Uitmesten van stallen</li>
							<li>Dagelijkse Weidegang</li>
							<li>Persoonlijke opbergkast</li>
							<li>Begeleiden van veearts/hoefsmid</li>
							<li>Maandelijkse groepswandeling</li>
						</ul>
					</div>
				</div>
				<div class="col-md-4">
					<div class="thumbnail salethumb turquoise">
						<div class="slider">
							<ul id="wrapper">
								<li>
									<a href=" {{ URL::to('images/accomodation/manege.jpg') }} " rel="gallery" title="manege" class="lightbox">
										{{ HTML::image('images/accomodation/manege.jpg') }}
									</a>
								</li>
								<li>
									<a href=" {{ URL::to('images/accomodation/stalpaard.jpg') }} " rel="gallery" title="stal met paard" class="lightbox">
										{{ HTML::image('images/accomodation/stalpaard.jpg') }}
									</a>
								</li>
								<li>
									<a href=" {{ URL::to('images/accomodation/Stal.jpg') }} " rel="gallery" title="stal" class="lightbox">
										{{ HTML::image('images/accomodation/Stal.jpg') }}
									</a>
								</li>
								<li>
									<a href=" {{ URL::to('images/accomodation/spring.jpg') }} " rel="gallery" title="springmateriaal" class="lightbox">
										{{ HTML::image('images/accomodation/spring.jpg') }}
									</a>
								</li>
								<li>
									<a href=" {{ URL::to('images/accomodation/piste.jpg') }} " rel="gallery" title="piste" class="lightbox">
										{{ HTML::image('images/accomodation/piste.jpg') }}
									</a>
								</li>
								
								<li>
									<a href=" {{ URL::to('images/accomodation/wasplaats.jpg') }} " rel="gallery" title="wasplaats" class="lightbox">
										{{ HTML::image('images/accomodation/wasplaats.jpg') }}
									</a>
								</li>
								<li>
									<a href=" {{ URL::to('images/accomodation/buitenstallen.jpg') }} " rel="gallery" title="buitenstallen" class="lightbox">
										{{ HTML::image('images/accomodation/buitenstallen.jpg') }}
									</a>
								</li>
							</ul> <!-- End wrapper -->
						</div> <!-- End slider -->
						<div id="slider-nav" class="centered">
							<button data-dir="prev" class="turquoise"><span class="glyphicon glyphicon-arrow-left"></span></button>
							<button data-dir="next" class="turquoise"><span class="glyphicon glyphicon-arrow-right"></span></button>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 centered bottom">
					<li>
						<a href=" {{ URL::route('home') }} "><span class="glyphicon glyphicon-home"></span></a>	
					</li>					
				</div>
			</div>
		</div>
		
	</div>
@stop