@extends('layouts.admin')

@section('content')
    @include('layouts._partials._quicknav_rosters')

    <div class="col-md-8 col-md-offset-1 truecontent">
        <h3>Voeg een Les toe</h3>

        {{ Form::open(['route' => 'roster.store', 'class' => 'form-horizontal']) }}
        <!-- Name Form input -->
        <div class="form-group">
            {{ Form::label('name', 'Dag:') }}
            {{ Form::select('name', Lang::get('days.names'), null, ['class' => 'form-control']) }}
            @if ($errors->has('name'))
                <span> {{ $errors->first('name') }} </span>
            @endif
        </div>
        <!-- Name Form input -->
        <div class="form-group">
            {{ Form::label('date', 'Datum:', ['class' => 'control-label']) }}
            <div class="controls">
                {{ Form::text('date', null, ['class' => 'form-control', 'placeholder' => 'dd/mm/YYYY']) }}
                @if ($errors->has('date'))
                    <span> {{ $errors->first('date') }} </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('hour', 'Uur:', ['class' => 'control-label']) }}
            {{ Form::select('hour', Lang::get('days.hours'), null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('type', 'Soort les') }}
            {{ Form::select('type', Lang::get('rosters'), null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('limit', 'Limiet:') }}
            {{ Form::text('limit', 12, ['class' => 'form-control']) }}
            @if ($errors->has('limit'))
                <span>{{ $errors->first('limit') }}</span>
            @endif
        </div>

        <!-- Description Form input -->
        <div class="form-group">
            {{ Form::label('description', 'Opmerkingen:') }}
            {{ Form::textarea('description', null, ['class' => 'form-control']) }}
        </div>

        <!-- Submit button -->
        <div class="form-group">
            {{ Form::submit('Opslaan', ['class' => 'btn btn-custom']) }}
        </div>
        {{ Form::close() }}
    </div> <!-- End truecontent -->
@stop