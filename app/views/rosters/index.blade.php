@extends('layouts.admin')

@section('content')
    @include('layouts._partials._quicknav_rosters')

    <div class="col-md-8 col-md-offset-1 truecontent">
        <h3>Lessen</h3>
        <div class="panel panel-default">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Naam</th>
                    <th colspan="2"></th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <td colspan="4"> {{ $rosters->links() }} </td>
                </tr>
                </tfoot>
                <tbody>
                @if (count($rosters))
                    @foreach ($rosters as $roster)
                        <tr>
                            <td>{{ Lang::get('days.names')[$roster->name] . ' ' . date('d/m/Y', strtotime($roster->date)) . ' (' . Lang::get('rosters')[$roster->type] . ')' }}</td>
                            <td> <a href="{{ route('roster.edit', $roster->id) }}"> <span class="glyphicon glyphicon-pencil"></span> </a> </td>
                            <td> <a href="{{ route('roster.delete', $roster->id) }}"> <span class="glyphicon glyphicon-trash"></span> </a> </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">
                            Nog geen lessen beschikbaar
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div> <!-- End panel -->
        <div class="overview">
            <a href="{{ route('roster.create') }}"> <span class="glyphicon glyphicon-plus"></span> Les toevoegen </a>
        </div>
    </div> <!-- End truecontent -->
@stop