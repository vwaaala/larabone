@extends('layouts.app')
@section('content')
    @canany(['user_show', 'user_create', 'user_edit', 'user_delete'])
        <!-- User DataTable -->
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <span>Manage Users</span>
                @can('user_delete')
                    <!-- Conditional link based on whether show_deleted parameter is present in the request -->
                    @if(request()->has('show_deleted'))
                        <!-- Link to return to main users index -->
                        <a class="btn btn-sm btn-secondary" href="{{ route('users.index') }}"><span
                                class="bi bi-arrow-return-left"></span> Go Back</a>
                    @else
                        <!-- Link to view deleted users -->
                        <a class="btn btn-sm btn-secondary" href="{{ route('users.index') }}?show_deleted=true"><span
                                class="bi bi-trash"></span> Recycle Bin</a>
                    @endif
                @endcan
            </div>
            <div class="card-body">
                <!-- Display User DataTable -->
                {{ $dataTable->table() }}
            </div>
        </div>
    @endcanany
@endsection

@push('scripts')
    <!-- Push DataTable scripts -->
    {!! $dataTable->scripts() !!}
@endpush
