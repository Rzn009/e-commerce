@extends('layouts.parrent')

@section('title','product')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Product</h5>

            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Product</a></li>
                    <li class="breadcrumb-item active">Default</li>
                </ol>
            </nav>

        </div>
    </div>

    <div class="card p-5">
        <div class="card-body">
            <a href="{{ route('admin.product.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i>
                Add Product
            </a>

            <table class="table datatable">
                <thead>
                    <tr>
                        <th>No .</th>
                        <th>Name</th>
                        <th>pirce</th>
                        <th>category</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($product as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->category->name }}</td>
                            <td>Rp. <span>{{ number_format($row->price, 0, ',', '.') }}</span></td>
                            <td>
                                <a href="{{ route('admin.product.gallery.index', $row->id) }}" class="btn btn-info">
                                    <i class="bi bi-card-image"></i>
                                </a>
                                <a href="{{ route('admin.product.edit', $row->id) }}" class="btn btn-warning">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <form action="{{ route('admin.product.destroy', $row->id) }}" method="post"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @endforeach

                </tbody>
                </tbody>
            </table>
        </div>
    </div>
@endsection
