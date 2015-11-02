@extends('layouts.admin')

@section('content')
    @include('layouts._partials._quicknav_items')
    <div class="col-md-8 col-md-offset-1 truecontent">
        <h3>Wijzig - {{ $item->title }}</h3>
        {{ Form::model($item, ['files' => 'true', 'role' => 'form', 'class' => 'form-horizontal', 'method' => 'patch',
        'route' => ['items.update', $item->id]]) }}
        <div class="form-group">
            {{ Form::label('title', 'Titel: ', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-5">
                {{ Form::text('title', null, ['class' => 'form-control']) }}
                @if ($errors->has('title'))
                <span class="text-danger"> {{ $errors->first('title') }} </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('message', 'Bericht: ', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-5">
                {{ Form::textarea('message', null, ['class' => 'form-control']) }}
                @if ($errors->has('message'))
                <span class="text-danger"> {{ $errors->first('message') }} </span>
                @endif
            </div>
        </div>


        <div class="form-group">
            {{ Form::label('image', 'Foto: ', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-5">
                {{ Form::file('images[]', ['multiple' => 'true']) }}
                @if ($errors->has('image'))
                <span class="text-danger"> {{ $errors->first('image') }} </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('image', 'Foto\'s: ', ['class' => 'col-sm-2 control-label']) }}
            @foreach ($item->itemphoto as $photo)
            <div class="col-sm-4">
                <div class="thumbnail">
                    <img src="{{ asset($photo->path) }}" alt="">
                    <p><a href=" {{ URL::route('itemphoto.destroy', $photo->id) }} "> <span
                                class="glyphicon glyphicon-trash"></span> </a></p>
                </div>
            </div>
            @endforeach
        </div>

        <div class="form-group">
            <div class="col-sm-5 col-sm-offset-2">
                {{ Form::submit('Wijzigingen opslaan', ['class' => 'btn btn-custom']) }}
            </div>
        </div>
        {{ Form::close() }}
        <div class="bordertop overview">
            <a href=" {{ route('items.admin.index') }} ">
                <span class="glyphicon glyphicon-th-list"></span>
                Terug naar overzicht
            </a> -
            <a href=" {{ route('items.admin.show', $item->id) }} "> <span class="glyphicon glyphicon-eye-open"></span>
                Bekijken </a> -
            <a href=" {{ route('items.delete',$item->id) }} "> <span class="glyphicon glyphicon-trash"></span>
                Verwijderen </a>
        </div>
    </div>
@stop
