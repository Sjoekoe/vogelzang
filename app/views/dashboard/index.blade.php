@extends('layouts.admin')

@section('content')
    @include('layouts._partials._users._sidebar')

    <div class="col-md-8 col-md-offset-1 truecontent">
        <h3>Overzicht</h3>
        <h2>Welkom {{ Auth::user()->username }} </h2>
        <div class="overview">
            <p>In deze zone van de website kan u uw ruiters aanmaken en inschrijven voor diverse lessen en wandelingen.</p>
            <p>Het volledige schema van alle lessen vindt u <a href="{{ route('rosters.index') }}">hier.</a></p>
            <br/>
        </div>
        <h2>Eerst volgende lessen</h2>
        <div class="overview">
            @foreach($rosters as $roster)
                <p>
                    <a href="{{ route('roster.show', $roster->id) }}">
                        {{ Lang::get('days.names')[$roster->name] . ' ' . date('d/m/Y', strtotime($roster->date)) . ' (' . Lang::get('rosters')[$roster->type] . ')' }}
                    </a>
                </p>
            @endforeach
        </div>
    </div> <!-- End truecontent -->
@stop