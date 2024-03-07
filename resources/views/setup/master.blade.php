<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Setup | {{ config('app.name') }}</title>
    <link rel="icon" href="{{ asset('/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('/assets_setup/css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href=" https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css " rel="stylesheet">

</head>
<body class="background">
<div class="container-progress container bg-light">
    <div class="row text-center section-setup ms-4">
        <div class="col-12">
{{--            <h1>{{ config('app.name')}}</h1>--}}
            <img class="pt-2 pb-2" src="{{ asset('/logo.png') }}" alt="{{ config('app.name')}}" >
        </div>
    </div>
    @yield('content')
</div>


<script src="{{asset('/assets_setup/js/jquery.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

<script src="{{asset('/assets_setup/js/scripts.js')}}"></script>
@stack('script')
</body>
</html>
