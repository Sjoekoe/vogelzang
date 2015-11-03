@extends('layouts.admin')

@section('content')
    @if (Auth::user()->isAdmin())
        @include('layouts._partials._quicknav_riders')
    @else
        @include('layouts._partials._users._sidebar')
    @endif

    <div class="col-md-8 col-md-offset-1 truecontent">
        <div class="row">
            <h3>{{ $rider->fullName() }}</h3>
            <div class="overview">
                <p>Resterende beurten : {{ $rider->turns }}
                    {{--@if ($rider->hasNoTurnsLeft())
                        (Gelieve zo snel mogelijk uw lesbeurten te betalen!)
                    @endif--}}
                </p>
                <p>Toekomstig ingeschreven lessen : {{--{{ $rider->futureLessonsCount() }}--}}</p>
                <hr/>
            </div>
        </div>
    </div> <!-- End truecontent -->
@stop
