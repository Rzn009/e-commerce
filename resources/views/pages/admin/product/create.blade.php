@extends('layouts.parrent')

@section('title' , 'Create - Product')

@section('content')
    <div class="card p-4">
        <div class="card-body">
            <h5 class="card-title">Create Product</h5>
        </div>
        <form action="{{ route('admin.product.store') }}" method="POST">
            @csrf
            @method('POST')
            <div class="col-12">
                <div class="modal-body">
                    <label for="category" class="form-label"> Name</label>
                    <input type="text" class="form-control" id="productName" name="name">
                </div>
                <div class="col-12">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}">
                </div>

                <div class="mb-3">
                    <label class="col col-form-label">choose category</label>
                    <div class="col-sm-10">
                        <select class="form-select" name="category_id" aria-label="Default select example">
                            <option selected>Select options</option>
                            @foreach ($category as $row)
                                <option value="{{ $row->id }} ">{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <label for="productDescription" class="form-label">Description</label>
                    <div class="quill-editor-default">
                        <textarea class="form-control" aria-label="With textarea" id="productDescription" name="description">{{ old('description') }}</textarea>
                    </div>
                </div>



            </div>
            <div class="modal-footer p-4 m-3">
                <a href="{{ route('admin.product.index') }}" class="btn btn-info m-2" data-bs-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i></button>
            </div>
        </form>
    </div>
@endsection
