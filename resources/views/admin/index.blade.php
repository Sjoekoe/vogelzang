@extends('layouts.admin')

@section('content')
	@include('layouts._partials._quicknav_main')

	<div class="col-md-8 col-md-offset-1 truecontent">
		<h3>Overzicht</h3>
		<h2>Welkom {{ Auth::user()->username }} </h2>
		<div class="overview">
			<p>Momenteel zijn er {{ \Vogelzang\User::all()->count() }} gebruikers waarvan {{ \Vogelzang\User::where('active', '=', 1)->count() }} geactiveerd.</p>
			<p>Er zijn {{ \Vogelzang\Models\Contact::all()->count() }} berichten waarvan {{ \Vogelzang\Models\Contact::where('read', '=', 0)->count() }} ongelezen.</p>
			<p>Er staan {{ \Vogelzang\Models\Horse::all()->count() }} paarden te koop</p>
			<p>Er zijn {{ \Vogelzang\Models\Item::all()->count() }} nieuwsberichten gepubliceert</p>
		</div>
	</div> <!-- End truecontent -->
@stop
