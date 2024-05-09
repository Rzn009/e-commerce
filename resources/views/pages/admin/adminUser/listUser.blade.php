@extends('layouts.parrent')

@section('title','List - user')

@section('content')




    <div class="row">
        <div class="card p-4">
            <h1 class="card-title">
                All User
            </h1>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->role }}</td>
                            <td>
                                <form action="{{ route('admin.resetPassword', $row->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-warning" type="submit">
                                    <i class="bi bi-intersect"></i>
                                </button>
                                </form>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection