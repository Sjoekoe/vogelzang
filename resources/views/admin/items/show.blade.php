@extends('layouts.admin')

@section('content')
    @include('layouts._partials._quicknav_items')

    <div class="col-md-8 col-md-offset-1 truecontent">
        <h3> {{ $item->title }} </h3>
        @if ($item->itemphoto()->count())
        <div class="col-md-8">
            @else
            <div class="col-md-12">
                @endif
                <p>{{ nl2br($item->message) }}</p>
            </div>
            @if ($item->itemphoto()->count())
            <div class="row">
                @foreach ($item->itemphoto as $photo)
                <div class="col-md-4">
                    <div class="thumbnail">
                        <img src="{{ asset($photo->path) }}" alt="">
                    </div>
                </div>
                @endforeach
            </div>
            @endif
            <br>

            <p><i> Aangemaakt door {{$item->user->username}} </i></p>

            <div class="bordertop overview">
                <a href=" {{ route('items.admin.index') }} "> <span class="glyphicon glyphicon-th-list"></span> Terug
                                                                                                                     naar
                                                                                                                     overzicht
                </a> -
                <a href=" {{ route('items.edit', $item->id) }} "> <span class="glyphicon glyphicon-pencil"></span>
                    Bewerken </a> -
                <a href=" {{ route('items.delete',$item->id) }} "> <span class="glyphicon glyphicon-trash"></span>
                    Verwijderen </a>
            </div>
        </div>
    </div>
@stop
