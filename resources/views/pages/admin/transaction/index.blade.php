@extends('layouts.parrent')

@section('title', 'transaction')
@section('content')

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Transaction</h5>

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

            <div class="table-responsive">
                <table class="table data-table table-striped  table-hover table-bordered ">
                    <thead>
                        <tr>
                            <td>No.</td>
                            <th>Name Account</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Total Price</th>
                            <th>Payment URL</th>
                            <th>status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transaction as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->user->name }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->phone }}</td>
                                <td>{{ $row->total_price }}</td>
                                <td>
                                    @if ($row->payment_url == 'null')
                                        <span>Null</span>
                                    @else
                                        <a href="{{ $row->payment_url }}">MIDTRANS</a>
                                    @endif

                                </td>
                                <td>
                                    @if ($row->status == 'expired')
                                        <span class="badge bg-danger">Expired</span>
                                    @elseif ($row->status == 'Pending')
                                        <span class="badge bg-warning">Pending</span>
                                    @elseif ($row->status == 'settlement')
                                        <span class="badge bg-info">Settlement</span>
                                    @else
                                        <span class="badge bg-success">Success</span>
                                    @endif
                                </td>
                                <td> <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#updateStatus{{ $row->id }}">
                                        Edit
                                    </button>

                                    @include('pages.admin.transaction.edit')

                                    <a href="#" class="btn btn-info btn-sm mx-2">
                                        Show
                                    </a>
                                <td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">No transactions found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </table>
        </div>
    </div>

@endsection
