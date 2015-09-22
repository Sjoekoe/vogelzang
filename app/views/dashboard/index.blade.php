@extends('layouts.admin')

@section('content')
    @include('layouts._partials._users._sidebar')

    <div class="col-md-8 col-md-offset-1 truecontent">
        <h3>Overzicht</h3>
        <h2>Welkom {{ Auth::user()->username }} </h2>
        <div class="overview">
            <p>In deze zone van de website kan u uw ruiters aanmaken en inschrijven voor diverse lessen en wandelingen.</p>
            <p>Het volledige schema van alle lessen vindt u <a href="{{ route('rosters.index') }}" class="underlined">hier.</a></p>
            <br/>
            <p><b>Opgelet:</b> U kan ten laatste 12 uur voor de aanvang van de les annuleren. Indien de ruiter nog staat ingeschreven zal een lesbeurt worden aangerekend.</p>
        </div>
        <h2>Eerst volgende lessen</h2>
        <div class="overview">
            @foreach($rosters as $roster)
                <p>
                    <a href="{{ route('roster.show', $roster->id) }}" class="underlined">
                        {{ Lang::get('days.names')[$roster->name] . ' ' . date('d/m/Y', strtotime($roster->date)) . ' (' . Lang::get('rosters')[$roster->type] . ')' }}
                    </a>
                </p>
            @endforeach
        </div>
        @foreach($lessons as $key => $values)
            <h2>{{ $key }}</h2>
            <div class="overview">
                @foreach($values as $value)
                    <div class="row">
                        <div class="col-md-6">
                            {{ $value['roster'] }}
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div> <!-- End truecontent -->
@stop