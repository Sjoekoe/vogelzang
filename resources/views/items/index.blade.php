@extends('layouts.main')

@section('content')
	<div class="sale lightpumpkin">
		<div class="container">
			<h2>Nieuws</h2>
			<div class="row">
				@if (!$items->count())
					<p>Er zijn geen berichten gevonden</p>
				@else
				<div class="col-md-8 col-sm-12">
					@foreach ($items as $item)
						<a href=" {{ route('items.show', $item->id) }} ">

							<p class="noborder itemtitle">{{ date("d M Y", strtotime($item->created_at)) }} - {{ $item->title }} </p>
							<!-- <p class="small"> {{ $item->message }} </p> -->
							<!-- <small class="">Gepost door: {{ $item->user->username }} </small> -->
						</a>
					@endforeach
					<div class="col-md-12 col-sm-12">
						@include('pagination.mine', ['paginator' => $items])
					</div>
				</div>
					<div class="col-md-4 col-sm-6 marginleft">
						<div class="leftborder">
							<div class="thumbnail salethumb noshow pumpkin">
								<img src="{{ asset('/images/news2.jpg') }}" alt="Nieuws">
							</div>
						</div>

						<br>
					</div>
				@endif
			</div>
			<div class="row">
				<div class="col-md-12 centered bottom">
					<li>
						<a href=" {{ route('home') }} "> <span class="glyphicon glyphicon-home"></span> </a>
					</li>
				</div>
			</div>
		</div>
	</div>
@stop
