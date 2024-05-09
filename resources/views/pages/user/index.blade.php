@extends('layouts.parrent')

@section('title','user ')

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

@endsection