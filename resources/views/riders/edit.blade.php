@extends('layouts.admin')

@section('content')
    @include('layouts._partials._users._sidebar')

    <div class="col-md-8 col-md-offset-1 truecontent">
        <h3>Wijzig {{ $rider->firstname . ' ' . $rider->lastname }}</h3>

        {{ Form::open(['route' => ['rider.update', $rider->id], 'method' => 'PATCH']) }}
        <!-- Firstname Form input -->
        <div class="form-group">
            {{ Form::label('firstname', 'Voornaam:') }}
            {{ Form::text('firstname', $rider->firstname, ['class' => 'form-control']) }}
            @if ($errors->has('firstname'))
                <span> {{ $errors->first('firstname') }} </span>
            @endif
        </div>
        <!-- Lastname Form input -->
        <div class="form-group">
            {{ Form::label('lastname', 'Achternaam:') }}
            {{ Form::text('lastname', $rider->lastname, ['class' => 'form-control']) }}
            @if ($errors->has('lastname'))
                <span> {{ $errors->first('lastname') }} </span>
            @endif
        </div>

        @if (auth()->user()->isAdmin())
            <div class="form-group">
                {{ Form::label('turns', 'Beurten') }}
                {{ Form::text('turns', $rider->turns, ['class' => 'form-control']) }}
            </div>
        @endif

        <!-- Submit button -->
        <div class="form-group">
            {{ Form::submit('Opslaan', ['class' => 'btn btn-custom']) }}
        </div>
        {{ Form::close() }}
    </div> <!-- End truecontent -->
@stop
