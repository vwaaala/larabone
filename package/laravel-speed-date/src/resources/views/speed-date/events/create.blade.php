@php use Bunker\LaravelSpeedDate\Enums\EventTypeEnum; @endphp
@extends('layouts.app')
@push('styles')
<link rel="stylesheet" src="{{ asset('assets/libs/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css') }}">
@endpush
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
                            <label for="typeSelect" class="form-label">{{ __('global.type') }} <span
                                    class="text-danger">*</span></label>
                            <select class="form-select @error('type') is-invalid @enderror" id="typeSelect"
                                    name="type">
                                @foreach(EventTypeEnum::toArray() as $value)
                                    <option value="{{ $value }}">{{ ucfirst($value) }}</option>
                                @endforeach
                            </select>

                            @error('type')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-6 mb-2">
                            <label for="statusSelect" class="form-label">{{ __('global.status') }} <span
                                    class="text-danger">*</span></label>
                            <select class="form-select @error('status') is-invalid @enderror" id="statusSelect"
                                    name="status">
                                    <option value="0">{{ __('Active') }}</option>
                                    <option value="1">{{ __('Close') }}</option>
                            </select>

                            @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-2">
                            <label for="happens_on" class="form-label">Happens On</label>
                            <div class="input-group">
                                    <input type="text" value="03/13/2024 14:30" name="happens_on" class="form-control datetimepicker-input" required/>                                       
                                <div class="input-group-text" data-target="#"
                                     data-toggle="datetimepicker">
                                    <i class="bi bi-calendar"></i>
                                </div>
                                @error('happens_on')
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
    {{-- <script src="{{ asset('assets/libs/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js') }}"></script>
    <!-- Initialize datetime picker -->
    <script>
            $('.datetimepicker-input').datetimepicker();
    </script> --}}
@endpush
