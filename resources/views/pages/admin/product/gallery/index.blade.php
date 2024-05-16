@extends('layouts.parrent')

@section('title', 'product - Gallery')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Product Gallery -- {{ $product->name }}</h5>

            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Product</a></li>
                    <li class="breadcrumb-item active">Default</li>
                </ol>
            </nav>


            <div>
                <!-- Basic Modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                    <i class="bi bi-plus-circle"> Product gallery</i>
                </button>
                @include('pages.admin.product.gallery.modal-create')
                <a href="{{ route('admin.product.index') }}" class="btn btn-info">
                    <i  class="bi bi-back"></i>
                </a>
            </div>


            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($product->product_gallery as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="flex justify-center">
                                <img src="{{ url('storage/product/gallery/', $row->image) }}" alt="no image" srcset=""
                                    class="rounded-circle w-25">
                            </td>
                            <td>
                                <form action="{{ route('admin.product.gallery.destroy' ,[$product->id, $row->id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?')">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </td>
                            <td>
                                <a href="" class="btn btn-warning"><i class="bi bi-pencil-fill"></i></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Data empity</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
@endsection
