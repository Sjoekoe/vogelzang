@extends('layouts.admin')

@section('content')
    @if (Auth::user()->isAdmin())
        @include('layouts._partials._quicknav_rosters')
    @else
        @include('layouts._partials._users._sidebar')
    @endif

    <div class="col-md-8 col-md-offset-1 truecontent">
        <h3>Lessen</h3>
        <div class="panel panel-default">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Datum</th>
                    @if (Auth::user()->isAdmin())
                        <th colspan="7"></th>
                    @else
                        <th colspan="5"></th>
                    @endif
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <td colspan="{{ Auth::user()->isAdmin() ? 7 : 5 }}"> {{ $rosters->links() }} </td>
                </tr>
                </tfoot>
                <tbody>
                @if (count($rosters))
                    @foreach ($rosters as $roster)
                        <tr>
                            <td>
                                {{ Lang::get('days.names')[$roster->name] . ' ' . date('d/m/Y', strtotime($roster->date)) }}
                            </td>
                            <td>
                                {{ Lang::get('days.hours')[$roster->hour] }}
                            </td>
                            <td>
                                {{ Lang::get('rosters')[$roster->type] }}
                            </td>
                            @if (Auth::user()->isAdmin())
                                <td>
                                    {{ count($roster->subscriptions) }} inschrijvingen
                                </td>
                            @endif
                            @if (Auth::user()->isAdmin())
                                <td><a href="{{ route('roster.show', $roster->id) }}"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                                <td> <a href="{{ route('roster.edit', $roster->id) }}"> <span class="glyphicon glyphicon-pencil"></span> </a> </td>
                                <td> <a href="{{ route('roster.delete', $roster->id) }}"> <span class="glyphicon glyphicon-trash"></span> </a> </td>
                            @else
                                <td colspan="2"></td>
                                <td><a href="{{ route('roster.show', $roster->id) }}"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                            @endif
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">
                            Nog geen lessen beschikbaar
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div> <!-- End panel -->
        <div class="overview">
            @if (Auth::user()->isAdmin())
                <a href="{{ route('roster.create') }}"> <span class="glyphicon glyphicon-plus"></span> Les toevoegen </a>
            @endif
        </div>
    </div> <!-- End truecontent -->
@stop