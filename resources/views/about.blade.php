@extends('layouts.main')

@section('content')
	<div class="sale lightsunflower">
		<div class="container">
			<h2>Over ons</h2>
			<div class="row">
				<div class="col-md-8 col-sm-6 rightborder rbshow">
					<p class="small">De opzetter van Stal de Vogelzang - Peter Wauters - was van kleins af aan actief in de paardensport. <br>
					Bij de LRV en op allerlei paardenmarkten was hij dan ook een vaak gezien gezicht. </p>
					<p class="small">Na enig zoeken kocht hij een boerderij met een aantal weiden in lokeren. <br>
						De koeienstallen maakten plaats voor ruime paardenstallen en werd er een piste aangelegd.</p>
					<p class="small">Een naam zoeken voor de paardenstal bleek niet zo moeilijk te zijn. De boerderij is gelegen in de vogelzangstraat en op de boerderij hangt er nog steeds een bord met het opschrift "De Vogelzang".</p>
					<p class="small">Recentelijk zijn er nog vernieuwingen aangebracht, en is er een grote binnenpiste gebouwd met ruime stallen.</p> <br>
				</div>
				<div class="col-md-4 col-sm-6 ">
					<div class="thumbnail salethumb noshow sunflower">
                        <img src="{{ asset('/images/peter2.png') }}" alt="Over ons">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 centered bottom">
					<ul>
						<li>
							<a href=" {{ route('home') }} " ><span class="glyphicon glyphicon-home"></span></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
@stop
