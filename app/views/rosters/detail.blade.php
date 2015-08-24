@extends('layouts.admin')

@section('content')
    @include('layouts._partials._quicknav_rosters')

    <div class="col-md-8 col-md-offset-1 truecontent">
        <h3>{{ Lang::get('days.names')[$roster->name] . ' ' . date('d/m/Y', strtotime($roster->date)) . ' (' . Lang::get('rosters')[$roster->type] . ') ' . Lang::get('days.hours')[$hour] }}</h3>
        <div class="panel panel-default">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Ruiter</th>
                    <th>Pony</th>
                    <th></th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <td colspan="3">  </td>
                </tr>
                </tfoot>
                <tbody>
                @if (count($lessons))
                    @foreach ($lessons as $lesson)
                        <tr>
                            <td>{{ $lesson->rider->fullName() }}</td>
                            <td>{{ $lesson->pony->name }}</td>
                            <td> <a href="{{ route('lesson.delete', $lesson->id) }}"> <span class="glyphicon glyphicon-trash"></span> </a> </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3">
                            Nog geen Lessen op dit uur
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div> <!-- End panel -->
        <div class="overview">
            <a href="{{ route('roster.show', $roster->id) }}">
                <span class="glyphicon glyphicon-arrow-left"></span> Terug
            </a>
        </div>
    </div> <!-- End truecontent -->
@stop