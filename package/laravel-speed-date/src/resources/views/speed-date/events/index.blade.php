@extends('layouts.app')
@section('content')

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0">{{ __('Event') }}</h4>
                <form action="#" method="GET" class="form-inline">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="{{ __('global.search') }}..."
                               value="{{ $searchQuery ?? '' }}">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-success"><i class="bi bi-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body">
            <!-- Table to display permissions -->
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <!-- Column headers -->
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <!-- Loop through permissions and display each permission -->
                @foreach($events as $key => $value)
                    <tr>
                        <!-- Output the row number -->
                        <th scope="row">{{ $loop->iteration }}</th>
                        <!-- Display permissions name and description -->
                        <td>{{ $value->name }}</td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-file">
                                Launch demo modal
                              </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <!-- Pagination links -->
                <tfoot>
                <tr>
                    <td colspan="3"
                        class="text-center">{{ $events->appends(['search' => $searchQuery])->onEachSide(5)->links() }}</td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- file upload modal -->
    <div class="modal fade" id="modal-file" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Upload csv</h1>

            </div>
            <div class="modal-body">
                <form action="{{ route('speed_date.events.uploadUsers') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="csv_file" class="form-label">Choose CSV File:</label>
                        <input type="file" class="form-control" id="csv_file" name="csv_file" accept=".csv">
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
@endsection

