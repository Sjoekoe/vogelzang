@extends('layouts.admin')

@section('content')
	@include ('layouts._partials._quicknav_horses')

	<div class="col-md-8 col-md-offset-1 truecontent">
		<h3>Maak een paard aan</h3>
		{{ Form::open(array('route' => 'horses.store', 'role' => 'form', 'class' => 'form-horizontal', 'files' => 'true')) }}
			<div class="form-group">
				{{ Form::label('name', 'Naam:', array('class' => 'col-sm-2 control-label') ) }}
				<div class="col-sm-5">
					{{ Form::text('name','' , array('class' => 'form-control')) }}
					@if ($errors->has('name'))
						<span class="text-danger"> {{ $errors->first('name') }} </span>
					@endif
				</div>				
			</div>

			<div class="form-group">
				{{ Form::label('breed', 'Ras: ', array('class' => 'col-sm-2 control-label')) }}
				<div class="col-sm-5">
					{{ Form::text('breed', '', array('class' => 'form-control')) }}	
					@if ($errors->has('breed'))
						<span class="text-danger"> {{ $errors->first('breed') }} </span>
					@endif
				</div>			
			</div>

			<div class="form-group">
				{{ Form::label('age', 'Leeftijd: ', array('class' => 'col-sm-2 control-label')) }}
				<div class="col-sm-5">
					{{ Form::selectRange('age', 0, 35, '', array('class' => 'form-control')) }}	
				</div>			
			</div>

			<div class="form-group">
				{{ Form::label('description', 'Omschrijving: ', array('class' => 'col-sm-2 control-label')) }}
				<div class="col-sm-5">
					{{ Form::textarea('description', '' ,array('class' => 'form-control')) }}
					@if ($errors->has('description'))
						<span class="text-danger"> {{ $errors->first('description') }} </span>
					@endif	
				</div>				
			</div>
			
			<div class="form-group">
				{{ Form::label('gender', 'Geslacht: ', array('class' => 'col-sm-2 control-label')) }}
				<div class="col-sm-5">
					<select name="gender" class="form-control">
						@foreach (Gender::all() as $key=>$value)
							<option value=" {{$key+1}} "> {{$value->gender}} </option>
						@endforeach
					</select>	
				</div>				
			</div>

			<div class="form-group">
				{{ Form::label('price', 'Prijsklasse: ', array('class' => 'col-sm-2 control-label')) }}
				<div class="col-sm-5">
					<select name="price" class="form-control">
						@foreach (Price::all() as $key=>$value)
							<option value=" {{$key+1}} "> {{$value->price}} </option>
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
					{{ Form::submit('Aanmaken', array('class' => 'btn btn-custom')) }}		
				</div>
			</div>			
		{{ Form::close() }}
		<div class="bordertop overview">
			<a href=" {{ URL::route('horses.admin.index') }} "> <span class="glyphicon glyphicon-th-list"></span> Terug naar overzicht </a>
		</div>
	</div>
	
@stop