@extends('layouts.app')
@section('content')
    <!-- Profile Card -->
    <div class="card">
        <div class="card-body">
            <!-- Profile Photo -->
            <img src="{{ asset($user->avatar) }}" class="img-fluid rounded-circle mx-auto d-block" alt="Your Profile Photo" style="max-width: 150px;">

            <!-- Full Name -->
            <h3 class="text-center mt-3">{{ $user->name }}</h3>

            <!-- Email -->
            <p class="text-center"><strong>Email:</strong> {{ $user->email }}</p>

            <!-- Role Information -->
            <p class="text-center"><strong>Role:</strong> {{ $user->role->name }}</p>
        </div>
    </div>
@endsection
