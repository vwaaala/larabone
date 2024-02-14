@extends('layouts.app') <!-- Extending the layout from the 'app.blade.php' file -->

@section('content') <!-- Opening the content section -->
<div class="mb-2">
    <!-- Button to go back to the previous page -->
    <button onclick="window.history.back();" class="btn btn-warning"><span class="bi bi-arrow-return-left"></span> Go Back</button>
</div>
<div class="row">
    <div class="col-lg-6 col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Information</h5> <!-- Card title for basic information -->
            </div>
            <div class="card-body">
                <!-- Form for updating users basic information -->
                <form method="POST" action="{{ route('roles.update', $role->id) }}">
                    @method('PUT') <!-- Method spoofing to use PUT method -->
                    @csrf <!-- CSRF protection -->

                    <div class="row">
                        <div class="col-12">
                            <!-- Input field for users's name -->
                            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                   name="name" value="{{ $role->name }}" required>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div> <!-- Error message for name input -->
                            @enderror
                        </div>
                        <div class="col-12 mt-2">
                            <!-- Button to submit users update -->
                            <button type="submit" class="btn btn-success">Update role</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection <!-- Closing the content section -->
