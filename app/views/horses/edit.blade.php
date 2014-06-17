@extends('layouts.admin')

@section('content')
	<div class="col-md-2 quicknav">
		<h3>Snelmenu</h3>
		<ul>
			<li>
				<a href=" {{ URL::route('admin.index') }} ">
					<span class="glyphicon glyphicon-th-large"></span> Admin panel
				</a>
			</li>
			<li>
				<a href=" {{ URL::route('home') }} ">
					<span class="glyphicon glyphicon-home"></span> Home
				</a>
			</li>
			<li >
				<a href=" {{ URL::route('accounts.index') }} ">
					<span class="glyphicon glyphicon-user"></span> Gebruikers
				</a>	
			</li>
			<li >
				<a href=" {{ URL::route('contacts.index') }} ">
					<span class="glyphicon glyphicon-envelope"></span> Berichten
				</a>
			</li>
			<li class="active">
				<a href=" {{ URL::route('horses.admin.index') }} ">
					<span class="glyphicon glyphicon-shopping-cart"></span> Paarden
				</a>
				<ul>
					<li>
						<a href=" {{ URL::route('horses.create') }} ">
							<span class="glyphicon glyphicon-plus"></span> Paard toevoegen
						</a>
					</li>
				</ul>
			</li>
			<li>
				<a href=" {{ URL::route('items.admin.index') }} ">
					<span class="glyphicon glyphicon-pencil"></span> Nieuws
				</a>
			</li>
		</ul>
	</div> <!-- End col-md-2 quicknav -->
	<div class="col-md-8 col-md-offset-1 truecontent">
		<h3>Wijzig {{ $horse->name }}</h3>
		{{ Form::model($horse, array('method' => 'patch', 'files' => 'true', 'role' => 'form', 'class' => 'form-horizontal', 'route' => array('horses.update', $horse->id))) }}
			<div class="form-group">
				{{ Form::label('name', 'Naam: ', array('class' => 'col-sm-2 control-label') ) }}
				<div class="col-sm-5">
					{{ Form::text('name', null, array('class' => 'form-control') ) }}
					@if ($errors->has('name'))
						<span class="text-danger"> {{ $errors->first('name') }} </span>
					@endif				
				</div>
			</div>

			<div class="form-group">
				{{ Form::label('breed', 'Ras: ', array('class' => 'col-sm-2 control-label')) }}
				<div class="col-sm-5">
					{{ Form::text('breed', null, array('class'=> 'form-control')) }}
					@if ($errors->has('breed'))
						<span class="text-danger"> {{ $errors->first('breed') }} </span>
					@endif	
				</div>				
			</div>

			<div class="form-group">
				{{ Form::label('age', 'Leeftijd: ', array('class' => 'col-sm-2 control-label')) }}
				<div class="col-sm-5">
					{{ Form::selectRange('age', 0, 35, null, array('class' => 'form-control')) }}	
				</div>				
			</div>

			<div class="form-group">
				{{ Form::label('description', 'Omschrijving:', array('class' => 'col-sm-2 control-label')) }}
				<div class="col-sm-5">
					{{ Form::textarea('description', null, array('class' => 'form-control')) }}
					@if ($errors->has('description'))
						<span class="text-danger"> {{ $errors->first('description') }} </span>
					@endif	
				</div>				
			</div>

			<div class="form-group">
				{{ Form::label('gender_id', 'Geslacht: ', array('class' => 'col-sm-2 control-label')) }}
				<div class="col-sm-5">
					<select name="gender_id" class="form-control">
						<option value="{{$horse->gender->id}}"> {{ $horse->gender->gender }} </option>
						@foreach (Gender::all() as $key=>$value)
							<option value=" {{$key+1}} "> {{$value->gender}} </option>
						@endforeach
					</select>	
				</div>				
			</div>

			<div class="form-group">
				{{ Form::label('price_id', 'Prijsklasse: ', array('class'=> 'col-sm-2 control-label') ) }}
				<div class="col-sm-5">
					<select name="price_id" class="form-control">
						<option value=" {{ $horse->price->id }} "> {{ $horse->price->price }} </option>
						@foreach (Price::all() as $key => $value) 
							<option value="{{ $key+1 }}"> {{ $value->price }} </option>
						@endforeach
					</select>	
				</div>				
			</div>

			<div class="form-group">
				{{ Form::label('images', 'Fotos: ', array('class' => 'col-sm-2 control-label')) }}
				<div class="col-sm-5">
					{{ Form::file('images[]', ['multiple' => 'true']) }}
					@if ($errors->has('images'))
						<span class="text-danger"> {{ $errors->first('images') }} </span>
					@endif	
				</div>			
			</div>

			<div class="form-group">
				<div class="col-sm-5 col-sm-offset-2">
					{{ Form::submit('Wijzigen', array('class' => 'btn btn-custom')) }}
				</div>
			</div>
		{{ Form::close() }}

		<h3>Foto's wijzigen</h3>
		
		<div class="col-md-12">
			@if ($horse->horsepicture->count() === 0)
				<p class="text-danger">Gelieve een foto toe te voegen. Zonder foto wordt deze niet op de site getoond.</p>
			@else
				@foreach ($horse->horsepicture as $picture)
					<div class="col-md-4">
						<div class="thumbnail">
							{{ HTML::image($picture->path) }}
							<p> <a href=" {{URL::route('horsephoto.destroy', $picture->id)}} "> <span class="glyphicon glyphicon-trash"></span> </a> </p>
						</div>
					</div>
				@endforeach
			@endif
			
		</div>
		
		<div class="col-md-12">
			<div class="overview bordertop">
				<a href=" {{ URL::route('horses.admin.index') }} "> <span class="glyphicon glyphicon-th-list"></span> Terug naar overzicht </a> - 
				<a href=" {{ URL::route('horses.admin.show', $horse->id) }} "> <span class="glyphicon glyphicon-eye-open"></span> Bekijken </a> - 
				<a href=" {{ URL::route('horses.destroy',$horse->id) }} "> <span class="glyphicon glyphicon-trash"></span> Verwijderen </a>
			</div>
		</div>

		
	</div>
@stop