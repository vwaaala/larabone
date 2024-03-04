<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @stack('styles')
    @vite(['resources/sass/app.scss'])
    <style>
        .sidebar-toggle {
            position: absolute;
            left: 50px;
            top: 13px;
            transition: 0.5s;
        }

        .sidebar {
            border-right: 1px solid #0d6efd2e;
            color: whitesmoke !important;
        }

        .nav > a, nav.navbar {
            border-bottom: 1px solid #0d6efd2e;
            height: 60px;
        }

        nav.navbar {
            justify-content: flex-end;
            padding-top: 0px;
            padding-bottom: 0px;
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
        li.nav-item.dropdown {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        .dropdown {
            display: flex;
            align-items: center;
        }

        .active-content .navbar .container-fluid {
            justify-content: flex-start;
        }
        .active-content .navbar .container-fluid {
            z-index: 99999;
            justify-content: flex-end;
            height: 100%;
            padding-left: 0px;
            padding-right: 0px;
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



        button.navbar-toggler {
            position: fixed;
        }
        button.navbar-toggler:focus {
            box-shadow: 0px 0px 10px #0d6efd2e;
        }
        #app .content {
            margin-bottom: 100px;
        }
        

        select[name="users-table_length"] {
            border-radius: 20px;
        }

        .navbar-collapse {
                flex-grow: unset;
        }
        @media (max-width: 767px) {
            .navbar-collapse.show {
                border-bottom: 1px solid #0d6efd2e;
            }
            .navbar-collapse {
                background: #f8f9fa;
                padding: 50px 20px 0px 20px;
                border-bottom-left-radius: 20px;
                border-bottom-right-radius: 20px;
            }
            ul.dropdown-menu.dropdown-menu-end.show {
                border-radius: 20px;
                border: 1px solid #0d6efd2e;
            }
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
    @include('layouts.partials.sidebar')
    <div class="content">
        @include('layouts.partials.navbar')
        <div class="p-2 mt-2">
            @auth()
                @include('layouts.partials.breadcrumb')
            @endauth
            <!--begin::Session Message-->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if($errors->count() > 0)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endif
            <!--begin::Dynamic content-->
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
            if (window.outerWidth > 767) {
                sidebar.classList.add("active-sidebar");
                container.classList.add("active-content");
            }
            sidebarToggle.addEventListener("click", () => {
                if (window.outerWidth > 767) {
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
