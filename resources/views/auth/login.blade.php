@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-md-8">
                <form class="text-center border border-light p-5" method="POST" action="{{ route('login') }}">
                    @csrf
                    <p class="h4 mb-4">{{ __('Login') }}</p>

                    <input id="email" type="email"
                           class="form-control mb-4 @error('email') is-invalid @enderror" name="email"
                           value="{{ old('email') }}" placeholder="Email" required autocomplete="email"
                           autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                    <input id="password" type="password"
                           class="form-control mb-4 @error('password') is-invalid @enderror" name="password"
                           placeholder="Passowrd"
                           required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                    <div class="d-flex justify-content-around">
                        <div>
                            <!-- Remember me -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember"
                                       id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                        <div>
                            <!-- Forgot password -->
                            <a href="">Forgot password?</a>
                        </div>
                    </div>

                    <!-- Sign in button -->
                    <button class="btn btn-info btn-block my-4" type="submit">Sign in</button>

                    <!-- Register -->
                    <p>Not a member?
                        <a href="/register">Register</a>
                    </p>

                    <!-- Social login -->
                    <p>or sign in with:</p>
                    <a href="login/github" class="btn btn-block btn-social btn-github mt-2">
                        <i class="fa fa-github"></i> Github
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection
