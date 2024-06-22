@extends('layouts.app', ['pageName' => config('pages.settings.database' )])
@section('content')
    @canany(['settings_show', 'settings_create', 'settings_edit', 'settings_delete'])
        <!-- User DataTable -->
        <div class="card p-3">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ __('global.database') }}</h4>
                </div>
            </div>
            <div class="card-body">
                <form id="dbform" action="#" method="post">
                    @csrf
                    <div id="errorMessage"></div>
                    <div id="db_settings" class="form-group">
                        <label for="app_env" class="form-label">{{ __('global.Select Database Type')}}</label>
                        <span class="tip" title="The type of your database">
                            <i class="bi bi-question-circle"></i>
                        </span>
                        <select class="form-select" id="db_connection" name="db_connection">
                            <option value="mysql">{{ __('global.MySQL')}}</option>
                            <option value="pgsql">{{ __('global.PostgreSQL')}}</option>
                        </select>
    
                        <label for="db_host" class="form-label mt-3" id="db_host_label">{{ __('global.DB Host') }}</label>
                        <span class="tip" id="db1tooltip"
                              title="{{ __('global.The ip or domain your database server is hosted')}}">
                            <i class="bi bi-question-circle"></i>
                        </span>
                        <input type="text" class="form-control" id="db_host" name="db_host" placeholder="127.0.0.1" required
                               value="{{$packets["DB_HOST"]}}">
    
                        <label for="db_port" class="form-label mt-3" id="db_port_label">{{ __('global.DB Port')}}</label>
                        <span class="tip" id="db2tooltip" title="{{ __('global.The port on which your database is running')}}">
                            <i class="bi bi-question-circle"></i>
                        </span>
                        <input type="text" class="form-control" id="db_port" name="db_port" placeholder="3306" required
                               value="{{$packets["DB_PORT"]}}">
    
                        <label for="db_database" class="form-label mt-3" id="db_database_label">{{ __('global.DB Database') }}</label>
                        <span class="tip" title="The name of your database">
                            <i class="bi bi-question-circle"></i>
                        </span>
                        <input type="text" class="form-control" id="db_database" name="db_database"
                               placeholder="{{ __('global.name')}}" value="{{ $packets["DB_DATABASE"] }}" required>
    
                        <label for="db_username" class="form-label mt-3" id="db_username_label">{{ __('global.DB Username') }}</label>
                        <span class="tip" id="db3tooltip" title="{{ __('global.The username for your database connection')}}">
                            <i class="bi bi-question-circle"></i>
                        </span>
                        <input type="text" class="form-control" id="db_username" name="db_username" placeholder="{{ __('global.Username')}}"
                               required value="{{$packets["DB_USERNAME"]}}">
    
                        <label for="db_password" class="form-label mt-3" id="db_password_label">{{ __('global.DB Password') }}</label>
                        <span class="tip" id="db4tooltip" title="The password for your database connection">
                            <i class="bi bi-question-circle"></i>
                        </span>
                        <input type="text" class="form-control" id="db_password" name="db_password" placeholder="{{ __('global.password') }}"
                               required value="{{$packets["DB_PASSWORD"]}}">
    
                        <div class="row mt-2">
                            <div class="col-12 col-md-6 d-flex justify-content-end">
                                <button type="submit" class="btn btn-outline-primary mb-2 float-md-right next_step d-none">
                                    {{ __('global.update')}} <i class="bi bi-arrow-right"></i></button>
                            </div>
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
