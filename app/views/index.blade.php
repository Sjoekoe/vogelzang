@extends('layouts.main')

@section('content')
	

	<div class="content lightgray">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-4">
					<a href=" {{ URL::route('home.about') }} ">
						<div class="thumbnail sunflower">
							{{ HTML::image('images/backside.jpg') }}
							<h3>Over ons</h3>
						</div>
					</a>
				</div>

				<div class="col-xs-12 col-sm-6 col-md-4">
					<a href=" {{ URL::route('items.index') }} ">
						<div class="thumbnail pumpkin">
							{{ HTML::image('images/news.jpg') }}
							<h3>Nieuws</h3>
						</div>
					</a>	
				</div>

				<div class="col-xs-12 col-sm-6 col-md-4">
					<a href=" {{ URL::route('horses.index') }} ">
						<div class="thumbnail pomegranate">
							{{ HTML::image('images/for_sale.jpg') }}
							<h3>Te Koop</h3>
						</div>
					</a>
				</div>

				<div class="col-xs-12 col-sm-6 col-md-4">
					<a href=" {{ URL::route('home.accomodation') }} ">
						<div class="thumbnail turquoise">
							{{ HTML::image('images/accomodatie.jpg') }}
							<h3>Accomodatie</h3>
						</div>
					</a>
				</div>				
				
				<div class="col-xs-12 col-sm-6 col-md-4">
					<a href=" {{ URL::route('home.manege') }} ">
						<div class="thumbnail blue">
							{{ HTML::image('images/manege.jpg') }}
							<h3>Manege</h3>
						</div>
					</a>
				</div>
				
				<div class="col-xs-12 col-sm-6 col-md-4">
					<a href=" {{ URL::route('contacts.create') }} ">
						<div class="thumbnail purple">
							{{ HTML::image('images/contact.jpg') }}
							<h3>Contact</h3>
						</div>
					</a>
				</div>
			</div> <!-- End Row -->
		</div> <!--  End container -->
	</div> <!-- End content lightgray -->

@stop