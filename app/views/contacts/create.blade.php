@extends('layouts.main')

@section('content')
	<div class="sale lightpurple">
		<div class="container">
			<h2>Contacteer ons</h2>
			<div class="row">
				@if (Session::has('global'))
					<p class="global centered"> {{ Session::get('global') }} </p>
				@else
					<div class="col-md-8 col-sm-12 rightborder">
						{{ Form::open(array('class' => 'form-horizontal', 'role' => 'form')) }}
							<div class="col-md-9 col-sm-12 rightborder">							
								<div class="form-group">
									{{ Form::label('full_name', 'Naam: ', array('class' => 'col-sm-2 control-label')) }}
									<div class="col-sm-10">
										{{ Form::text('full_name', '', array('class' => 'form-control')) }}
										@if ($errors->has('full_name'))
											<span class="error"> {{ $errors->first('full_name') }} </span>
										@endif
									</div>	<!-- End col-sm-10 -->							
								</div> <!-- End form-group -->

								<div class="form-group">
									{{ Form::label('subject', 'Onderwerp: ', array('class' => 'col-sm-2 control-label')) }}
									<div class="col-sm-10">
										{{ Form::text('subject', '', array('class' => 'form-control')) }}
										@if ($errors->has('subject'))
											<span class="error"> {{ $errors->first('subject') }} </span>
										@endif
									</div> 	<!-- End col-sm-10 -->						
								</div> <!-- End form-group -->

								<div class="form-group">
									{{ Form::label('email', 'Email: ', array('class' => 'col-sm-2 control-label')) }}
									<div class="col-sm-10">
										{{ Form::text('email', '', array('class' => 'form-control')) }}
										@if ($errors->has('email'))
											<span class="error"> {{ $errors->first('email') }} </span>
										@endif
									</div> <!-- End col-sm-8 -->					
								</div> <!-- End form-group -->

								<div class="form-group">
									{{ Form::label('message', 'Bericht: ', array('class' => 'col-sm-2 control-label')) }}
									<div class="col-sm-10">
										{{ Form::textarea('message', '', array('class' => 'form-control transparent')) }}
										@if ($errors->has('message'))
											<span class="error"> {{ $errors->first('message') }} </span>
										@endif
									</div> <!-- End col-sm-10 -->						
								</div> <!-- End form gorup -->
								<div class="form-group">
									<div class="col-sm-offset-5 col-sm-4">
										{{ Form::submit('Verzenden', array('class' => 'btn purple')) }}
									</div>
								</div>
							</div> <!-- End col-md-10 -->
						{{ Form::close() }}
						<div class="col-md-3 col-sm-12">
							<div class="contact-data  ">
								<div class="address col-md-12 col-sm-3">
									<h4>Adres</h4>
									<p>Vogelzangstraat 12 <br>
										9160 Lokeren</p>
								</div> <!-- End address -->
								<div class="phone col-md-12 col-sm-3">
									<h4>Telefoon</h4>
									<p><a href="tel:+32475295760"> +32 (0) 475.29.57.60</a></p>
									<p><a href="tel:+32476881184"> +32 (0) 476.88.11.84</a></p>
								</div> <!-- End phone -->
								<div class="mail col-md-12 col-sm-3">
									<h4>Mail</h4>
									<p><a href="mailto:info@staldevogelzang.be"> info@staldevogelzang.be</a></p>
								</div> <!-- End mail -->
								<div class="Socialmedia col-md-12 col-sm-3">
									<h4>Volg ons</h4>
									<p> <a href="https://www.facebook.com/groups/180597618657465/">Facebook</a> </p>
								</div> <!-- End social media -->
							</div> <!-- End contact-data -->							
						</div> <!-- End col-md 2 -->						
					</div> <!-- End col-md-10 rightborder -->
					<div class="col-md-4 col-sm-6 marginleft">
						<div class="thumbnail salethumb noshow purple">
							{{ HTML::image('images/contact2.jpg') }}
						</div>
					</div> <!-- End col-md-2 -->
				@endif
			</div> <!-- End row -->
			<div class="row">
				<div class="col-md-12 centered bottom">
					<li>
						<a href=" {{ URL::route('home') }} "><span class="glyphicon glyphicon-home"></span></a>	
					</li>					
				</div>
			</div> <!-- End row -->
		</div> <!-- End container -->
	</div> <!-- End sale -->	
@stop