@extends('layouts.admin')

@section('content')
    @include('layouts._partials._quicknav_pony')

    <div class="col-md-8 col-md-offset-1 truecontent">
        <h3>Lespony's</h3>
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
                @if (count($ponies))
                    @foreach ($ponies as $pony)
                        <tr>
                            <td></td>
                            <td> {{ $pony->name }} </a> </td>
                            <td> <a href="{{ route('pony.edit', $pony->id) }}"> <span class="glyphicon glyphicon-pencil"></span> </a> </td>
                            <td> <a href="{{ route('pony.delete', $pony->id) }}"> <span class="glyphicon glyphicon-trash"></span> </a> </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">
                            Nog geen pony's beschikbaar
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div> <!-- End panel -->
        <div class="overview">
            <a href="{{ route('pony.create') }}"> <span class="glyphicon glyphicon-plus"></span> Pony toevoegen </a>
        </div>
    </div> <!-- End truecontent -->
@stop