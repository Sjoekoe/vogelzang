@extends('layouts.admin')

@section('content')
    @include('layouts._partials._quicknav_accounts')

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
			<div class="col-sm-2">Nieuwsberichten:</div> <div class="col-sm-10">Deze persoon heeft {{ \Vogelzang\Models\Item::where('user_id', '=', $user->id)->count() }} nieuwsberichten geplaatst.</div>
		</div>
		<div class="overview bordertop">
			<a href=" {{ URL::route('accounts.index') }} "> <span class="glyphicon glyphicon-th-list"></span> Terug naar overzicht </a> -
			<a href=" {{ URL::route('accounts.edit', $user->id) }} "> <span class="glyphicon glyphicon-pencil"></span> Bewerken </a> -
			<a href=" {{ URL::route('accounts.destroy',$user->id) }} "> <span class="glyphicon glyphicon-trash"></span> Verwijderen </a>
		</div>
	</div>
@stop
