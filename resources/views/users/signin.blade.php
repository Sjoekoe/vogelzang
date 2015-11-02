@extends('layouts.main')

@section('content')
	<div class="sale lightpurple">
		<div class="container">
			<h2>Inloggen</h2>
			@if (Session::has('global'))
				<p class="global"> {{ Session::get('global') }} </p>
			@else
				<div class="row">
					<div class="col-md-8 col-md-offset-4">
						{{ Form::open(array('class' => 'form-horizontal', 'role' => 'form')) }}
							<div class="form-group">
								{{ Form::label('username', 'Gebruikersnaam: ', array('class' => 'col-sm-2 control-label')) }}
								<div class="col-sm-4">
									{{ Form::text('username', '', array('class' => 'form-control')) }}
									@if ($errors->has('username'))
										<span>{{$errors->first('username')}}</span>
									@endif
								</div>								
							</div>

							<div class="form-group">
								{{ Form::label('password', 'Wachtwoord: ', array('class' => 'col-sm-2 control-label')) }}
								<div class="col-sm-4">
									{{ Form::password('password', array('class' => 'form-control')) }}
									@if ($errors->has('password'))
										<span>{{ $errors->first('password') }}</span>
									@endif
									<br> <span> <a href=" {{URL::route('user.recover-password')}} ">Wachtwoord vergeten?</a></span>							
								</div>								
							</div>

							<div class="form-group">
								{{ Form::label('remember', 'Onthouden: ', array('class' => 'col-sm-2 control-label')) }}
								<div class="col-sm-4 checkbox  ">
									{{ Form::checkbox('remember', '', array('class' => 'form-control', 'checked' => 'unchecked')) }}
								</div>
							</div> 
							<div class="col-sm-4 col-sm-offset-2">
								<div class="no-top-margin">
									{{ Form::submit('Log in', array('class' => 'btn purple no-top-margin')) }}		
								</div>								
							</div>							
						{{ Form::close() }}
					</div>
				</div>
			@endif
			<div class="row">
				<div class="col-md-12 centered bottom">
					<li>
						<a href=" {{ URL::route('home') }} " ><span class="glyphicon glyphicon-home"></span></a>	
					</li>					
				</div>
			</div> <!-- End row -->
		</div>
	</div>
@stop

		

		

		