@php use Bunker\LaravelSpeedDate\Enums\EventTypeEnum; @endphp
@extends('layouts.app')
@section('content')
    @can('user_edit')
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ __('global.create') }} {{ __('speed_date::speed_date.events') }}</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('speed_date.events.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-12 mb-2">
                            <label for="name" class="form-label">{{ __('global.name') }} <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                   name="name" required>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-6 mb-2">
                            <label for="statusSelect" class="form-label">{{ __('global.type') }} <span
                                    class="text-danger">*</span></label>
                            <select class="form-select @error('status') is-invalid @enderror" id="statusSelect"
                                    name="status">
                                @foreach(EventTypeEnum::toArray() as $value)
                                    <option value="{{ $value }}">{{ ucfirst($value) }}</option>
                                @endforeach
                            </select>

                            @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-2">
                            <label for="happens_on" class="form-label">Happens On</label>
                            <div class="input-group date" id="datetimepicker" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input"
                                       data-target="#datetimepicker" name="happens_on" required>
                                <div class="input-group-text" data-target="#"
                                     data-toggle="datetimepicker">
                                    <i class="bi bi-calendar"></i>
                                </div>
                                @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary mt-5">{{ __('global.create') }}</button>
                </form>
            </div>
        </div>
    @endcan
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-5/6.0.0-alpha20/js/tempusdominus-bootstrap-5.min.js"></script>
    <!-- Initialize datetime picker -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            $('#datetimepicker').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:ss', // Customize the datetime format as needed
            });
        });
    </script>
@endpush
