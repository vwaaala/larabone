@extends('layouts.app', ['pageName' => config('pages.roles.show')])
@section('content')
    @can('role_show')
        <!-- User DataTable -->
        <div class="card p-3">
            <div class="card-header d-flex justify-content-between">
                <h4 class="mb-0">{{ $role->name }}</h4>
            </div>

            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ __('pages.permissions.title_singular') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($rolePermissions as $role)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $role->name }}</td>
                        </tr>
                    @empty
                        <td colspan="3">
                        <span class="text-danger">
                            <strong>{{ __('global.notfound') }}</strong>
                        </span>
                        </td>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    @endcan
@endsection
