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
		<h3>Wachtwoord wijzigen</h3>
		{{ Form::model($user, ['method' => 'patch', 'role' => 'form', 'class' => 'form-horizontal', 'route' => 'user.update.password']) }}
			<div class="form-group">
				{{ Form::label('old_password', 'Wachtwoord: ', ['class' => 'col-sm-2 control-label']) }}
				<div class="col-sm-5">
					{{ Form::password('old_password', ['class' => 'form-control']) }}
					@if ($errors->has('old_password'))
						<span class="text-danger">{{ $errors->first('old_password') }}</span>
					@endif
				</div>
					
			</div>

			<div class="form-group">
				{{ Form::label('password', 'Nieuw Wachtwoord: ', ['class' => 'col-sm-2 control-label']) }}
				<div class="col-sm-5">
					{{ Form::password('password', ['class' => 'form-control']) }}
					@if ($errors->has('password'))
						<span class="text-danger"> {{ $errors->first('password') }} </span>
					@endif
				</div>					
			</div>

			<div class="form-group">
				{{ Form::label('password_again', 'Confirmeer wachtwoord: ', ['class' => 'col-sm-2 control-label']) }}
				<div class="col-sm-5">
					{{ Form::password('password_again', ['class' => 'form-control']) }}
					@if ($errors->has('password_again'))
						<span class="text-danger"> {{ $errors->first('password_again') }} </span>
					@endif
				</div>					
			</div>

			<div class="form-group">
				<div class="col-sm-5 col-sm-offset-2">
					{{ Form::submit('Wijzigen', ['class' => 'btn btn-custom']) }}		
				</div>
			</div>			
		{{ Form::close() }}
	</div>
	
	
@stop