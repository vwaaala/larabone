@extends('layouts.app', ['pageName' => config('pages.dashboard')])
<!-- include summernote css/js -->
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <style>
        .card .d-icons i {
            transition: .3s ease-in-out;
        }
        .card:hover .d-icons i {
            font-size: 2rem;
        }
    </style>
@endpush

@section('content')
        <div class="row g-6 mb-6">
            <div class="col-xl-3 col-sm-6 col-12 pb-sm-2">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">Budget</span>
                                <span class="h3 font-bold mb-0">$750.90</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape d-icons rounded-circle">
                                    <i class="bi bi-credit-card text-primary"></i>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2 mb-0 text-sm">
                                    <span class="badge badge-pill bg-soft-success text-success me-2">
                                        <i class="bi bi-arrow-up me-1"></i>13%
                                    </span>
                            <span class="text-nowrap text-xs text-muted">Since last month</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 pb-sm-2">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">New projects</span>
                                <span class="h3 font-bold mb-0">215</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape d-icons rounded-circle">
                                    <i class="bi bi-people text-primary"></i>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2 mb-0 text-sm">
                                    <span class="badge badge-pill bg-soft-success text-success me-2">
                                        <i class="bi bi-arrow-up me-1"></i>30%
                                    </span>
                            <span class="text-nowrap text-xs text-muted">Since last month</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 pb-sm-2">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total hours</span>
                                <span class="h3 font-bold mb-0">1.400</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape d-icons rounded-circle">
                                    <i class="bi bi-clock-history text-primary"></i>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2 mb-0 text-sm">
                                    <span class="badge badge-pill bg-soft-danger text-danger me-2">
                                        <i class="bi bi-arrow-down me-1"></i>-5%
                                    </span>
                            <span class="text-nowrap text-xs text-muted">Since last month</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 pb-sm-2">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">Work load</span>
                                <span class="h3 font-bold mb-0">95%</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape d-icons rounded-circle">
                                    <i class="bi bi-minecart-loaded text-primary"></i>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2 mb-0 text-sm">
                                    <span class="badge badge-pill bg-soft-success text-success me-2">
                                        <i class="bi bi-arrow-up me-1"></i>10%
                                    </span>
                            <span class="text-nowrap text-xs text-muted">Since last month</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@push('scripts')
    <script>

    </script>
@endpush
