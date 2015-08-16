@extends('layouts.admin')

@section('content')
    @include('layouts._partials._quicknav_accounts')

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