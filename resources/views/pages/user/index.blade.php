@extends('layouts.parrent')

@section('title','user ')

@section('content')

<div class="card p-5">
    <div class="card-title">
        <p>{{ Auth::user()->name }}</p>
    </div>
    <div class="card-body">
        
    </div>
</div>

@endsection