@extends('layouts.app')
@section('content')

    @can('role_show')
        <div class="mb-2">
            <!-- Button to go back to the previous page -->
            <button onclick="window.history.back();" class="btn btn-secondary"><span
                    class="bi bi-arrow-return-left"></span>
                {{ __('global.back_to_list') }}
            </button>
        </div>
        <!-- User DataTable -->
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <span>{{ $role->name }}</span>
            </div>

            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">S#</th>
                        <th scope="col">{{ __('cruds.role.title') }}</th>
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
                            <strong>{{ __('cruds.role.not_found') }}</strong>
                        </span>
                        </td>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    @endcan
@endsection
