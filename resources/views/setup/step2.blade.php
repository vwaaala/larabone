@extends('setup.master')
@section('content')
    <div class="row">
        <div class="col-12 text-center mt-3">
            <ul class="progressbar">
                <li class="active"><a href="{{ route('viewSetup') }}">Server Requirements</a></li>
                <li class="active"><a href="{{ route('viewStep1') }}">Settings</a></li>
                <li class="active"><a href="{{ route('viewStep2') }}">Database</a></li>
                <li>Admin</li>
                <li>Summary</li>
            </ul>
        </div>
    </div>
    <div class="row mt-3 p-5">
        <div class="col-12">
            <form id="dbform" action="{{ route('setupStep2') }}" method="post">
                @csrf
                <div id="errorMessage"></div>
                <div id="db_settings" class="form-group">
                    <label for="app_env" class="form-label">Select Database Type</label>
                    <span class="tip" title="The type of your database">
                        <i class="bi bi-question-circle"></i>
                    </span>
                    <select class="form-select" id="db_connection" name="db_connection">
                        <option value="mysql">MySQL</option>
                    </select>

                    <label for="db_host" class="form-label mt-3" id="db_host_label">DB Host</label>
                    <span class="tip" id="db1tooltip"
                          title="The ip or domain your database server is hosted. For local development this usually is 127.0.0.1">
                        <i class="bi bi-question-circle"></i>
                    </span>
                    <input type="text" class="form-control" id="db_host" name="db_host" placeholder="127.0.0.1" required
                           value="{{$data["DB_HOST"]}}">

                    <label for="db_port" class="form-label mt-3" id="db_port_label">DB Port</label>
                    <span class="tip" id="db2tooltip" title="The port on which your database is running">
                        <i class="bi bi-question-circle"></i>
                    </span>
                    <input type="text" class="form-control" id="db_port" name="db_port" placeholder="3306" required
                           value="{{$data["DB_PORT"]}}">

                    <label for="db_database" class="form-label mt-3" id="db_database_label">DB Database</label>
                    <span class="tip" title="The name of your database">
                        <i class="bi bi-question-circle"></i>
                    </span>
                    <input type="text" class="form-control" id="db_database" name="db_database"
                           placeholder="Database Name" required>

                    <label for="db_username" class="form-label mt-3" id="db_username_label">DB Username</label>
                    <span class="tip" id="db3tooltip" title="The username for your database connection">
                        <i class="bi bi-question-circle"></i>
                    </span>
                    <input type="text" class="form-control" id="db_username" name="db_username" placeholder="Username"
                           required value="{{$data["DB_USERNAME"]}}">

                    <label for="db_password" class="form-label mt-3" id="db_password_label">DB Password</label>
                    <span class="tip" id="db4tooltip" title="The password for your database connection">
                        <i class="bi bi-question-circle"></i>
                    </span>
                    <input type="text" class="form-control" id="db_password" name="db_password" placeholder="Password"
                           required value="{{$data["DB_PASSWORD"]}}">

                    <a id="testdb" data-url="{{ route('testDB') }}" class="btn btn-dark mb-2 mt-3">Test Connection <i
                            class="bi bi-question-circle"></i></a>

                    <div class="row mt-2">
                        <div class="col-12 col-md-6">
                            <a href="{{ route('viewStep1') }}" class="btn btn-outline-danger mb-2"><i
                                    class="bi bi-arrow-left"></i> Previous Step </a>
                        </div>
                        <div class="col-12 col-md-6 d-flex justify-content-end">
                            <button type="submit" class="btn btn-outline-primary mb-2 float-md-right next_step d-none">
                                Next Step <i class="bi bi-arrow-right"></i></button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
