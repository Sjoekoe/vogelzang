@extends('layouts.admin')

@section('content')
	@include('layouts._partials._quicknav_accounts')

	<div class="col-md-8 col-md-offset-1 truecontent">
		<h3>Voeg een gebruiker toe</h3>
		{{ Form::open(array('route' => 'accounts.store', 'role' => 'form', 'class' => 'form-horizontal')) }}
			<div class="form-group">
				{{ Form::label('email', 'Email: ', array('class' => 'col-sm-2 control-label')) }}
				<div class="col-sm-5">
					{{ Form::text('email', '', array('class' => 'form-control')) }}
					@if ($errors->has('email'))
						<span> {{ $errors->first('email') }} </span>
					@endif
				</div>				
			</div>

			<div class="form-group">
				{{ Form::label('username', 'Gebruikersnaam: ', array('class' => 'col-sm-2 control-label')) }}
				<div class="col-sm-5">
					{{ Form::text('username', '', array('class' => 'form-control')) }}
					@if ($errors->has('username'))
						<span> {{ $errors->first('username') }} </span>
					@endif
				</div>				
			</div>

			<div class="form-group">
				{{ Form::label('level_id', 'Gebruikersrechten: ', array('class' => 'col-sm-2 control-label')) }}
				<div class="col-sm-5">
					<select name="level_id" class="form-control">
						@foreach (Level::all() as $key=>$value)
							<option value=" {{$key+1}} "> {{$value->level}} </option>
						@endforeach
					</select>
				</div>				
			</div>

			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-5">
					{{ Form::submit('Creëer account', array('class' => 'btn btn-custom')) }}	
				</div>
			</div>

			
		{{ Form::close() }}
	</div> <!-- End truecontent -->

	
@stop