@extends('layouts.admin')

@section('content')
<div class="col-md-2 quicknav">
    <h3>Snelmenu</h3>
    <ul>
        <li>
            <a href=" {{ URL::route('admin.index') }} ">
                <span class="glyphicon glyphicon-th-large"></span> Admin panel
            </a>
        </li>
        <li>
            <a href=" {{ URL::route('home') }} ">
                <span class="glyphicon glyphicon-home"></span> Home
            </a>
        </li>
        <li>
            <a href=" {{ URL::route('accounts.index') }} ">
                <span class="glyphicon glyphicon-user"></span> Gebruikers
            </a>
        </li>
        <li>
            <a href=" {{ URL::route('contacts.index') }} ">
                <span class="glyphicon glyphicon-envelope"></span> Berichten
            </a>
        </li>
        <li>
            <a href=" {{ URL::route('horses.admin.index') }} ">
                <span class="glyphicon glyphicon-shopping-cart"></span> Paarden
            </a>
        </li>
        <li class="active">
            <a href=" {{ URL::route('items.admin.index') }} ">
                <span class="glyphicon glyphicon-pencil"></span> Nieuws
            </a>
            <ul>
                <li>
                    <a href=" {{ URL::route('items.create') }} ">
                        <span class="glyphicon glyphicon-plus"></span> Bericht toevoegen
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div> <!-- End col-md-2 quicknav -->
<div class="col-md-8 col-md-offset-1 truecontent">
    <h3>Wijzig - {{ $item->title }}</h3>
    {{ Form::model($item, array('files' => 'true', 'role' => 'form', 'class' => 'form-horizontal', 'method' => 'patch',
    'route' => array('items.update', $item->id))) }}
    <div class="form-group">
        {{ Form::label('title', 'Titel: ', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-5">
            {{ Form::text('title', null, array('class' => 'form-control')) }}
            @if ($errors->has('title'))
            <span class="text-danger"> {{ $errors->first('title') }} </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('message', 'Bericht: ', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-5">
            {{ Form::textarea('message', null, array('class' => 'form-control')) }}
            @if ($errors->has('message'))
            <span class="text-danger"> {{ $errors->first('message') }} </span>
            @endif
        </div>
    </div>

    @if (!$item->itemphoto()->count())
    <div class="form-group">
        {{ Form::label('image', 'Foto: ', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-5">
            {{ Form::file('image') }}
            @if ($errors->has('image'))
            <span class="text-danger"> {{ $errors->first('image') }} </span>
            @endif
        </div>
    </div>
    @else
    @foreach ($item->itemphoto as $photo)
    <div class="form-group">
        {{ Form::label('image', 'Foto: ', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-4">
            <div class="thumbnail">
                {{ HTML::image($photo->path) }}
                <p><a href=" {{ URL::route('itemphoto.destroy', $photo->id) }} "> <span
                            class="glyphicon glyphicon-trash"></span> </a></p>
            </div>
        </div>
    </div>
    @endforeach
    @endif
    <div class="form-group">
        <div class="col-sm-5 col-sm-offset-2">
            {{ Form::submit('Wijzigingen opslaan', array('class' => 'btn btn-custom')) }}
        </div>
    </div>
    {{ Form::close() }}
    <div class="bordertop overview">
        <a href=" {{ URL::route('items.admin.index') }} "> <span class="glyphicon glyphicon-th-list"></span> Terug naar
                                                                                                             overzicht
        </a> -
        <a href=" {{ URL::route('items.admin.show', $item->id) }} "> <span class="glyphicon glyphicon-eye-open"></span>
            Bekijken </a> -
        <a href=" {{ URL::route('items.destroy',$item->id) }} "> <span class="glyphicon glyphicon-trash"></span>
            Verwijderen </a>
    </div>
</div>


@stop