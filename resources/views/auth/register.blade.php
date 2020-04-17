@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <!-- Default form register -->
                <form class="text-center border border-light p-5" method="POST" action="{{ route('register') }}">
                    @csrf
                    <p class="h4 mb-4">Sign up</p>

                    <!-- Username -->
                    <input id="username" type="text" class="form-control mb-4 @error('username') is-invalid @enderror"
                           name="username" value="{{ request('username') ?? old('username') }}" placeholder="Username"
                           required autocomplete="username">
                    @error('username')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror


                <!-- Full Name -->
                    <input id="name" type="text" class="form-control mb-4 @error('name') is-invalid @enderror"
                           name="name" value="{{request('name') ??  old('name') }}" placeholder="Full Name"
                           required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror


                <!-- E-mail -->
                    <input id="email" type="email" class="form-control mb-4 @error('email') is-invalid @enderror"
                           name="email" value="{{ request('email') ?? old('email') }}" placeholder="E-mail"
                           required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror


                <!-- Password -->

                    <input id="password" type="password" placeholder="Password"
                           class="form-control mb-4  @error('password') is-invalid @enderror" name="password"
                           required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror

                <!-- Confirm Password -->
                    <input id="password-confirm" type="password" class="form-control mb-4 "
                           name="password_confirmation" placeholder="Confirm Password"
                           required autocomplete="new-password">

                    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                        At least 8 characters
                    </small>

                    <!-- Sign up button -->
                    <button class="btn btn-info my-4 btn-block" type="submit">Sign Up</button>

                    <!-- Social register -->
                    <p>or sign up with:</p>

                    <a href="login/github" class="btn btn-block btn-social btn-github mt-2">
                        <i class="fa fa-github"></i> Github
                    </a>
                </form>
                <!-- Default form register -->
            </div>
        </div>
    </div>
@endsection
