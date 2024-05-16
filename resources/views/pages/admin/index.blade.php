@extends('layouts.parrent')

@section('title', 'Dashboard - Admin')

@section('content')

    <div class="section dashboard">
        <div class="row">
            <div class="col-xxl-4 col-xl-12">

                <div class="card info-card customers-card">


                    <div class="card-body">
                        <h5 class="card-title">Dashboard |<span class="badge bg-danger text-white-50"><i
                                    class="bi bi-exclamation-octagon me-1"></i> Danger</span>
                                    
                        </h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-people"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ Auth::user()->name }}</h6>
                                <span class="text-danger small pt-1 fw-bold">{{ Auth::user()->email }}</span>

                            </div>
                            <div class="ps-3">
                                <a href="" class="btn btn-danger">
                                    <i class="bi bi-pencil"></i>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

            </div><!-- End Customers Card -->
        </div>
    </div>


    <div class="section dashboard">
        <div class="row">
            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">

                    <div class="card-body">
                        <h5 class="card-title">Category <span>| Today</span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-cart"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $category }}</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- End Sales Card -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">

                    <div class="card-body">
                        <h5 class="card-title">Product <span>| This Year <span class="current-time"></span></span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-bucket-fill"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $product }}</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">

                    <div class="card-body">
                        <h5 class="card-title">User <span>| Today</span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-person"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $user }}</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    
@endsection
