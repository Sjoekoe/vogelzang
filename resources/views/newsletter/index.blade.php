@extends('layouts.admin')

@section('content')
    @include('layouts._partials._quicknav_newsletter')
    <div class="col-md-8 col-md-offset-1 truecontent">
        <h3>Niewsbrief</h3>
        {{ Form::open(['route' => 'newsletter.send']) }}
            <div class="form-group">
                {{ Form::label('subject', 'Onderwerp') }}
                {{ Form::text('subject', '', ['class' => 'form-control']) }}
                @if ($errors->has('subject'))
                    <span> {{ $errors->first('subject') }} </span>
                @endif
            </div>
            <div class="form-group">
                {{ Form::label('body', 'Bericht') }}
                {{ Form::textarea('body', '', ['class' => 'form-control']) }}
                @if ($errors->has('body'))
                    <span> {{ $errors->first('body') }} </span>
                @endif
            </div>
            {{ Form::submit('Verzenden', ['class' => 'btn btn-custom']) }}
        {{ Form::close() }}
    </div>
@stop
