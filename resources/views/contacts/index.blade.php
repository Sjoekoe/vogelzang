@extends('layouts.admin')

@section('content')
    @include('layouts._partials._quicknav_contacts')

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
						<td colspan="6">
                            @include('pagination.mine', ['paginator' => $contacts])
                        </td>
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
							<td> <a href=" {{ URL::route('contacts.delete', $contact->id) }} "> <span class="glyphicon glyphicon-trash"></span> </a> </td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div> <!-- End panel -->
	</div>
@stop
