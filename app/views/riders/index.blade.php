@extends('layouts.admin')

@section('content')
    @include('layouts._partials._users._sidebar')

    <div class="col-md-8 col-md-offset-1 truecontent">
        <h3>Ruiters</h3>
        <div class="panel panel-default">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th></th>
                    <th>Naam</th>
                    <th colspan="2"></th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <td colspan="4">  </td>
                </tr>
                </tfoot>
                <tbody>
                @if (count($riders))
                    @foreach ($riders as $rider)
                        <tr>
                            <td></td>
                            <td> {{ $rider->firstname . ' ' . $rider->lastname }} </a> </td>
                            <td> <a href="{{ route('rider.edit', $rider->id) }}"> <span class="glyphicon glyphicon-pencil"></span> </a> </td>
                            <td> <a href="{{ route('rider.delete', $rider->id) }}"> <span class="glyphicon glyphicon-trash"></span> </a> </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">
                            Nog geen ruiters aangemaakt
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div> <!-- End panel -->
        <div class="overview">
            <a href="{{ route('rider.create') }}"> <span class="glyphicon glyphicon-plus"></span> Ruiter toevoegen </a>
        </div>
    </div> <!-- End truecontent -->
@stop