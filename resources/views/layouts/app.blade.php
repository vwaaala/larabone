<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap CSS -->
    {{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">--}}
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    @stack('styles')
    @vite(['resources/sass/app.scss'])
</head>

<body onload="myFunction()">
<div id="loader" class="page-loader">
    <span class="loader"></span>
</div>
<div id="app" style="display:none;">

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <!-- Brand Logo and Name -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="" alt="Logo" class="d-inline-block align-top">{{ config('app.name') }}
            </a>

            <!-- Responsive Toggle Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navigation Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                @guest
                    <ul class="navbar-nav me-auto">
                    </ul>
                @else
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                               href="{{ route('home') }}">{{ __('global.dashboard') }}</a>
                        @can('support_ticket_show')
                            <li class="nav-item">
                                <a class="nav-link"
                                   href="{{ route('support_ticket.index') }}">{{ __('support_ticket.title') }}</a>
                            </li>
                        @endcan                        @can('permission_show')
                            <li class="nav-item">
                                <a class="nav-link"
                                   href="{{ route('permissions.index') }}">{{ __('cruds.permission.title') }}</a>
                            </li>
                        @endcan
                        @canany(['role_show', 'role_create', 'role_edit', 'role_delete'])
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('roles.index') }}">{{ __('cruds.role.title') }}</a>
                            </li>
                        @endcan
                        @canany(['user_show', 'user_create', 'user_edit', 'user_delete'])
                            <li class="nav-item">
                                <a class="nav-link"
                                   href="{{ route('users.index') }}">{{ __('cruds.userManagement.title') }}</a>
                            </li>
                        @endcanany
                    </ul>
                @endguest

                <!-- Language Dropdown -->
                <ul class="navbar-nav">
                    @if(count(config('panel.available_languages', [])) > 1)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bi bi-globe"></i> {{ __('global.language') }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="languageDropdown">
                                @foreach(config('panel.available_languages') as $langLocale => $langName)
                                    <a class="dropdown-item {{ app()->getLocale() == $langLocale ? 'd-none': '' }}"
                                       href="{{ url()->current() }}?lang={{ $langLocale }}">{{ $langName }}</a>
                                @endforeach
                            </div>
                        </li>
                    @endif
                </ul>
                <!-- Conditional Rendering based on Authentication -->
                <div class="d-flex flex-column flex-md-row align-items-center">
                    <!-- If Unauthorized -->
                    @guest

                        <ul id="unauthorized" class="navbar-nav me-auto">
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-warning"
                                       href="{{ route('login') }}">{{ __('global.login') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-primary"
                                       href="{{ route('register') }}">{{ __('global.register') }}</a>
                                </li>
                            @endif
                        </ul>

                    @else
                        <!-- If Authenticated -->
                        <ul id="authenticated navbar-nav" class="mb-2 mb-md-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white-50" href="#" role="button"
                                   id="userDropdown"
                                   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="{{ asset(auth()->user()->avatar) }}" alt="Avatar" class="rounded-circle"
                                         height="30">
                                    {{ auth()->user()->name }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="userDropdown">
                                    <a class="dropdown-item"
                                       href="{{ route('users.show', auth()->user()->id) }}">{{ __('global.profile') }}</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('global.logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    @endguest
                </div>

            </div>
        </div>
    </nav>

    <!-- Content section -->
    <div class="container py-4">
        @if (Session::has('success'))
            <div id="successMessage" class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        @if (Session::has('error'))
            <div id="errorMessage" class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
        @endif

        @yield('content')
    </div>
</div>
<footer>
    <p>This website uses <a href="https://getbootstrap.com/">Bootstrap</a> under the <a
            href="https://opensource.org/licenses/MIT">MIT License</a>.</p>
</footer>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- Include SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@vite(['resources/js/app.js'])
<script>
    let pageLoader;

    function myFunction() {
        pageLoader = setTimeout(showPage, 1);
    }

    function showPage() {
        document.getElementById("loader").style.display = "none";
        document.getElementById("app").style.display = "block";
    }

    // Hide success message after 5 seconds
    setTimeout(function () {
        $('#successMessage').fadeOut('fast');
    }, 5000);
</script>
@stack('scripts')

</body>

</html>
