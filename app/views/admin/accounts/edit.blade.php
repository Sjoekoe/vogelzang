@extends('layouts.admin')

@section('content')
    @include('layouts._partials._quicknav_accounts')

	<div class="col-md-8 col-md-offset-1 truecontent">
		<h3>Gebruiker aanpassen - {{ $user->username }} </h3>
		{{ Form::model($user, array('method' => 'patch' ,'role' => 'form', 'class' => 'form-horizontal', 'route' => array('accounts.update', $user->id))) }}
			<div class="form-group">
				{{ Form::label('email', 'Email: ', array('class' => 'col-sm-2 control-label')) }}
				<div class="col-sm-5">
					{{ Form::text('email', $user->email, array('class' => 'form-control')) }}
					@if ($errors->has('email'))
						<span> {{ $errors->first('email') }} </span>
					@endif
				</div>				
			</div>

			<div class="form-group">
				{{ Form::label('username', 'Gebruikersnaam: ', array('class' => 'col-sm-2 control-label')) }}
				<div class="col-sm-5">
					{{ Form::text('username', $user->username , array('class' => 'form-control')) }}
					@if ($errors->has('username'))
						<span> {{ $errors->first('username') }} </span>
					@endif
				</div>				
			</div>

			<div class="form-group">
				{{ Form::label('first_name', 'Voornaam: ', array('class' => 'col-sm-2 control-label')) }}
				<div class="col-sm-5">
					{{ Form::text('first_name', $user->first_name, array('class' => 'form-control')) }}
				</div>
			</div>

			<div class="form-group">
				{{ Form::label('last_name', 'Achternaam: ', array('class' => 'col-sm-2 control-label')) }}
				<div class="col-sm-5">
					{{ Form::text('last_name', $user->last_name, array('class' => 'form-control')) }}
				</div>
			</div>

			<div class="form-group">
				{{ Form::label('level_id', 'Gebruikersrechten: ', array('class' => 'col-sm-2 control-label')) }}
				<div class="col-sm-5">
					<select name="level_id" class="form-control" >
					<option value="{{$user->level_id}}"> {{ $user->level->level }} </option>
					@foreach (Level::all() as $key=>$value)
						<option value=" {{$key+1}} "> {{$value->level}} </option>
					@endforeach
				</select>
				</div>				
			</div>

			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-5">
					{{ Form::submit('Bijwerken', array('class' => 'btn btn-custom')) }}		
				</div>
			</div>			
		{{ Form::close() }}
		<div class="overview bordertop">
			<a href=" {{ URL::route('accounts.index') }} "> <span class="glyphicon glyphicon-th-list"></span> Terug naar overzicht </a> - 
			<a href=" {{ URL::route('accounts.show', $user->id) }} "> <span class="glyphicon glyphicon-eye-open"></span> Bekijken </a> - 
			<a href=" {{ URL::route('accounts.destroy',$user->id) }} "> <span class="glyphicon glyphicon-trash"></span> Verwijderen </a>
		</div>
	</div>

		
@stop