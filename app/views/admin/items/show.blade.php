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
			<li>
				<a href=" {{ URL::route('accounts.index') }} ">
					<span class="glyphicon glyphicon-user"></span> Gebruikers
				</a>							
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
			<li class="active">
				<a href=" {{ URL::route('items.admin.index') }} ">
					<span class="glyphicon glyphicon-pencil"></span> Nieuws
				</a>
				<ul>
					<li>
						<a href=" {{ URL::route('items.create') }} ">
							<span class="glyphicon glyphicon-plus"></span> Bericht toevoegen
						</a>
					</li>
				</ul>			
			</li>
		</ul>
	</div> <!-- End col-md-2 quicknav -->
	<div class="col-md-8 col-md-offset-1 truecontent">
		<h3> {{ $item->title }} </h3>
		@if ($item->itemphoto()->count())
			<div class="col-md-8">
		@else 
			<div class="col-md-12">
		@endif
			<p>{{ nl2br($item->message) }}</p>
		</div>
		@if ($item->itemphoto()->count())
			<div class="col-md-4">
                @foreach ($item->itemphoto as $photo)
				<div class="thumbnail">
					{{ HTML::image($photo->path) }}
				</div>
                @endforeach
			</div>
		@endif
		<br>
		<p> <i> Aangemaakt door {{$item->user->username}} </i> </p>
		<div class="bordertop overview">
			<a href=" {{ URL::route('items.admin.index') }} "> <span class="glyphicon glyphicon-th-list"></span> Terug naar overzicht </a> - 
			<a href=" {{ URL::route('items.edit', $item->id) }} "> <span class="glyphicon glyphicon-pencil"></span> Bewerken </a> - 
			<a href=" {{ URL::route('items.destroy',$item->id) }} "> <span class="glyphicon glyphicon-trash"></span> Verwijderen </a>
		</div>
	</div>
@stop