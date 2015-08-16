@extends('layouts.admin')

@section('content')
    @include ('layouts._partials._quicknav_horses')

	<div class="col-md-8 col-md-offset-1 truecontent">
		<h3> {{ $horse->name }} </h3>
		<div class="col-md-8">
			<div class="row">
				<div class="col-sm-2"> Naam:</div> <div class="col-sm-10"> {{$horse->name}} </div>	
			</div>
			<div class="row">
				<div class="col-sm-2">Ras:</div> <div class="col-sm-10"> {{$horse->breed}} </div>	
			</div>
			<div class="row">
				<div class="col-sm-2">Leeftijd:</div> <div class="col-sm-10"> {{$horse->age}} </div>	
			</div>
			<div class="row">
				<div class="col-sm-2">Geslacht:</div> <div class="col-sm-10"> {{$horse->gender->gender}} </div>	
			</div>
			<div class="row">
				<div class="col-sm-2">Prijsklasse:</div> <div class="col-sm-10"> {{$horse->price->price}} </div>	
			</div>			
			<div class="row">
				<div class="col-sm-2">Te koop sinds:</div> <div class="col-sm-10"> {{date("d-m-Y", strtotime($horse->created_at))}} </div>	
			</div>
			<div class="row">
				<div class="col-sm-2">Omschrijving:</div> <div class="col-sm-10"> {{nl2br($horse->description)}} </div>	
			</div>
			
			
		</div>
		<div class="col-md-4">
			@if ($horse->horsepicture->count() === 0)
				<p>Gelieve eerst fotos toe te voegen</p>
			@else
				<div class="thumbnail">
					<div class="slider">
						<ul>
							@foreach ($horse->horsepicture as $picture)
								<li>
									{{ HTML::image($picture->path) }}
								</li>
							@endforeach
						</ul>
					</div>
					@if ($horse->horsepicture->count() > 1)
						<div id="slider-nav">
							<button data-dir="prev"><span class="glyphicon glyphicon-arrow-left"></span></button>
							<button data-dir="next"><span class="glyphicon glyphicon-arrow-right"></span></button>
						</div>
					@endif
				</div>
			@endif
				
		</div>
		<div class="col-md-12 bordertop overview">
			<a href=" {{ URL::route('horses.admin.index') }} "> <span class="glyphicon glyphicon-th-list"></span> Terug naar overzicht </a> - 
			<a href=" {{ URL::route('horses.edit', $horse->id) }} "> <span class="glyphicon glyphicon-pencil"></span> Bewerken </a> - 
			<a href=" {{ URL::route('horses.destroy',$horse->id) }} "> <span class="glyphicon glyphicon-trash"></span> Verwijderen </a>	
		</div>	
	</div>
	

	
@stop