@extends('layouts.app')
@section('content')

    @can('role_show')
        <!-- User DataTable -->
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <span>{{ $role->name }}</span>
            </div>

            <div class="card-body">
                <!-- Button to go back to the previous page -->
                <a href="{{ route('roles.index') }}" class="btn btn-warning mb-2"><span class="bi bi-arrow-return-left"></span> Go Back</a>
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">S#</th>
                        <th scope="col">Name</th>
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
                            <strong>No Role Found!</strong>
                        </span>
                        </td>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    @endcan
@endsection
