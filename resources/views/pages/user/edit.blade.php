@extends('layouts.parrent')


@section('title','canghe password')

@section('content')

<div class="row">
    <div class="card p-4">
        <h3 class="card-title">Change Password</h3>
        <form action="{{ route('user.updatePassword') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">Old Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" placeholder="Old Password" name="current_password">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">New Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" placeholder="New Password" name="password">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">Confirm Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" placeholder="Confirm New Password"
                        name="confirmation_password">
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-danger"><i class='ri-save-3-fill me-1'></i>| Confirm Change</button>
            </div>
        </form>
    </div>
</div>


@endsection