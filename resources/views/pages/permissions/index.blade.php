@extends('layouts.app', ['pageName' => config('pages.permissions.index')])
@section('content')
    <div class="d-flex mb-2 justify-content-end">
        <form action="#" method="GET" class="form-inline">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="{{ __('global.search') }}..."
                       value="{{ $searchQuery ?? '' }}">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-success">{{ __('global.search') }}</button>
                </div>
            </div>
        </form>
    </div>
    <div class="card">
        <div class="card-body">
            <!-- Table to display permissions -->
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <!-- Column headers -->
                    <th scope="col">{{ __('pages.permissions.title') }} {{ __('pages.permissions.fields.title') }}</th>
                </tr>
                </thead>
                <tbody>
                <!-- Loop through permissions and display each permission -->
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
