@extends('layouts.app')
@section('content')
        <!-- User DataTable -->
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <span>Manage Users</span>
                <!-- Conditional link based on whether show_deleted parameter is present in the request -->
                @if(request()->has('show_deleted'))
                    <!-- Link to return to main users index -->
                    <a class="btn btn-sm btn-warning" href="{{ route('roles.index') }}"><span
                            class="bi bi-arrow-return-left"></span> Go Back</a>
                @else
                    <!-- Link to view deleted users -->
                    <a class="btn btn-sm btn-danger" href="{{ route('roles.index') }}?show_deleted=true"><span
                            class="bi bi-trash"></span> Recycle Bin</a>
                @endif
            </div>
            <div class="card-body">
                <!-- Display User DataTable -->
                {{ $dataTable->table() }}
            </div>
        </div>
@endsection

@push('scripts')
    <!-- Push DataTable scripts -->
    {!! $dataTable->scripts() !!}
@endpush
