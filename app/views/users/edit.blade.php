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
			<li class="active">
				<a href=" {{ URL::route('accounts.index') }} ">
					<span class="glyphicon glyphicon-user"></span> Gebruikers
				</a>
				<ul>
					<li>
						<a href=" {{ URL::route('accounts.create') }} ">
							<span class="glyphicon glyphicon-plus"></span> Gebruiker toevoegen
						</a>
					</li>
					<li>
						<a href=" {{ URL::route('user.edit') }} ">
							<span class="glyphicon glyphicon-pencil"></span> Gegevens wijzigen
						</a>
					</li>
					<li>
						<a href=" {{ URL::route('user.update.password') }} ">
							<span class="glyphicon glyphicon-random"></span> Wachtwoord wijzigen
						</a>
					</li>
				</ul>
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
			<li>
				<a href=" {{ URL::route('items.admin.index') }} ">
					<span class="glyphicon glyphicon-pencil"></span> Nieuws
				</a>
			</li>
		</ul>
	</div> <!-- End col-md-2 quicknav -->
	<div class="col-md-8 col-md-offset-1 truecontent">
		<h3>Wijzig uw gegevens</h3>
		{{ Form::model($user, ['method' => 'patch', 'role' => 'form', 'class' => 'form-horizontal', 'route' => 'user.update']) }}
			
			<div class="form-group">
				{{ Form::label('username', 'Gebruikersnaam: ', ['class' => 'col-sm-2 control-label']) }}
				<div class="col-sm-5">
					{{ Form::text('username', null, ['class' => 'form-control']) }}
					@if ($errors->has('username'))
						<span class="text-danger"> {{ $errors->first() }} </span>
					@endif
				</div>					
			</div>

			<div class="form-group">
				{{ Form::label('first_name', 'Voornaam: ', ['class' => 'col-sm-2 control-label']) }}
				<div class="col-sm-5">
					{{ Form::text('first_name', null, ['class' => 'form-control']) }}	
				</div>				
			</div>

			<div class="form-group">
				{{ Form::label('last_name', 'Achternaam: ', ['class' => 'col-sm-2 control-label']) }}
				<div class="col-sm-5">
					{{ Form::text('last_name', null, ['class' => 'form-control']) }}	
				</div>				
			</div>

			<div class="form-group">
				{{ Form::label('email', 'Email: ', ['class' => 'col-sm-2 control-label']) }}
				<div class="col-sm-5">
					{{ Form::text('email', null, ['class' => 'form-control']) }}
					@if ($errors->has('email'))
						<span class="text-danger"> {{ $errors->first('email') }} </span>
					@endif
				</div>					
			</div>

			<div class="form-group">
				<div class="col-sm-5 col-sm-offset-2">
					{{ Form::submit('Opslaan', ['class' => 'btn btn-custom']) }}		
				</div>
			</div>			
		{{ Form::close() }}
	</div>

		
@stop