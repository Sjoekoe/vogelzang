@extends('layouts.admin')

@section('content')
    @include('layouts._partials._quicknav_pony')

    <div class="col-md-8 col-md-offset-1 truecontent">
        <h3>Voeg een Pony toe</h3>

        {{ Form::open(['route' => 'pony.create', 'class' => 'form-horizontal']) }}
        <!-- Name Form input -->
            <div class="form-group">
                {{ Form::label('name', 'Naam:') }}
                {{ Form::text('name', null, ['class' => 'form-control']) }}
                @if ($errors->has('name'))
                    <span> {{ $errors->first('name') }} </span>
                @endif
            </div>

            <!-- Submit button -->
            <div class="form-group">
                {{ Form::submit('Opslaan', ['class' => 'btn btn-custom']) }}
            </div>
        {{ Form::close() }}
    </div> <!-- End truecontent -->
@stop