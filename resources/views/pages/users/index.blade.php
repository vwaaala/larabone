@extends('layouts.app', ['pageName' => config('pages.users.index')])
@section('content')
    @canany(['user_show', 'user_create', 'user_edit', 'user_delete'])
        <div class="d-flex justify-content-between">
            <h4>{{ __('pages.users.title') }}</h4>
            @can('user_delete')
                <!-- Conditional link based on whether show_deleted parameter is present in the request -->
                @if(request()->has('show_deleted'))
                    <!-- Link to return to main users index -->
                    <a class="btn btn-sm btn-outline-primary" href="{{ route('users.index') }}"><span
                            class="bi bi-arrow-return-left"></span> {{ __('global.back_to_list') }}</a>
                @else
                    <!-- Link to view deleted users -->
                    <a class="btn btn-sm btn-danger" href="{{ route('users.index') }}?show_deleted=true"><span
                            class="bi bi-trash"></span> {{ __('global.recycle_bin') }}</a>
                @endif
            @endcan
        </div>
        <!-- User DataTable -->
        <div class="card mt-2">
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
