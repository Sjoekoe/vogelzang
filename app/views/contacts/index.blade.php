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
			<li >
				<a href=" {{ URL::route('accounts.index') }} ">
					<span class="glyphicon glyphicon-user"></span> Gebruikers
				</a>	
			</li>
			<li class="active">
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
		<h3>Contactberichten</h3>
		<div class="panel panel-default">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Afzender</th>	
						<th>Onderwerp</th>					
						<th colspan="4">Ontvangen op</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<td colspan="6"> {{ $contacts->links() }} </td>
					</tr>
				</tfoot>
				<tbody>
					@foreach ($contacts as $contact)
						@if ($contact->read === 1)
							<tr>
						@else 
							<tr class="bold">
						@endif
							<td> {{{ $contact->full_name }}} </td>
							<td> {{{ $contact->subject }}} </td>
							<td> {{ date("d-m-Y", strtotime($contact->created_at)) }} </td>
							<td> <a href=" {{ URL::route('contacts.show', $contact->id) }} "> <span class="glyphicon glyphicon-eye-open"></span> </a> </td>
							<td> <a href=" {{ URL::route('contacts.destroy', $contact->id) }} "> <span class="glyphicon glyphicon-trash"></span> </a> </td>
						</tr>
					@endforeach
				</tbody>
			</table>			
		</div> <!-- End panel -->
	</div>
@stop