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
                        Member
                    </td>
                    <td>
                        Task
                    </td>
                    <td>
                        Done
                    </td>
                </thead>
                <tbody>
                    @foreach($team->reports as $report)
                        <td>{{ $report->reporter->name }}</td> <td>{{ $report->title }}</td> <td>{{ $report->created_at }}</td>
                    @endforeach
                </tbody>
            </table>

        </div>

        <div class="span4">

        </div>


    </div>
@stop