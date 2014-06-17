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
			<li class="active">
				<a href=" {{ URL::route('contacts.index') }} ">
					<span class="glyphicon glyphicon-envelope"></span> Berichten
				</a>
			</li>
			<li>
				<a href=" {{ URL::route('horses.admin.index') }} ">
					<span class="glyphicon glyphicon-shopping-cart"></span> Paarden
				</a>
			</li>
			<li>
				<a href=" {{ URL::route('items.admin.index') }} ">
					<span class="glyphicon glyphicon-pencil"></span> Nieuws
				</a>				
			</li>
		</ul>
	</div> <!-- End col-md-2 quicknav -->
	<div class="col-md-8 col-md-offset-1 truecontent">
		<h3> {{ $contact->subject }} </h3>
		<p> {{ nl2br($contact->message) }} </p>
		<br>
		<p><i>Bericht ontvangen van <a href="mailto:{{$contact->email}}">{{$contact->full_name}} </a> op {{ date("d-m-Y", strtotime($contact->created_at)) }} </i></p>
		<div class="bordertop overview">
			<a href=" {{ URL::route('contacts.index') }} "> <span class="glyphicon glyphicon-th-list"></span> Terug naar overzicht </a> - 
			<a href=" {{ URL::route('contacts.destroy',$contact->id) }} "> <span class="glyphicon glyphicon-trash"></span> Verwijderen </a>
		</div>
	</div>
@stop