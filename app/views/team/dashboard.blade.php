@extends('layouts.master')

@section('title')
    Home
@stop

@section('content')
    <div class="row">
        <div class="offset1 span4">
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
                    @foreach($reports as $report)
                    <tr>
                        <td>{{ $report->reporter->name }}</td> <td>{{ $report->title }}</td> <td>{{ $report->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

        <div class="span4">
            <h5>Add Report</h5>
            <form action="/team/add_report"
        </div>


    </div>
@stop