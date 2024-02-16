@extends('layouts.app')
<!-- Extends the layout from 'layouts.app' -->

@section('content')
    <div class="mb-2">
        <!-- Button to go back to the previous page -->
        <a href="{{ route('permissions.index') }}" class="btn btn-warning">
            <span class="bi bi-arrow-return-left"></span>
            Go Back
        </a>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <!-- Left side of the card header -->
            <div>
                <h5 class="card-title mb-0">Permissions</h5>
                <!-- Subtitle indicating the purpose of permissions -->
                <span class="text-muted">assign these abilities to roles</span>
            </div>

            <!-- Right side of the card header Search form -->
            <form action="#" method="GET" class="form-inline">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search..."
                           value="{{ $searchQuery ?? '' }}">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="card-body">
            <!-- Table to display permissions -->
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <!-- Column headers -->
                    <th scope="col">Permission name</th>
                    <th scope="col">Permission description</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <!-- Loop through permissions and display each permissions -->
                @foreach($permissions as $key => $value)
                    <tr>
                        <!-- Output the row number -->
                        <th scope="row">{{ $loop->iteration }}</th>
                        <!-- Display permissions name and description -->
                        <td>{{ $value->name }}</td>
                    </tr>
                @endforeach
                </tbody>

                <!-- Pagination links -->
                <tfoot>
                <tr>
                    <td colspan="3"
                        class="text-center">{{ $permissions->appends(['search' => $searchQuery])->onEachSide(5)->links() }}</td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
