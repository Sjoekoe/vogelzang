@extends('layouts.main')

@section('content')
	

	<div class="content lightgray">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<a href=" {{ URL::route('home.about') }} ">
						<div class="thumbnail sunflower">
							{{ HTML::image('images/backside.jpg') }}
							<h3>Over ons</h3>
						</div>
					</a>
					<a href=" {{ URL::route('home.accomodation') }} ">
						<div class="thumbnail turquoise">
							{{ HTML::image('images/accomodatie.jpg') }}
							<h3>Accomodatie</h3>
						</div>
					</a>
				</div> <!-- end col-md-4 -->

				<div class="col-md-4">
					<a href=" {{ URL::route('items.index') }} ">
						<div class="thumbnail pumpkin">
							{{ HTML::image('images/news.jpg') }}
							<h3>Nieuws</h3>
						</div>
					</a>
					<a href=" {{ URL::route('home.manege') }} ">
						<div class="thumbnail blue">
							{{ HTML::image('images/manege.jpg') }}
							<h3>Manege</h3>
						</div>
					</a>
					
				</div> <!-- End col-md-4 -->

				<div class="col-md-4">
					<a href=" {{ URL::route('horses.index') }} ">
						<div class="thumbnail pomegranate">
							{{ HTML::image('images/for_sale.jpg') }}
							<h3>Te Koop</h3>
						</div>
					</a>
					<a href=" {{ URL::route('contacts.create') }} ">
						<div class="thumbnail purple">
							{{ HTML::image('images/contact.jpg') }}
							<h3>Contact</h3>
						</div>
					</a>
				</div> <!-- End col-md-4 -->
			</div> <!-- End Row -->
		</div> <!--  End container -->
	</div> <!-- End content lightgray -->

@stop