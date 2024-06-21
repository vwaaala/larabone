@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center mt-5">
            <div class="d-inline-block">
                <div class="card p-4">
                    <div class="card-header d-flex justify-content-between align-items-start">
                        <span>{{ __('global.login') }}</span>
                        <a href="{{ route('register') }}" class="btn btn-sm btn-success">{{ __('global.register') }}</a>
                    </div>

                    <div class="card-body text-start">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email"
                                       class="col-12 col-form-label">{{ __('pages.users.fields.email') }}</label>

                                <div class="col-12">
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
                                       class="col-12 col-form-label">{{ __('pages.users.fields.password') }}</label>

                                <div class="col-12">
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
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember"
                                               id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('global.remember_me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-12">


{{--                                    @if (Route::has('password.request'))--}}
{{--                                        <a href="#" class="btn btn-success">--}}
{{--                                            {{ __('global.google_login') }}--}}
{{--                                        </a>--}}
{{--                                    @endif--}}
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-start mt-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('global.login') }}
                                </button>
                                <a class="btn btn-link text-danger" href="{{ route('password.request') }}">
                                    {{ __('global.forgot_password') }}
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
            <div class="d-inline-block">
                <div class="card p-4">
                    <div class="card-header text-center">{{ __('Click to fill Credentials') }}</div>
                    <div class="card-body text-center">
                        <button type="button" onclick="fillForm('super@bunk3r.net', 'secret')" class="btn btn-primary mb-2">
                            Super Admin
                        </button>
                        <button type="button" onclick="fillForm('admin@bunk3r.net', 'secret')" class="btn btn-info mb-2">
                            Admin
                        </button>
                        <button type="button" onclick="fillForm('manager@bunk3r.net', 'secret')" class="btn btn-warning mb-2">
                            Manager
                        </button>
                        <button type="button" onclick="fillForm('users@bunk3r.net', 'secret')" class="btn btn-success mb-2">
                            User
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection
@push('scripts')
    <script>
        function fillForm(email, password) {
            // Set values for email and password fields
            document.getElementById('email').value = email;
            document.getElementById('password').value = password;
        }
    </script>
@endpush
