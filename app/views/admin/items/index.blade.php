@extends('layouts.admin')

@section('content')
	@include('layouts._partials._quicknav_items')

	<div class="col-md-8 col-md-offset-1 truecontent">
		<h3>Nieuwsberichten</h3>
		<div class="panel panel-default">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Onderwerp</th>
						<th>Auteur</th>
						<th colspan="4">Datum</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<td colspan="6"> {{ $items->links() }} </td>
					</tr>
				</tfoot>
				<tbody>
					@foreach ($items as $item)
						<tr>
							<td> <a href=" {{ URL::route('items.admin.show', $item->id) }} "> {{ $item->title }} </a> </td>
							<td> {{ $item->user->username }} </td>
							<td> {{ date("d-m-Y", strtotime($item->created_at)) }} </td>
							<td> <a href=" {{ URL::route('items.admin.show', $item->id) }} "> <span class="glyphicon glyphicon-eye-open"></span> </a> </td>
							<td> <a href=" {{ URL::route('items.edit', $item->id) }} "> <span class="glyphicon glyphicon-pencil"></span> </a> </td>
							<td> <a href=" {{ URL::route('items.destroy', $item->id) }} "> <span class="glyphicon glyphicon-trash"></span> </a> </td>
						</tr>
					@endforeach
				</tbody>
			</table>			
		</div> <!-- End panel -->
		<div class="overview">
			<a href=" {{ URL::route('items.create') }} "> <span class="glyphicon glyphicon-plus"></span> Bericht toevoegen </a>
		</div>
	</div> <!-- End truecontent -->
@stop