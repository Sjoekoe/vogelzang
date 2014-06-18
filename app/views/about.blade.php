@extends('layouts.main')

@section('content')	
	<div class="sale lightsunflower">
		<div class="container">
			<h2>Over ons</h2>
			<div class="row">
				<div class="col-md-8 col-sm-6 rightborder">
					<p class="small">De opzetters van Stal de Vogelzang - Peter Wauters &amp; Kenny Bosman - waren van kleins af aan actief in de paardensport. <br>
					Bij de LRV en op allerlei paardenmarkten waren ze dan ook vaak geziene gezichten. </p>
					<p class="small">In 2002 besloten Peter &amp; Kenny om samen te gaan wonen, en zo kregen ze ook de mogelijkheid om hun hobby en interesse uit te breiden.</p>
					<p class="small">Na enig zoeken kochten ze een boerderij met een aantal weiden in lokeren. <br>
						De koeienstallen maakten plaats voor ruime paardenstallen en werd er een piste aangelegd.</p>
					<p class="small">Een naam zoeken voor de paardenstal bleek niet zo moeilijk te zijn. De boerderij is gelegen in de vogelzangstraat en op de boerderij hangt er nog steeds een bord met het opschrift "De Vogelzang".</p>
					<p class="small">Recentelijk hebben ze nog vernieuwingen aangebracht, en is er een grote binnenpiste gebouwd met ruime stallen.</p> <br>
				</div>
				<div class="col-md-4 col-sm-6 ">
					<div class="thumbnail salethumb sunflower">
						{{ HTML::image('images/about.png') }}
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 centered bottom">
					<ul>
						<li>
							<a href=" {{ URL::route('home') }} " ><span class="glyphicon glyphicon-home"></span></a>	
						</li>	
					</ul>
					
				</div>
			</div>
		</div>
	</div>
@stop