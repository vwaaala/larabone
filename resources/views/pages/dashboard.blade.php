@extends('layouts.app', ['pageName' => config('pages.dashboard')])
<!-- include summernote css/js -->
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush

@section('content')
    <div class="card">
        <div class="card-header">{{ __(config('pages.dashboard.trans')) }}</div>

        <div class="card-body">
            <div id="chat-messages" class="mb-4">
                <!-- Sample chat messages -->

            </div>

            <!-- Message input form -->
            <form id="message-form" class="mb-4">
                <div class="input-group">
                    <input type="text" id="message-input" class="form-control"
                           placeholder="Type your message here" required>
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>

    </script>
@endpush
