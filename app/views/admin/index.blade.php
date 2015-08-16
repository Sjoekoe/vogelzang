@extends('layouts.admin')

@section('content')
	@include('layouts._partials._quicknav_main')

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