@extends('layouts.app')


@section('content')
    <br>
    <div class="jumbotron text-center">
        <h1>Welcome to Laravel</h1>
        <p>This is the Laravel application from "Laravel From Scratch" Youtube series</p>
        @guest()

            <p><a class="btn btn-primary btn-lg" href="/login" role="button">Login</a>
                <a class="btn btn-success btn-lg" href="/register" role="button">Register</a></p>
        @endguest
        @auth()
            <p>You are logged in</p>
        @endauth
    </div>
@endsection
