@extends('layouts.app')
@section('content')
<!-- Profile Card -->
<div class="card">
    <div class="card-body">
        <!-- Profile Photo -->
        <img src="{{ asset(auth()->user()->avatar) }}" class="img-fluid rounded-circle mx-auto d-block" alt="{{ asset(auth()->user()->name) }}" style="max-width: 150px;">

        <!-- Full Name -->
        <h3 class="text-center mt-3">{{ auth()->user()->name }}</h3>

        <!-- Email -->
        <p class="text-center"><strong>{{ __('global.email') }}:</strong> {{ auth()->user()->email }}</p>

        <!-- Role Information -->
        <p class="text-center"><strong>{{ __('pages.roles.title_singular') }}:</strong> {{ auth()->user()->name }}</p>
    </div>
</div>
@endsection
