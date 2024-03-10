@extends('layouts.app', ['pageName' => config('pages.settings.general' )])
@section('content')
    @can('settings_edit')
        <!-- User DataTable -->
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ __('pages.settings.general') }}</h4>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('settings.generalUpdate') }}" method="POST" enctype="multipart/form-data" class="needs-validation">
                    @csrf
                    <div class="mb-2">
                        <label class="form-label text-muted" for="name">Name your Application <span class="text-danger">*</span></label>
                        <span class="text-primary" data-bs-toggle="tooltip" title="This is the name of your Application"><i class="bi bi-question-circle"></i></span>
                        <input type="text" class="form-control" id="name" name="name" value="{{ str_replace('"', '', $packets['APP_NAME']) }}" autofocus required>
                    </div>

                    <div class="mb-2" id="drop-area">
                        <label class="form-label" >Logo <small class="text-muted">195p x 60p</small> <span class="text-danger">*</span></label>
                        <div class="icon-shape icon-xxl border rounded position-relative">
                            <span class="position-absolute text-primary" id="preview"><i class="bi bi-image fs-3 text-muted"></i></span>
                            <input id="logo" name="logo" class="form-control border-0 opacity-0" type="file" required autofocus>
                        </div>
                    </div>

                    <div class="mb-2">
                        <label class="form-label text-muted" for="domain">Domain <span class="text-danger">*</span></label>
                        <span class="text-primary" data-bs-toggle="tooltip" title="This is the domain of your Application"><i class="bi bi-question-circle"></i></span>
                        <input type="text" class="form-control" id="domain" name="domain" value="{{ $packets['APP_URL'] }}" autofocus required>
                    </div>

                    <div class="mb-2" id="drop-area">
                        <label class="form-label" for="avatar">Avatar <small class="text-muted">500p x 500p</small> <span class="text-danger">*</span></label>
                        <div class="icon-shape icon-xxl border rounded position-relative">
                            <span class="position-absolute text-primary" id="preview"><i class="bi bi-image fs-3 text-muted"></i></span>
                            <input id="avatar" name="avatar" class="form-control border-0 opacity-0" type="file" required autofocus>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label class="form-label text-muted" for="support_email">Support email <span class="text-danger">*</span></label>
                            <span class="text-primary" data-bs-toggle="tooltip" title="This email will be used for support channel" aria-hidden="true"><i class="bi bi-question-circle"></i></span>
                            <input type="email" class="form-control" id="support_email" name="support_email" value="{{ $packets['EMAIL_SUPPORT'] }}" autofocus required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-muted" for="phone_first">Site Contact Number <span class="text-danger">*</span></label>
                            <span class="text-primary" data-bs-toggle="tooltip" title="This number will be used contact number" aria-hidden="true"><i class="bi bi-question-circle"></i></span>
                            <input type="text" class="form-control" id="phone_first" name="phone_first" value="{{ $packets['CONTACT_NUMBER'] }}" autofocus required>
                        </div>
                    </div>

                    <div class="mb-2">
                        <label class="form-label text-muted" for="street">Street <span class="text-danger">*</span></label>
                        <span class="text-primary" data-bs-toggle="tooltip" title="This will be used as street address" aria-hidden="true"><i class="bi bi-question-circle"></i></span>
                        <input type="text" class="form-control" id="street" name="street" value="{{ str_replace('"', '', $packets['STREET']) }}" autofocus required>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label class="form-label text-muted" for="city">City <span class="text-danger">*</span></label>
                            <span class="text-primary" data-bs-toggle="tooltip" title="This name will be used as city" aria-hidden="true"><i class="bi bi-question-circle"></i></span>
                            <input type="text" class="form-control" id="city" name="city" value="{{ $packets['CITY'] }}" autofocus required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-muted" for="country">Country <span class="text-danger">*</span></label>
                            <span class="text-primary" data-bs-toggle="tooltip" title="This name will be used as country" aria-hidden="true"><i class="bi bi-question-circle"></i></span>
                            <input type="text" class="form-control" id="country" name="country" value="{{ $packets['COUNTRY'] }}" autofocus required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-outline-primary mt-3"><i class="bi bi-save2"></i> {{ __('global.update') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endcanany
@endsection

@push('scripts')

    @can('settings_delete')
        @include('components.sweetAlert2')
    @endcan
@endpush
