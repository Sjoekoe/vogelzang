@extends('layouts.admin')

@section('content')
    @if (Auth::user()->isAdmin())
        @include('layouts._partials._quicknav_accounts')
    @else
        @include('layouts._partials._users._sidebar')
    @endif

	<div class="col-md-8 col-md-offset-1 truecontent">
		<h3>Wijzig uw gegevens</h3>
		{{ Form::model($user, ['method' => 'patch', 'role' => 'form', 'class' => 'form-horizontal', 'route' => ['user.update', auth()->user()->id]]) }}

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
