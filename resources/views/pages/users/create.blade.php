@extends('layouts.app', ['pageName' => config('pages.users.create')])
@section('content')
    @can('user_edit')
        <div class="card p-3">
            <div class="card-header">
                <h4 class="mb-0">{{ __('global.create') }} {{ __('pages.users.title_singular') }}</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-6 mb-2">
                            <label for="name" class="form-label">{{ __('pages.users.fields.title') }} <span
                                    class="text-danger">*</span></label>
                            <span class="tip" title="Full name of the user">
                                <i class="bi bi-question-circle"></i>
                            </span>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                   name="name" required>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-6 mb-2">
                            <label for="email" class="form-label">{{ __('pages.users.fields.email') }} <span
                                    class="text-danger">*</span></label>
                            <span class="tip" title="Email of user">
                                <i class="bi bi-question-circle"></i>
                            </span>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                   name="email" required>
                            <div id="emailHelp" class="form-text">{{ __('pages.users.fields.email_helper') }}</div>
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-6 mb-2">
                            <label for="password" class="form-label">{{ __('pages.users.fields.password') }} <span
                                    class="text-danger">*</span></label>
                            <span class="tip" title="Minimum 6 digits">
                                <i class="bi bi-question-circle"></i>
                            </span>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                   id="password" name="password" required>
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-6 mb-2">
                            <label for="password_confirmation"
                                   class="form-label">{{ __('pages.users.fields.password_confirm') }} <span
                                    class="text-danger">*</span></label>
                            <span class="tip" title="Password confirmation">
                                <i class="bi bi-question-circle"></i>
                            </span>
                            <input type="password"
                                   class="form-control @error('password_confirmation') is-invalid @enderror"
                                   id="password_confirmation" name="password_confirmation" required>
                            @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-6 mb-2">
                            <label for="roleSelect" class="form-label">{{ __('pages.users.fields.roles') }} <span
                                    class="text-danger">*</span></label>
                            <span class="tip" title="Assign role for this user">
                                <i class="bi bi-question-circle"></i>
                            </span>
                            <select class="form-select @error('roles') is-invalid @enderror" id="roleSelect"
                                    name="role">
                                @foreach($roles as $role)
                                    <option value="{{ $role }}">{{ $role }}</option>
                                @endforeach
                            </select>
                            @error('roles')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-6 mb-2">
                            <label for="statusSelect" class="form-label">{{ __('global.status') }} <span
                                    class="text-danger">*</span></label>
                            <span class="tip" title="Give user a status">
                                <i class="bi bi-question-circle"></i>
                            </span>
                            <select class="form-select @error('status') is-invalid @enderror" id="statusSelect"
                                    name="status">
                                <option value="pending">Pending</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                                <option value="banned">Banned</option>
                            </select>
                            @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="avatar" class="form-label">{{ __('global.photo') }}</label>
                            <span class="tip" title="Maximum 2mb and square like 500x500">
                                <i class="bi bi-question-circle"></i>
                            </span>
                            <input type="file" class="form-control" id="avatar" name="avatar">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-5">{{ __('global.create') }}</button>
                </form>
            </div>
        </div>
    @endcan
@endsection
