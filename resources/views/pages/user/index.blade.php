@extends('layouts.parrent')

@section('title', 'user ')

@section('content')

    <div class="card p-5">
        <div class="card-title">
            <p>{{ Auth::user()->name }}</p>
        </div>
        <div class="card-body">

            <a href="{{ route('user.changePassword') }}" class="btn btn-warning">
                <i class="bi bi-pencil-fill"></i>
            </a>

        </div>
    </div>

    <div class="section dashboard">
        <div class="row">
            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">

                    <div class="card-body">
                        <h5 class="card-title">Total Pending</h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-cart"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $pending }}</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- End Sales Card -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">

                    <div class="card-body">
                        <h5 class="card-title">Total stattment</h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-bucket-fill"></i>
                            </div>
                            <div class="ps-3">
                                <h6>0</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">

                    <div class="card-body">
                        <h5 class="card-title">Total expired</h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-person"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $expired }}</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
