@extends('layouts.admin')

@section('content')
    @include('layouts._partials._quicknav_rosters')

    <div class="col-md-8 col-md-offset-1 truecontent">
        <h3>Wijzig lesdag</h3>

        {{ Form::open(['route' => ['roster.update', $roster->id], 'class' => 'form-horizontal', 'method' =>'PATCH']) }}
        <!-- Name Form input -->
        <div class="form-group">
            {{ Form::label('name', 'Dag:') }}
            {{ Form::select('name', Trans('days.names'), $roster->name, ['class' => 'form-control']) }}
        </div>
        <!-- Name Form input -->
        <div class="form-group">
            {{ Form::label('date', 'Date:', ['class' => 'control-label']) }}
            <div class="controls">
                {{ Form::text('date', date('d/m/Y', strtotime($roster->date)), ['class' => 'form-control', 'placeholder' => 'dd/mm/YYYY']) }}
                @if ($errors->has('date'))
                    <span> {{ $errors->first('date') }} </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('hour', 'Uur:', ['class' => 'control-label']) }}
            {{ Form::select('hour', Lang::get('days.hours'), $roster->hour, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('type', 'Soort les') }}
            {{ Form::select('type', Lang::get('rosters'), $roster->type, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('limit', 'Limiet:') }}
            {{ Form::text('limit', $roster->limit, ['class' => 'form-control']) }}
            @if ($errors->has('limit'))
                <span>{{ $errors->first('limit') }}</span>
            @endif
        </div>

        <!-- Description Form input -->
        <div class="form-group">
            {{ Form::label('description', 'Opmerking:') }}
            {{ Form::textarea('description', $roster->description, ['class' => 'form-control']) }}
        </div>

        <!-- Submit button -->
        <div class="form-group">
            {{ Form::submit('Opslaan', ['class' => 'btn btn-custom']) }}
        </div>
        {{ Form::close() }}
    </div> <!-- End truecontent -->
@stop