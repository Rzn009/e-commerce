@extends('layouts.parrent')


@section('title', 'mytransaction')
@section('content')

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">My transaction</h5>

            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Transaction</a></li>
                    <li class="breadcrumb-item active">My Transaction</li>
                </ol>
            </nav>
        </div>
    </div>
<div class="card">
    <div class="card-body">
        <h5 class="card-title"><i class="bi bi-bucket-fill"></i>  List MyTransaction</h5>

        <table class="table data-table table-striped  table-hover table-bordered">

            <thead>
                <tr>
                    <td>No.</td>
                    <td>Name Account</td>
                    <td>Name </td>
                    <td>Email</td>
                    <td>Phone</td>
                    <td>Total Price</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @forelse ($myTransaction as $row)
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ auth()->user()->name }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->phone }}</td>
                        <td>{{ $row->phone }}</td>
                    @empty
                        
                    @endforelse
                </tr>
            </tbody>

        </table>


    </div>
</div>


@endsection
