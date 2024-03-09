@extends('layouts.app', ['pageName' => config('pages.settings.index')])
@section('content')
    @canany(['settings_show', 'settings_create', 'settings_edit', 'settings_delete'])
        <!-- User DataTable -->
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ __('pages.settings.title') }}</h4>
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
                        {{ dd($siteInfo) }}
                        {{ dd($hello) }}
                        @foreach($siteInfo as $key => $value)
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

@push('scripts')

    @can('settings_delete')
        @include('components.sweetAlert2')
    @endcan
@endpush
