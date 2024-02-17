@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>{{ __('Login') }}</span>
                        <a href="{{ route('register') }}" class="btn btn-sm btn-secondary">{{ __('Sign Up') }}</a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember"
                                               id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                        <div class="row mb-3">
                            <div class="col-md-8 offset-md-4">
                                <!-- Add button to login with Google -->
                                <a href="#" class="btn btn-danger">
                                    Login with Google
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mt-5">
                <div class="card">
                    <div class="card-header">{{ __('Click to fill Credentials') }}</div>

                    <div class="card-body">
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="button" onclick="fillForm('super@bunk3r.net', 'secret')"
                                        class="btn btn-dark">
                                    Super Admin
                                </button>
                                <button type="button" onclick="fillForm('admin@bunk3r.net', 'secret')"
                                        class="btn btn-dark">
                                    Admin
                                </button>

                                <button type="button" onclick="fillForm('manager@bunk3r.net', 'secret')"
                                        class="btn btn-dark">
                                    Manager
                                </button>

                                <button type="button" onclick="fillForm('users@bunk3r.net', 'secret')"
                                        class="btn btn-dark">
                                    User
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
