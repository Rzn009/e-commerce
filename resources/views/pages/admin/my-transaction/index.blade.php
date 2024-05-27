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
            <h5 class="card-title"><i class="bi bi-bucket-fill"></i> List MyTransaction</h5>

            <table class="table data-table table-striped  table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name Account</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>status</th>
                        <th>Total Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($myTransaction as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ auth()->user()->name }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->phone }}</td>
                            <td>{{ $row->status }}</td>
                            <td>Rp. {{ $row->total_price }}</td>
                            <td>@if (Auth::user()->role == 'admin')
                                <a href="{{ route('admin.my-transaction.showDataBySlugAndId', [$row->slug, $row->id]) }}" class="btn btn-info"><i class="bi bi-eye"></i>
                                </a>
                                @else
                                <a href="{{ route('user.my-transaction.showDataBySlugAndId', [$row->slug, $row->id]) }}" class="btn btn-info"><i class="bi bi-eye"></i>
                                </a>
                            @endif
                            <td>
                                @if ($row->status == 'EXPIRED')
                                    <span class="badge badge-danger text-uppercase">Expired</span>
                                @elseif ($row->status == 'Pending')
                                    <span class="badge badge-warning">Pending</span>
                                @elseif ($row->status == 'Setlement')
                                    <span class="badge badge-info">Setlement</span>
                                @else 
                                <span class="badge badge-success">Success</span>
                                @endif
                            </td>   
                            <td><button type="button" class="btn btn-primary my-auto" data-bs-toggle="modal" data-bs-target="#createModalCategory">
                                <i class="bi bi-shop-window"></i>
                                Transaction
                            </button>

                            @include('pages.admin.my-transaction.modal-create')
                            <td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">No transactions found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
