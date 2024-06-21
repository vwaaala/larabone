@extends('setup.master')
@section('content')

    <div class="row">
        <div class="col-12 text-center mt-3">
            <ul class="progressbar">
                <li class="active">Server Requirements</li>
                <li class="active"><a href="/setup">Settings</a></li>
                <li class="active"><a href="/setup/step-2">Database</a></li>
                <li class="active"><a href="/setup/step-3">Admin</a></li>
                <li>Mail</li>
                <li>Summary</li>
            </ul>
        </div>
    </div>

    <div class="row mt-3 p-5">
        <div class="col-12">
            <form action="{{ route('setupStep3') }}" method="post">
                @csrf
                <div class="form-group mb-2">
                    <label for="fullname" class="form-label">Admin Fullname</label>
                    <span class="text-primary" data-bs-toggle="tooltip" title="This is the full name of your admin user"
                          aria-hidden="true"><i class="bi bi-question-circle"></i></span>
                    <input type="text" class="form-control" id="fullname" name="name" placeholder="Full name"
                           required="" autofocus>
                </div>

                <div class="form-group mb-2">
                    <label for="email" class="form-label">Admin Email</label>
                    <span class="text-primary" data-bs-toggle="tooltip" title="This is the email of your admin user"
                          aria-hidden="true"><i class="bi bi-question-circle"></i></span>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required=""
                           autofocus>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Admin Password</label>
                    <span class="text-primary" data-bs-toggle="tooltip" title="This is the password of your admin user"
                          aria-hidden="true"><i class="bi bi-question-circle"></i></span>
                    <input type="text" class="form-control" id="password" name="password" placeholder="Password"
                           required="" autofocus>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6">
                        <a href="/setup" class="btn btn-outline-danger  mt-3"><i class="bi bi-arrow-left"></i> Previous
                            Step </a>
                    </div>
                    <div class="col-6 col-md-6 d-flex justify-content-end">
                        <button type="submit" id="next" class="btn btn-outline-primary mt-3 float-md-right">
                            <i class="bi bi-arrow-right"></i> Next Step</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
