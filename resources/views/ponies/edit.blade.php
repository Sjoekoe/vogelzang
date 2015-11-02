@extends('layouts.admin')

@section('content')
    @include('layouts._partials._quicknav_pony')

    <div class="col-md-8 col-md-offset-1 truecontent">
        <h3>Wijzig {{ $pony->name }}</h3>

        {{ Form::open(['route' => ['pony.update', $pony->id], 'class' => 'form-horizontal', 'method' => 'PATCH']) }}
        <!-- Name Form input -->
        <div class="form-group">
            {{ Form::label('name', 'Naam:') }}
            {{ Form::text('name', $pony->name, ['class' => 'form-control']) }}
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