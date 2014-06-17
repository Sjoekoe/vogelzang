@extends('layouts.admin')

@section('content')
	<div class="col-md-2 quicknav">
		<h3>Snelmenu</h3>
		<ul>
			<li class="active">
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
			<li>
				<a href=" {{ URL::route('items.admin.index') }} ">
					<span class="glyphicon glyphicon-pencil"></span> Nieuws
				</a>
			</li>
		</ul>
	</div> <!-- End col-md-2 quicknav -->
	<div class="col-md-8 col-md-offset-1 truecontent">
		<h3>Overzicht</h3>
		<h2>Welkom {{ Auth::user()->username }} </h2>
		<div class="overview">
			<p>Momenteel zijn er {{ User::all()->count() }} gebruikers waarvan {{ User::where('active', '=', 1)->count() }} geactiveerd.</p>
			<p>Er zijn {{ Contact::all()->count() }} berichten waarvan {{ Contact::where('read', '=', 0)->count() }} ongelezen.</p>
			<p>Er staan {{ Horse::all()->count() }} paarden te koop</p>
			<p>Er zijn {{ Item::all()->count() }} nieuwsberichten gepubliceert</p>
		</div>
	</div> <!-- End truecontent -->
@stop