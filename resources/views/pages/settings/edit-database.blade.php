@extends('layouts.app', ['pageName' => config('pages.settings.database' )])
@section('content')
    @canany(['settings_show', 'settings_create', 'settings_edit', 'settings_delete'])
        <!-- User DataTable -->
        <div class="card p-3">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ __('global.database') }}</h4>
                </div>
            </div>
            <div class="card-body">

            </div>
        </div>
    @endcanany
@endsection

@push('scripts')

    @can('settings_delete')
        @include('components.sweetAlert2')
    @endcan
@endpush
