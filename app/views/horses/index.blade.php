@extends('layouts.main')

@section('content')
	<div class="sale lightpomegranate">
		<div class="container">
			<h2>Paarden te koop</h2>
			<div class="row">
				<div class="col-md-12 centered bottomborder">
					<p class="small">Wij hebben altijd pony's / paarden te koop staan van 80cm tot 180cm. Niet allemaal staan ze hieronder vermeld. <br> 
						Zoekt u een pony of paard, of hebt u interesse in een van de getoonde paarden, neem dan gerust contact op met ons.</p>
				</div>
				@foreach ($horses as $horse)
					@if ($horse->horsepicture->count())
						<div class="col-md-4">
							<a href=" {{ URL::route('horses.show', $horse->id) }} ">
								<div class="thumbnail salethumb pomegranate">
									{{ HTML::image($horse->horsepicture->first()->path,'', array('class' => 'img-responsive')) }}
									<h3> {{ $horse->name }} </h3>
								</div>
							</a>
						</div>
					@endif
					
				@endforeach
				<div class="col-md-12">
					{{ $horses->links() }}
				</div>
			</div> <!-- End row -->
			<div class="row">
				<div class="col-md-12 centered bottom">
					<li>
						<a href=" {{ URL::route(('home')) }} "><span class="glyphicon glyphicon-home"></span></a>	
					</li>					
				</div>
			</div>
		</div> <!-- End container -->
	</div> <!-- End sale lightpomegranate -->
@stop
