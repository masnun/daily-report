@extends('layouts.master')

@section('title')
    Register
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
            <input type="text" value="{{ $username }}" name="username"><br/>

            <strong>Email:</strong><br/>
            <input type="text" value="{{ $email }}" name="email"><br/>

            <strong>Password:</strong><br/>
            <input type="password" name="password"><br/>

            <input type="submit" value="Register">
        </form>
    </div>
</div>
@stop