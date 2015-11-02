@extends('layouts.main')

@section('content')
	<div class="content lightgray">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-4">
					<a href=" {{ route('home.about') }} ">
						<div class="thumbnail sunflower">
							<img src="{{ asset('/images/backside.jpg') }}" alt="Over ons">
							<h3>Over ons</h3>
						</div>
					</a>
				</div>

				<div class="col-xs-12 col-sm-6 col-md-4">
					<a href=" {{ route('items.index') }} ">
						<div class="thumbnail pumpkin">
							<img src="{{ asset('/images/news.jpg') }}" alt="Nieuws">
							<h3>Nieuws</h3>
						</div>
					</a>
				</div>

				<div class="col-xs-12 col-sm-6 col-md-4">
					<a href=" {{ route('horses.index') }} ">
						<div class="thumbnail pomegranate">
							<img src="{{ asset('/images/for_sale.jpg') }}" alt="Te koop">
							<h3>Te Koop</h3>
						</div>
					</a>
				</div>

				<div class="col-xs-12 col-sm-6 col-md-4">
					<a href=" {{ route('home.accomodation') }} ">
						<div class="thumbnail turquoise">
							<img src="{{ asset('/images/accomodatie.jpg') }}" alt="Accommodatie">
							<h3>Accomodatie</h3>
						</div>
					</a>
				</div>

				<div class="col-xs-12 col-sm-6 col-md-4">
					<a href=" {{ route('home.manege') }} ">
						<div class="thumbnail blue">
							<img src="{{ asset('/images/manege.jpg') }}" alt="Manege">
							<h3>Manege</h3>
						</div>
					</a>
				</div>

				<div class="col-xs-12 col-sm-6 col-md-4">
					<a href=" {{ route('contacts.create') }} ">
						<div class="thumbnail purple">
							<img src="{{ asset('/images/contact.jpg') }}" alt="Contact">
							<h3>Contact</h3>
						</div>
					</a>
				</div>
			</div> <!-- End Row -->
		</div> <!--  End container -->
	</div> <!-- End content lightgray -->
@stop
