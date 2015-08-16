@extends('layouts.admin')

@section('content')
    @include('layouts._partials._quicknav_accounts')

	<div class="col-md-8 col-md-offset-1 truecontent">
		<h3>Gebruikerslijst</h3>
		<div class="panel panel-default">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Gebruikersnaam</th>
						<th>Email</th>
						<th>Voornaam</th>
						<th>Achternaam</th>
						<th>Actief</th>
						<th colspan="4">Rol</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<td colspan="9"> {{ $users->links() }} </td>
					</tr>
				</tfoot>
				<tbody>
					@foreach ($users as $user)
						<tr>
							<td> <a href=" {{ URL::route('accounts.show', $user->id) }} "> {{ $user->username }}</a> </td>
							<td> {{ $user->email }} </td>
							<td> {{ $user->first_name }} </td>
							<td> {{ $user->last_name }} </td>
							<td>
								@if ($user->active === 1)
									Ja
								@else
									Nee
								@endif
							</td>
							<td> {{ $user->level->level }} </td>
							<td> <a href=" {{ URL::route('accounts.show', $user->id) }} "> <span class="glyphicon glyphicon-eye-open"></span> </a> </td>
							<td> <a href=" {{ URL::route('accounts.edit', $user->id) }} "> <span class="glyphicon glyphicon-pencil"></span> </a> </td>
							<td> <a href=" {{ URL::route('accounts.destroy', $user->id) }} "> <span class="glyphicon glyphicon-trash"></span> </a> </td>
						</tr>
					@endforeach
				</tbody>
			</table>			
		</div> <!-- End panel -->
		<div class="overview">
			<a href=" {{ URL::route('accounts.create') }} "> <span class="glyphicon glyphicon-plus"></span> Gebruiker toevoegen </a>
		</div>
	</div> <!-- End truecontent -->
@stop