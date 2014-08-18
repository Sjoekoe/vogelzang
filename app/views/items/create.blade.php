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
			<li>
				<a href=" {{ URL::route('accounts.index') }} ">
					<span class="glyphicon glyphicon-user"></span> Gebruikers
				</a>							
			</li>
			<li>
				<a href=" {{ URL::route('contacts.index') }} ">
					<span class="glyphicon glyphicon-envelope"></span> Berichten
				</a>
			</li>
			<li>
				<a href=" {{ URL::route('horses.admin.index') }} ">
					<span class="glyphicon glyphicon-shopping-cart"></span> Paarden
				</a>
			</li>
			<li class="active">
				<a href=" {{ URL::route('items.admin.index') }} ">
					<span class="glyphicon glyphicon-pencil"></span> Nieuws
				</a>
				<ul>
					<li>
						<a href=" {{ URL::route('items.create') }} ">
							<span class="glyphicon glyphicon-plus"></span> Bericht toevoegen
						</a>
					</li>
				</ul>			
			</li>
		</ul>
	</div> <!-- End col-md-2 quicknav -->
	<div class="col-md-8 col-md-offset-1 truecontent">
		<h3>Schrijf een nieuw bericht</h3>
		{{ Form::open(array('route' => 'items.store', 'files' => 'true', 'class' => 'form-horizontal', 'role' => 'form' )) }}
			<div class="form-group">
				{{ Form::label('title', 'Titel: ', array('class' => 'col-sm-2 control-label')) }}
				<div class="col-sm-5">
					{{ Form::text('title','', array('class' => 'form-control')) }}
					@if ($errors->has('title'))
						<span class="text-danger"> {{ $errors->first('title') }} </span>
					@endif
				</div>
			</div>
				
			<div class="form-group">
				{{ Form::label('message', 'Bericht: ', array('class'=> 'col-sm-2 control-label')) }}
				<div class="col-sm-5">
					{{ Form::textarea('message', '', array('class'=> 'form-control')) }}
					@if ($errors->has('message'))
						<span class="text-danger"> {{ $errors->first('message') }} </span>
					@endif
				</div>
			</div>

			<div class="form-group">
				{{ Form::label('image', 'Foto: ', array('class' => 'col-sm-2 control-label')) }}
				<div class="col-sm-5">
					{{ Form::file('image[]', ['multiple' => 'true']) }}
					@if ($errors->has('image'))
						<span class="text-danger"> {{ $errors->first('image') }} </span>
					@endif
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-5 col-sm-offset-2">
					{{ Form::submit('Posten', array('class' => 'btn btn-custom')) }}
				</div>
			</div>
		{{ Form::close() }}
		<div class="bordertop overview">
			<a href=" {{ URL::route('items.admin.index') }} "> <span class="glyphicon glyphicon-th-list"></span> Terug naar overzicht </a>
		</div>
	</div>
@stop