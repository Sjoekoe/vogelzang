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
			<li class="active">
				<a href=" {{ URL::route('accounts.index') }} ">
					<span class="glyphicon glyphicon-user"></span> Gebruikers
				</a>
				<ul>
					<li>
						<a href=" {{ URL::route('accounts.create') }} ">
							<span class="glyphicon glyphicon-plus"></span> Gebruiker toevoegen
						</a>
					</li>
					<li>
						<a href=" {{ URL::route('user.edit') }} ">
							<span class="glyphicon glyphicon-pencil"></span> Gegevens wijzigen
						</a>
					</li>
					<li>
						<a href=" {{ URL::route('user.update.password') }} ">
							<span class="glyphicon glyphicon-random"></span> Wachtwoord wijzigen
						</a>
					</li>
				</ul>			
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
		<h3> Profiel van {{ $user->username}} </h3>
		<div class="row">
			<div class="col-sm-2">Naam:</div> <div class="col-sm-10">{{ $user->first_name }} {{ $user->last_name }}</div>
		</div>
		<div class="row">
			<div class="col-sm-2">Email:</div> <div class="col-sm-10"> {{$user->email}} </div>
		</div>
		<div class="row">
			<div class="col-sm-2">Lid sinds:</div> <div class="col-sm-10">{{ date("d-m-Y", strtotime($user->created_at)) }}</div>
		</div>
		<div class="row">
			<div class="col-sm-2">Nieuwsberichten:</div> <div class="col-sm-10">Deze persoon heeft {{ Item::where('user_id', '=', $user->id)->count() }} nieuwsberichten geplaatst.</div>
		</div>
		<div class="overview bordertop">
			<a href=" {{ URL::route('accounts.index') }} "> <span class="glyphicon glyphicon-th-list"></span> Terug naar overzicht </a> - 
			<a href=" {{ URL::route('accounts.edit', $user->id) }} "> <span class="glyphicon glyphicon-pencil"></span> Bewerken </a> - 
			<a href=" {{ URL::route('accounts.destroy',$user->id) }} "> <span class="glyphicon glyphicon-trash"></span> Verwijderen </a>
		</div>
	</div>
@stop