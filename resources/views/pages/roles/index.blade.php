@extends('layouts.app')
@section('content')

    @can('role_show')
        <!-- User DataTable -->
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <span>Manage Roles</span>
            </div>

            <div class="card-body">
                @can('role_create')
                    <a href="{{ route('roles.create') }}" class="btn btn-success btn-sm my-2"><i
                            class="bi bi-plus-circle"></i> Add New Role</a>
                @endcan
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">S#</th>
                        <th scope="col">Name</th>
                        <th scope="col" style="width: 250px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($roles as $role)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $role->name }}</td>
                            <td>
                                <a href="{{ route('roles.show', $role->id) }}" class="btn btn-warning btn-sm"><i
                                        class="bi bi-eye"></i> Show</a>
                                @can('role_edit')
                                    <a href="{{ route('roles.edit', $role->id) }}"
                                       class="btn btn-primary btn-sm"><i
                                            class="bi bi-pencil-square"></i> Edit</a>
                                @endcan
                                @can('role_delete')
                                    <a href="{{ route('croles.destroy', $role->id) }}"
                                       class="btn btn-danger btn-sm"><i
                                            class="bi bi-pencil-square"></i> Delete</a>
                                @endcan
                            </td>
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

                {{ $roles->links() }}

            </div>
        </div>
    @endcan
@endsection
