@extends('layouts.main')

@section('content')
	<div class="sale lightpumpkin">
		<div class="container">
			<h2> {{ $item->title }} </h2>
			<div class="row">
				<div class="col-md-8 col-sm-12 salecontent">
					<div class="row">
						<p class="small"> {{ nl2br($item->message) }} </p>	
					</div>
					<br>
					<div class="row ">
						<div class="pull-left fb-share-button" data-href="{{ URL::route('items.show', $item->id) }}" data-type="button">
							
						</div>
						<p class="small pull-right author"><i>Gepost door {{ $item->user->username }} </i></p>
					</div>
					
				</div>
				<div class="col-md-4 col-sm-6 marginleft leftborder clearfix">
					<div class="thumbnail salethumb noshow pumpkin">
						@if ($item->itemphoto()->count())
							<div class="slider">
								<ul id="wrapper">
									<li>
										<a href=" {{ URL::to($item->itemphoto->path) }} " rel="gallery" title=" {{ $item->title }} " class="lightbox">
											{{ HTML::image($item->itemphoto->path) }}
										</a>	
									</li>
								</ul>
							</div>
						@else
							{{ HTML::image('images/items/random/'. rand(0, 8) .'.jpg') }}
						@endif
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 centered bottom">
					<ul class="homedisplay">
						<li>
							<a href=" {{ URL::route('items.index') }} "><span class="glyphicon glyphicon-list"></span></a>	
						</li>
						<li> 
							<a href=" {{ URL::route('home') }} "><span class="glyphicon glyphicon-home"></span></a> 
						</li>
					</ul>					
				</div>
			</div>
		</div>
	</div>
@stop

@section('script')
	<div id="fb-root"></div>
	<script>
		// window.fbAsyncInit = function() {
		// 	FB.init({
		// 		appId	: '489824724485150',
		// 		xfbml	: true,
		// 		version	: 'v2.0'
		// 	});
		// };
	
		(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/nl_NL/sdk.js#xfbml=1&appId=489824724485150&version=v2.0";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
@stop
	