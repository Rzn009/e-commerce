@extends('layouts.parrent')

@section('title', 'Dashboard - Admin')

@section('content')

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Dashboard</h5>

            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="bi bi-house-door"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">Library</a></li>
                    <li class="breadcrumb-item active">Default</li>
                </ol>
            </nav>
        </div>
    </div>
    Hello {{ Auth::user()->name }}

@endsection
