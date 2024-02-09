@extends('layouts.app')
@section('content')

<div class="card">
        <div class="card-header">
            Query
        </div>
        <div class="card-body">
            <form method="POST" action="">
                @csrf <!-- Add CSRF token field -->

                <div class="mb-3">
                    <label for="subject" class="form-label">Subject<span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject" placeholder="Enter subject" required>
                    @error('subject')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="query" class="form-label">Query<span class="text-danger">*</span></label>
                    <textarea class="form-control @error('ticket') is-invalid @enderror" id="query" name="query" rows="3" placeholder="Enter your query" required></textarea>
                    @error('ticket')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="attachment" class="form-label">Attachment</label>
                    <input type="file" class="form-control" id="attachment" name="attachment">
                </div>
                <button type="submit" class="btn btn-primary">Submit Query</button>
            </form>
        </div>
    </div>
@endsection
