@extends('setup.master')
@section('content')
    <meta name="csrf_token" content="{{ csrf_token() }}"/>

    <div class="row mt-3">
        <div class="col-12 text-center mt-3">
            <div class="loader d-none">Loading...</div>
        </div>
    </div>

    <div class="row mt-3 p-5 d-block" id="content">
        <div class="col-12 text-center mt-3">
            <ul class="progressbar">
                <li class="active">Server Requirements</li>
                <li class="active"><a href="/setup">Settings</a></li>
                <li class="active"><a href="/setup/step-2">Database</a></li>
                <li class="active"><a href="/setup/step-3">Admin</a></li>
                <li class="active"><a href="/setup/step-4">Summary</a></li>
            </ul>
        </div>
        <div class="col-12">

            <form action="{{route('lastStep')}}" method="post">
                @csrf

                <h2 class="mt-5 mb-5">Do you want these settings to change?</h2>

                <div id="tochange">

                    @if($data['APP_NAME'] != 'old')
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12 col-md-6 text-truncate">Application Name</div>

                                <div class="col-12 col-md-6 text-truncate"> {{ $data['APP_NAME'] }}</div>
                            </div>
                        </div>
                    @endif

                    @if($data['APP_KEY'] != 'old')
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12 col-md-6 text-truncate font-weight-bold">Application Key</div>

                                <div class="col-12 col-md-6 text-truncate"> {{ $data['APP_KEY'] }}</div>
                            </div>
                        </div>
                    @endif

                    @if($data['APP_DEBUG'] != 'old')
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12 col-md-6 text-truncate ">Application Debug Mode</div>

                                <div class="col-12 col-md-6 text-truncate"> {{ $data['APP_DEBUG'] }}</div>
                            </div>
                        </div>
                    @endif

                    @if($data['ADMIN_NAME'] != 'old')
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12 col-md-6 text-truncate ">Admin name</div>

                                <div class="col-12 col-md-6 text-truncate"> {{ $data['ADMIN_NAME'] }}</div>
                            </div>
                        </div>
                    @endif

                    @if($data['ADMIN_EMAIL'] != 'old')
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12 col-md-6 text-truncate ">Admin email</div>

                                <div class="col-12 col-md-6 text-truncate"> {{ $data['ADMIN_EMAIL'] }}</div>
                            </div>
                        </div>
                    @endif

                    @if($data['ADMIN_PASSWORD'] != 'old')
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12 col-md-6 text-truncate ">Admin password</div>

                                <div class="col-12 col-md-6 text-truncate"> {{ str_ireplace('"', '', $data['ADMIN_PASSWORD']) }}</div>
                            </div>
                        </div>
                    @endif


                    @if($data['DB_HOST'] != 'old')
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12 col-md-6 text-truncate">Database Host</div>

                                <div class="col-12 col-md-6 text-truncate"> {{ $data['DB_HOST'] }}</div>
                            </div>
                        </div>
                    @endif


                    @if($data['DB_DATABASE'] != 'old')
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12 col-md-6 text-truncate">Database Selected</div>

                                <div class="col-12 col-md-6 text-truncate"> {{ $data['DB_DATABASE']}}</div>
                            </div>
                        </div>
                    @endif

                    @if($data['DB_USERNAME'] != 'old')
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12 col-md-6 text-truncate">Database Username</div>

                                <div class="col-12 col-md-6 text-truncate"> {{ $data['DB_USERNAME'] }}</div>
                            </div>
                        </div>
                    @endif


                </div>
                <div class="row mt-5">
                    <div class="col-12 col-md-6 text-truncate">
                        <a href="/setup/step-2" class="btn btn-outline-danger mb-2"><i class="bi bi-arrow-left"></i>
                            Previous Step </a>
                    </div>
                    <div class="col-12 col-md-6 text-truncate d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary mb-2 btn-block" id="lastStep">Confirm <i
                                class="bi bi-check-circle"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
