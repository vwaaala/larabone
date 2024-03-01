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
    {{--    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">--}}
    @stack('styles')
    @vite(['resources/sass/app.scss'])
    <style>
        .sidebar-toggle {
            position: absolute;
            left: 50px;
            top: 13px;
            transition: 0.5s;
        }
        .navbar-collapse.collapse.show {
        }
        .sidebar {
            border-right: 1px solid #0d6efd2e;
            color: whitesmoke !important;
            background: #0d6efd00;
        }
        .nav > a, nav.navbar {
            border-bottom: 1px solid #0d6efd2e;
            height: 60px;
        }
        nav.navbar {
            justify-content: flex-end;
        }
        button.btn, a.btn, .card {
            border-radius: 20px;
        }
        button.btn {
            padding-right: 20px;
            padding-left: 20px;
        }

        .form-control {
            resize: none;
            background-color: var(--bs-body-bg);
            background-clip: padding-box;
            border: 1px solid #0d6efd2e;
            border-radius: 20px;
        }
        .dropdown {
            display: flex;
            align-items: center;
        }
        .navbar .container-fluid {
            z-index: 99999;
            background: #fff;
        }
        .active-sidebar-overlay {
            background: #ffffff;
            z-index: 9999999;
        }

        .active-sidebar-toggle-overlay {
            left: 300px;
        }
        .input-group .input-group-append button {
            border-bottom-left-radius: 0px;
            border-top-left-radius: 0px;
            height: 100%;
        }
        .card {
            overflow: hidden;
            border: 1px solid #0d6efd2e;
        }
        .card .card-header {
            background-color: #0d6efd;
            color: whitesmoke;
        }
        .nav-item ul li a {
            background: unset;
            color: #000000;
        }
        .nav .nav-item .nav-link {
            border-bottom: 1px solid #0d6efd2e;
        }
        .btn span, .btn i {
            vertical-align: middle;
        }
    </style>
</head>

<body>
{{--<div id="loader-wrapper">--}}
{{--    <div id="loader" class="page-loader">--}}
{{--        <span class="loader"></span>--}}
{{--    </div>--}}
{{--</div>--}}

<!-- Main Wrapper -->
<div id="app">
    @auth
        <div class="sidebar d-flex justify-content-between flex-wrap flex-column">
            <ul class="nav flex-column w-100">
                <a href="{{ route('home') }}" class="h3 p-2">
                    <img
                        src="{{ asset(config('app.logo')) }}" alt="config('app.name', 'LaraBone')"
                        class="d-inline-block align-top"
                        style="max-height: 35px;">
                </a>
                <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                    <a class="nav-link"
                       aria-current="page"
                       href="{{ route('home') }}">{{ __('global.dashboard') }}</a>
                </li>
                @can('support_ticket_show')
                    <li class="nav-item {{ request()->routeIs('support_ticket.index') || request()->routeIs('support_ticket.show') || request()->routeIs('support_ticket.create') ? 'active' : '' }}">
                        <a class="nav-link" data-bs-toggle="collapse" data-bs-target="#support-menu-item-collapse" aria-expanded="true">
                            Support
                        </a>
                        <div class="collapse" id="support-menu-item-collapse" style="">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li class="nav-item {{ request()->routeIs('support_ticket.index') ? 'active' : '' }}">
                                    <a class="nav-link"
                                       href="{{ route('support_ticket.index') }}">{{ __('support_ticket.title') }}</a>
                                </li>
                                <li class="nav-item {{ request()->routeIs('support_ticket.create') ? 'active' : '' }}">
                                    <a class="nav-link"
                                       href="{{ route('support_ticket.create') }}">{{ __('global.add') }} {{ __('support_ticket.title_singular') }}</a>
                                </li>
                            </ul>
                        </div>
                    </li>
{{--                    <li class="nav-item {{ request()->routeIs('support_ticket.index') ? 'active' : '' }}">--}}
{{--                        <a class="nav-link"--}}
{{--                           href="{{ route('support_ticket.index') }}">{{ __('support_ticket.title') }}</a>--}}
{{--                        <ul>--}}
{{--                            <li class="nav-item {{ request()->routeIs('support_ticket.create') ? 'active' : '' }}">--}}
{{--                                <a class="nav-link"--}}
{{--                                   href="{{ route('support_ticket.create') }}">{{ __('global.add') }} {{ __('support_ticket.title_singular') }}</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
                @endcan
                @can('permission_show')
                    <li class="nav-item {{ request()->routeIs('permissions.index') ? 'active' : '' }}">
                        <a class="nav-link"
                           href="{{ route('permissions.index') }}">{{ __('cruds.permission.title') }}</a>
                    </li>
                @endcan
                @canany(['role_show', 'role_create', 'role_edit', 'role_delete'])
                    <li class="nav-item {{ request()->routeIs('roles.index') ? 'active' : '' }}">
                        <a class="nav-link"
                           href="{{ route('roles.index') }}">{{ __('cruds.role.title') }}</a>
                    </li>
                @endcan
                @canany(['user_show', 'user_create', 'user_edit', 'user_delete'])
                    <li class="nav-item {{ request()->routeIs('users.index') ? 'active' : '' }}">
                        <a class="nav-link"
                           href="{{ route('users.index') }}">{{ __('cruds.userManagement.title') }}</a>
                    </li>
                @endcanany
            </ul>
            <span href="#" class="nav-link h4 w-100 mb-5">
          <a href=""><i class="bx bxl-instagram-alt text-white"></i> Instagram</a>
          <a href=""><i class="bx bxl-twitter px-2 text-white"></i> X</a>
          <a href=""><i class="bx bxl-facebook text-white"></i> Meta</a>
        </span>
        </div>
    @endauth
    <div class="content">
        <nav class="navbar navbar-expand-md bg-light">
            <div class="container-fluid">
                <a class="btn btn-primary border-0 sidebar-toggle"><i class="bi bi-bar-chart-steps"></i></a>
                <a class="navbar-brand ms-4" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled">Disabled</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    &nbsp;
                </div>
            </div>
        </nav>
{{--        <nav class="navbar navbar-light bg-light px-5">--}}
{{--            @guest--}}
{{--                <a href="{{ route('home') }}" class="border-0">--}}
{{--                    <img--}}
{{--                        src="{{ asset(config('app.logo')) }}" alt="config('app.name', 'LaraBone')"--}}
{{--                        class="d-inline-block align-top"--}}
{{--                        style="max-height: 35px;">--}}
{{--                </a>--}}
{{--            @else--}}
{{--                <a class="btn btn-primary border-0 sidebar-toggle"><i class="bi bi-bar-chart-steps"></i></a>--}}
{{--            @endguest--}}
{{--            <div class="d-flex">--}}
{{--                @if(count(config('panel.available_languages', [])) > 1)--}}
{{--                    <div class="dropdown me-2 ">--}}
{{--                        <a class="btn btn-outline-dark border-0 dropdown-toggle" href="#"--}}
{{--                           id="languageDropdown" data-bs-toggle="dropdown"--}}
{{--                           aria-expanded="false">--}}
{{--                            <i class="bi bi-globe"></i> {{ __('global.language') }}--}}
{{--                        </a>--}}
{{--                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">--}}
{{--                            @foreach(config('panel.available_languages') as $langLocale => $langName)--}}
{{--                                <a class="dropdown-item {{ app()->getLocale() == $langLocale ? 'd-none': '' }}"--}}
{{--                                   href="{{ url()->current() }}?lang={{ $langLocale }}">{{ $langName }}</a>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--                @guest--}}
{{--                    @if (Route::has('login'))--}}
{{--                        <a class="btn btn-outline-dark border-0"--}}
{{--                           href="{{ route('login') }}">{{ __('global.login') }}</a>--}}
{{--                    @endif--}}
{{--                    @if (Route::has('register'))--}}
{{--                        <a class="btn btn-outline-dark border-0"--}}
{{--                           href="{{ route('register') }}">{{ __('global.register') }}</a>--}}
{{--                    @endif--}}
{{--                @else--}}
{{--                    <div class="dropdown">--}}
{{--                        <a class="btn btn-outline-dark border-0 dropdown-toggle" href="#"--}}
{{--                           id="userDropdown" data-bs-toggle="dropdown"--}}
{{--                           aria-expanded="false">--}}
{{--                            <img src="{{ asset(auth()->user()->avatar) }}" alt="Avatar" class="rounded-circle"--}}
{{--                                 height="30">--}}
{{--                            {{ auth()->user()->name }}--}}
{{--                        </a>--}}
{{--                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">--}}
{{--                            <a class="dropdown-item"--}}
{{--                               href="{{ route('users.show', auth()->user()->id) }}">{{ __('global.profile') }}</a>--}}
{{--                            <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">--}}
{{--                                {{ __('global.logout') }}--}}
{{--                            </a>--}}

{{--                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
{{--                                @csrf--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endguest--}}
{{--            </div>--}}
{{--        </nav>--}}
        <div class="p-2">
            @yield('content')
        </div>

        <footer class="bg-light">
            <p>This website uses <a href="https://getbootstrap.com/">Bootstrap</a> under the <a
                    href="https://opensource.org/licenses/MIT">MIT License</a>.</p>
        </footer>
    </div>
</div>
<script src="{{ asset('assets/libs/jquery/dist/jquery.js') }}"></script>
<!-- Include SweetAlert2 -->
{{--<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>--}}
@vite(['resources/js/app.js'])
<script>


    // let pageLoader;
    //
    // function showPage() {
    //     document.getElementById("loader-wrapper").style.display = "none";
    //     document.getElementById("app").style.display = "block";
    // }
    //
    // function loader() {
    //     pageLoader = setTimeout(showPage, 100);
    // }
    //
    // // Hide success message after 5 seconds
    // setTimeout(function () {
    //     $('#successMessage').fadeOut('fast');
    // }, 5000);
    //
    // $(document).ready(function () {
    //     loader();
    // });
    $(function () {
        'use strict';
        let sidebarToggle = document.querySelector(".sidebar-toggle");
        let sidebar = document.querySelector(".sidebar");
        let container = document.querySelector(".content");
        if (sidebarToggle) {
            if(window.outerWidth > 767){
                sidebar.classList.add("active-sidebar");
                container.classList.add("active-content");
            }
            sidebarToggle.addEventListener("click", () => {
                if(window.outerWidth > 767){
                    sidebar.classList.toggle("active-sidebar");
                    container.classList.toggle("active-content");
                } else {
                    sidebar.classList.toggle("active-sidebar");
                    sidebarToggle.classList.toggle("active-sidebar-toggle-overlay");
                    sidebar.classList.toggle("active-sidebar-overlay");
                }
            });

        }
    });
</script>

@stack('scripts')
</body>

</html>
