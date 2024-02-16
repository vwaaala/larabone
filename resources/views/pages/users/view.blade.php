@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <span>My Profile</span>
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-secondary">Edit Profile</a>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <!-- Profile Photo -->
                <div class="col-md-3">
                    <img src="{{ asset($user->avatar) }}" class="img-fluid rounded" alt="Your Profile Photo">
                </div>

                <!-- Name and Email -->
                <div class="col-md-9">
                    <!-- Full Name -->
                    <h3>{{ $user->name }}</h3>

                    <!-- Email with Mail Icon -->
                    <p><strong><i class="bi bi-envelope-check"></i></strong> {{ $user->email }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
