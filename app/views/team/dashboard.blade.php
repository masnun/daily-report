@extends('layouts.master')

@section('title')
    Home
@stop

@section('content')
    <div class="row">
        <div class="offset1 span6">
            <h1> {{ $team->name }} </h1>
            <strong>Owner:</strong> {{ $team->owner->username }} <br/><br/>

            <table class="table table-bordered">
                <thead>
                    <td>
                        <strong>Member</strong>
                    </td>
                    <td>
                        <strong>Task</strong>
                    </td>
                    <td>
                        <strong>Done</strong>
                    </td>
                </thead>
                <tbody>
                    @if(count($reports) > 0)
                        @foreach($reports as $report)
                        <tr>
                            <td>{{ $report->reporter->name }}</td> <td>{{ $report->title }}</td> <td>{{ $report->created_at }}</td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td>There are no reports for today!</td>
                        </tr>
                    @endif
                </tbody>
            </table>

        </div>

        <div class="offset1 span4">
            <h5>Add Report</h5>
            <form action="/report/add" method="POST">
                <strong>Task:</strong><br/>
                <input type="text" name="title">
                <input type="hidden" name="team_id" value="{{ $team->id }}"><br/>
                <input type="submit" value="Add" class="btn" />
            </form>

            <h5>Team Members</h5>
            @if(count($team->members) >0)
                <ul>
                    @foreach($team->members as $member)
                        <li>{{ $member->name }}</li>
                    @endforeach
                </ul>
            @else
                There are no other team members yet!<br/><br/>
            @endif

        </div>


    </div>
@stop