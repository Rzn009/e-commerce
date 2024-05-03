<div class="modal fade" id="editModalCategory{{ $row->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Edit Category {{ $row->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.category.update', $row->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-12">
                    <div class="modal-body">
                        <label for="category" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="categoryName" name="name"
                            value="{{ $row->name }}">
                    </div>
                    <div class="modal-body">
                        <label for="category" class="form-label">Category Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <div class="col-12">
                        <img src="#" alt="category-image" id="preview-logo"
                            class="visually-hidden img-thumbnail">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
