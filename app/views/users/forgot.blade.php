@extends('layouts.main')

@section('content')

	<div class="sale lightpurple">
		<div class="container">
			<h2>Wachtwoord vergeten</h2>
			@if (Session::has('global'))
				<p class="global centered"> {{ Session::get('global') }} </p>
			@else
				<div class="row">
					<div class="col-md-8 col-md-offset-3">
						{{ Form::open(array('class' => 'form-horizontal', 'role' => 'form')) }}
							<div class="form-group">
								{{ Form::label('email', 'email: ', array('class' => 'col-sm-2 control-label')) }}
								<div class="col-sm-5">
									{{ Form::text('email', '', array('class' => 'form-control')) }}
									@if ($errors->has('email'))
										<span>{{$errors->first('email')}}</span>
									@endif
								</div>								
							</div>

							<div class="col-sm-3 col-sm-offset-3">
								<div class="no-top-margin">
									{{ Form::submit('vraag aan', array('class' => 'btn purple no-top-margin')) }}		
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