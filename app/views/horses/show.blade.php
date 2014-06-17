@extends('layouts.main')

@section('content')
	<div class="sale lightpomegranate">
		<div class="container">
			<h2>{{ $horse->name }}</h2>
			<div class="row">
				<div class="col-md-8">
					<div class="col-md-2">
						<p class="flr">Ras</p>
					</div>
					<div class="col-md-10">
						<p>{{ $horse->breed }}</p>
					</div>
					<div class="col-md-2">
						<p class="flr">Geslacht</p>
					</div>
					<div class="col-md-10">
						<p>{{ $horse->gender->gender }}</p>
					</div>
					<div class="col-md-2">
						<p class="flr">Leeftijd</p>
					</div>
					<div class="col-md-10">
						<p>{{ $horse->age }}</p>
					</div>
					<div class="col-md-2">
						<p class="flr">Prijsklasse</p>
					</div>
					<div class="col-md-10">
						<p>{{ $horse->price->price }}</p>
					</div>
					<div class="col-md-2">
						<p class="flr">Omschrijving</p>
					</div>
					<div class="col-md-10">
						<p>{{ nl2br($horse->description) }}</p>
					</div>
				</div>
				<div class="col-md-4 leftborder">
					<div class="thumbnail salethumb pomegranate">
						<div class="slider">
							<ul id="wrapper">
								@foreach ($horse->horsepicture as $picture)
									<li>
										<a href=" {{ URL::to($picture->path) }} " rel="gallery" title=" {{ $horse->name }} " class="lightbox">
											{{ HTML::image($picture->path) }}
										</a>	
									</li>
								@endforeach
							</ul>
						</div>
						@if ($horse->horsepicture->count() > 1)
							<div id="slider-nav" class="text-center">
								<button data-dir="prev" class="pomegranate"><span class="glyphicon glyphicon-arrow-left"></span></button>
								<button data-dir="next" class="pomegranate"><span class="glyphicon glyphicon-arrow-right"></span></button>
							</div>
						@endif
						
					</div>
				</div>
			</div> <!-- End row -->
			<div class="row">
				<div class="col-md-12 centered bottom">
					<ul class="homedisplay">
						<li>
							<a href=" {{ URL::route('horses.index') }} " ><span class="glyphicon glyphicon-list"></span></a>	
						</li>
						<li>
							<a href=" {{ URL::route('home') }} " ><span class="glyphicon glyphicon-home"></span></a>	
						</li>
					</ul>					
				</div>
			</div>
		</div> <!-- End Row -->
	</div> <!-- End sale lightpomegranate -->
@stop
