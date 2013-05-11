@extends('layouts.master')

@section('title')
    Home
@stop

@section('content')
    <div class="row">
        <div class="offset1 span4">

                <h4> My Teams </h4>
                @if(count($user->teams) > 0)
                    <ul>
                        @foreach($user->teams as $team)
                            <li><a href="/team/{{ $team->id }}">{{ $team->name }}</a></li>
                        @endforeach
                    </ul>
                @else
                    You haven't created any teams yet! <br/><br/>
                @endif


                <h4> Subscribed Teams </h4>
                @if(count($user->members_to) > 0)
                    <ul>
                        @foreach($user->members_to as $team)
                            <li><a href="/team/{{ $team->id }}">{{ $team->name }}</a></li>
                        @endforeach
                    </ul>
                @else
                    You haven't been added to any teams yet! <br/><br/>
                @endif
        </div>

        <div class="span4">
                <h4> Add Team </h4>
                <div>
                    {{ $error }}
                </div>
                <form action="" method="POST">
                    <strong>Name:</strong><br/>
                    <input type="text" value="{{ $name }}" name="name"><br/>
                    <input class="btn" type="submit" value="Add Team">
                </form>
        </div>


    </div>
@stop