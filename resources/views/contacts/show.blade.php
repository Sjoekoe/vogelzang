@extends('layouts.admin')

@section('content')
    @include('layouts._partials._quicknav_contacts')

    <div class="col-md-8 col-md-offset-1 truecontent">
    <h3> {{ $contact->subject }} </h3>

    <p> {{ nl2br($contact->message) }} </p>
    <br>

    <p><i>Bericht ontvangen van <a href="mailto:{{$contact->email}}">{{$contact->full_name}} </a> op {{ date("d-m-Y",
          strtotime($contact->created_at)) }} </i></p>

    <div class="bordertop overview">
        <a href=" {{ route('contacts.index') }} ">
            <span class="glyphicon glyphicon-th-list"></span>
            Terug naar overzicht
        </a>
        -
        <a href=" {{ route('contacts.delete',$contact->id) }} ">
            <span class="glyphicon glyphicon-trash"></span>
            Verwijderen
        </a>
    </div>
    <br/><br/>
    {{ Form::open() }}
        {{ Form::hidden('email', $contact->email) }}
        {{ Form::hidden('name', $contact->full_name) }}
        {{ Form::hidden('subject', $contact->subject) }}
        <!-- Reply Form input -->
        <div class="form-group">
            {{ Form::label('reply', 'Antwoord:') }}
            {{ Form::textarea('reply', null, ['class' => 'form-control']) }}
            @if ($errors->has('reply'))
            <span class="error"> {{ $errors->first('reply') }} </span>
            @endif
        </div>
        <div class="form-group col-md-2">
            {{ Form::submit('Verzenden', ['class' => 'btn btn-custom form-control']) }}
        </div>
    {{ Form::close() }}
</div>
@stop
