@extends('layouts.parrent')

@section('title','Category')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Category</h5>

            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Product</a></li>
                    <li class="breadcrumb-item active">Default</li>
                </ol>
            </nav>


            <button type="button" class="btn btn-primary my-auto" data-bs-toggle="modal" data-bs-target="#createModalCategory">
                <i class="bi bi-plus-circle"></i>
                Add Category
            </button>

            @include('pages.admin.category.modal-create')

            <table class="table datatable">
                <thead>
                    <tr>
                        <th>No .</th>
                        <th>Name</th>
                        <th>Images</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($category as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->name }}</td>
                            <td>
                                <img src="{{ url('storage/category/' , $row->image) }}" alt="{{ $row->name }}" class="img-fluid w-25">
                            </td>
                            <td >
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModalCategory{{ $row->id }}">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                @include('pages.admin.category.modal-edit')
                                <form action="{{ route('admin.category.destroy' , $row->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Data Empity</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <!-- End Table with stripped rows -->
        </div>
    </div>
@endsection

{{-- @push('script')
    <script type="text/javascript">
        ;

        function($) {
            function readURL(input) {
                var $prev = $('preview-logo')

            if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $prev.attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
            $prev.attr('class','');
        } else {
            $prev.attr('class'.'visually-hidden')
            }
        }
        $('#image').on('change', function(){
            readURL(this);
        });

    }(jQuery);
    </script>
@endpush --}}
