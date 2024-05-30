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
                <li class="active"><a href="/setup/step-4">Mail</a></li>
                <li>Summary</li>
            </ul>
        </div>


    </div>
    <div class="row mt-3 p-5">
        <div class="col-12">
            <form id="mailform" action="{{ route('setupStep4') }}" method="post">
                @csrf
                <div id="errorMessage"></div>
                <p class="text-primary font-weight-bold mb-3">Optional Step. You can configure later.</p>
                <div id="mail_settings" class="form-group">
                    <label for="mail_driver" class="form-label">Select Mail driver</label>
                    <span class="tip" title="The driver type of your mail server">
                        <i class="bi bi-question-circle"></i>
                    </span>
                    <select class="form-select" id="mail_driver" name="mail_driver">
                        <option value="smtp">SMTP</option>
                    </select>

                    <label for="mail_host" class="form-label mt-3" id="db_host_label">Mail Host</label>
                    <span class="tip" id="db1tooltip"
                          title="The hostname of your mail server">
                        <i class="bi bi-question-circle"></i>
                    </span>
                    <input type="text" class="form-control" id="mail_host" name="mail_host" placeholder="127.0.0.1" 
                           value="">

                    <label for="mail_port" class="form-label mt-3" id="db_port_label">Mail Port</label>
                    <span class="tip" id="db2tooltip" title="The port on which your mail server is running">
                        <i class="bi bi-question-circle"></i>
                    </span>
                    <input type="text" class="form-control" id="mail_port" name="mail_port" placeholder="1025" 
                           value="">

                    <label for="mail_username" class="form-label mt-3">Mail Username</label>
                    <span class="tip" id="db3tooltip" title="The username for your mail server">
                        <i class="bi bi-question-circle"></i>
                    </span>
                    <input type="text" class="form-control" id="mail_username" name="mail_username" placeholder="Mail server username"
                            value="">

                    <label for="mail_password" class="form-label mt-3" >Mail Password</label>
                    <span class="tip" id="db4tooltip" title="The password for your mail server">
                        <i class="bi bi-question-circle"></i>
                    </span>
                    <input type="text" class="form-control" id="mail_password" name="mail_password" placeholder="Mail server password"
                            value="">

                    <label for="mail_encryption" class="form-label">Encryption type</label>
                    <span class="tip" title="The encryption type of your mail server">
                        <i class="bi bi-question-circle"></i>
                    </span>
                    <select class="form-select" id="mail_encryption" name="mail_encryption">
                        <option value="tls" selected>TLS</option>
                        <option value="ssl">SSL</option>
                    </select>
                    <div class="row mt-2">
                        <div class="col-12 col-md-6">
                            <a href="{{ route('viewStep3') }}" class="btn btn-outline-danger mb-2"><i
                                    class="bi bi-arrow-left"></i> Previous Step </a>
                        </div>
                        <div class="col-12 col-md-6 d-flex justify-content-end">
                            <button type="submit" class="btn btn-outline-primary mb-2 float-md-right next_step ">
                                <i class="bi bi-arrow-right"></i> Next Step</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
