@extends('layouts.master')

@section('title')
    Login
@stop

@section('content')
<div class="row">
    <div class="offset2 span6">
        <div>
            @if (!empty($error))
                {{ $error }}
            @endif
        </div>

        <form action="" method="POST">
            <strong>Username:</strong><br/>
            <input type="text" name="username"><br/>

            <strong>Password:</strong><br/>
            <input type="password" name="password"><br/>

            <input type="submit" value="Login">
        </form>
    </div>
</div>
@stop