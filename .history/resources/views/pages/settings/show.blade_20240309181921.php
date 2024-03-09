@extends('layouts.app', ['pageName' => config('pages.settings.siteInfo')])
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
                          <th scope="col">First</th>
                          <th scope="col">Last</th>
                          <th scope="col">Handle</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Mark</td>
                          <td>Otto</td>
                          <td>@mdo</td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>Jacob</td>
                          <td>Thornton</td>
                          <td>@fat</td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td colspan="2">Larry the Bird</td>
                          <td>@twitter</td>
                        </tr>
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
