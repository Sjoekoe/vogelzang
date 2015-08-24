@extends('layouts.admin')

@section('content')
    @if (Auth::user()->isAdmin())
        @include('layouts._partials._quicknav_rosters')
    @else
        @include('layouts._partials._users._sidebar')
    @endif

    <div class="col-md-8 col-md-offset-1 truecontent">
        <div class="row">
            <h3>{{ Lang::get('days.names')[$roster->name] . ' ' . date('d/m/Y', strtotime($roster->date)) . ' (' . Lang::get('rosters')[$roster->type] . ')' }}</h3>
            <div class="overview">
                <p>{{ nl2br($roster->description) }}</p>
                <hr/>

                @if (Auth::user()->isAdmin() && count($lessons))
                    <h3>Roosters</h3>
                    <p>
                        @foreach ($lessons as $lesson)
                            <span class="col-md-1">
                                <a href="{{ route('roster.detail', [$roster->id, $lesson]) }}">
                                    {{ Lang::get('days.hours')[$lesson] }}
                                </a>
                            </span>
                        @endforeach
                    </p>
                    <hr/>
                @endif

                <h3>Ingeschreven ruiters</h3>
                @foreach ($roster->subscriptions as $subscription)
                    @if (Auth::user()->isAdmin() && $subscription->rider->hasNoLessonForRoster($roster))
                        <div class="row">
                            {{ Form::open(['route' => ['lesson.create', $roster->id, $subscription->rider->id]]) }}
                                {{ Form::hidden('rider', $subscription->rider->id) }}
                                <div class="col-md-2">
                                    {{ Form::label('', $subscription->rider->fullName()) }}
                                </div>
                                <div class="col-md-2">
                                    {{ Form::select('pony', $ponies, '', ['class' => 'form-control']) }}
                                </div>
                                <div class="col-md-2">
                                    {{ Form::select('hour', Lang::get('days.hours'), '', ['class' => 'form-control']) }}
                                </div>
                                <div class="col-md-2">
                                    {{ Form::submit('Inschrijven', ['class' => 'btn btn-custom']) }}
                                </div>
                            {{ Form::close() }}
                        </div>
                    @endif
                @endforeach

                @if (! Auth::user()->isAdmin())
                    <div class="panel panel-default">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Ruiter</th>
                                <th>Uur</th>
                                <th>Pony</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <td colspan="4">  </td>
                            </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($roster->subscriptions as $subscription)
                                    @if ($subscription->rider->user->id == Auth::user()->id)
                                        <tr>
                                            <td>{{ $subscription->rider->fullName() }}</td>
                                            <td>{{ $subscription->lesson() ? Lang::get('days.hours')[$subscription->lesson()->hour] : '' }}</td>
                                            <td>{{ $subscription->lesson() ? $subscription->lesson()->pony->name : '' }}</td>
                                            <td>
                                                <a href="{{ route('subscription.delete', $subscription->id) }}">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                </a>
                                            </td>

                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- End panel -->
                @endif
                <hr/>
            </div>
        </div>

        @if (count($riders) && ! Auth::user()->isAdmin())
            <div class="row">
                <h3>Inschrijven</h3>
                {{ Form::open(['route' => ['subscription.store', $roster->id]]) }}
                <div class="col-md-9">
                    @foreach($riders as $rider)
                        @if ($rider->hasNoSubscriptionForRoster($roster))
                            <div class="col-md-3">
                                {{ Form::label('riders', $rider->fullName()) }}
                                {{ Form::checkbox('riders[]', $rider->id, true) }}
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="col-md-3">
                    <!-- Submit button -->
                    <div class="form-group">
                        {{ Form::submit('Inschrijven', ['class' => 'btn btn-custom']) }}
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        @endif
    </div> <!-- End truecontent -->
@stop