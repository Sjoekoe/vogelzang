@extends('layouts.admin')

@section('content')
    @include ('layouts._partials._quicknav_horses')

	<div class="col-md-8 col-md-offset-1 truecontent">
		<h3>Paarden te koop</h3>
		<div class="panel panel-default">
			<table class="table table-striped">
				<thead>
					<tr>
						<th></th>
						<th>Naam</th>
						<th>Ras</th>
						<th>Leeftijd</th>
						<th>Geslacht</th>
						<th colspan="4">Prijs</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<td colspan="9">
                            @include('pagination.mine', ['paginator' => $horses])
                        </td>
					</tr>
				</tfoot>
				<tbody>
					@foreach ($horses as $horse)
						<tr>
							<td> @if ($horse->horsepicture->count() === 0)
								<span class="glyphicon glyphicon-warning-sign"></span>
							@endif </td>
							<td> <a href=" {{ URL::route('horses.admin.show', $horse->id) }} "> {{ $horse->name }} </a> </td>
							<td> {{ $horse->breed }} </td>
							<td> {{ $horse->age }} </td>
							<td> {{ $horse->gender->gender }} </td>
							<td> {{ $horse->price->price }} </td>
							<td> <a href=" {{ URL::route('horses.admin.show', $horse->id) }} "> <span class="glyphicon glyphicon-eye-open"></span> </a> </td>
							<td> <a href=" {{ URL::route('horses.edit', $horse->id) }} "> <span class="glyphicon glyphicon-pencil"></span> </a> </td>
							<td> <a href=" {{ URL::route('horses.destroy', $horse->id) }} "> <span class="glyphicon glyphicon-trash"></span> </a> </td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div> <!-- End panel -->
		<div class="overview">
			<a href=" {{ URL::route('horses.create') }} "> <span class="glyphicon glyphicon-plus"></span> Paard toevoegen </a>
		</div>
	</div> <!-- End truecontent -->
@stop
