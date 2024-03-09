@extends('layouts.app', ['pageName' => config('pages.settings.' . $title )])
@section('content')
    @canany(['settings_show', 'settings_create', 'settings_edit', 'settings_delete'])
        <!-- User DataTable -->
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ __('pages.settings.' . $title) }}</h4>
                    @can('settings_edit')
                        <a href="{{ route('settings.'. $title .'Edit') }}" class="btn btn-sm btn-success">
                            <i class="bi bi-plus-circle"></i> {{ __('global.edit') }}
                        </a>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered border-primary">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Value</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($packets as $key => $value)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $key }}</td>
                            <td>{{ $value }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endcanany
@endsection
