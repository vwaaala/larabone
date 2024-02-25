@extends('layouts.app')
<!-- Extends the layout from 'layouts.app' -->

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <!-- Left side of the card header -->
            <div>
                <h5 class="card-title mb-0">{{ __('cruds.permission.title') }}</h5>
            </div>

            <!-- Right side of the card header Search form -->
            <form action="#" method="GET" class="form-inline">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="{{ __('global.search') }}..."
                           value="{{ $searchQuery ?? '' }}">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary btn-sm">{{ __('global.search') }}</button>
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
                    <th scope="col">{{ __('cruds.permission.title') }} {{ __('cruds.permission.fields.title') }}</th>
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
