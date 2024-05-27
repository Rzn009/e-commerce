<div class="modal fade" id="createModalCategory" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Transaction</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="col-12">
                    <div class="modal-body">
                        <label for="category" class="form-label">User Id</label>
                        <input type="text" class="form-control" id="categoryName" name="name" value="{{ $row->user_id }}">
                    </div>
                    <div class="modal-body">
                        <label for="category" class="form-label">Name</label>
                        <input type="text" class="form-control" id="categoryName" name="name" value="{{ $row->name }}">
                    </div>
                    <div class="modal-body">
                        <label for="category" class="form-label">Email</label>
                        <input type="text" class="form-control" id="image" name="email" value="{{ $row->email }}">
                    </div>
                    <div class="modal-body">
                        <label for="category" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="image" name="email" value="{{ $row->phone }}">
                    </div>
                    <div class="modal-body">
                        <label for="category" class="form-label">addres</label>
                        <input type="text" class="form-control" id="image" name="email" value="{{ $row->addres }}">
                    </div>
                    <div class="modal-body">
                        <label for="category" class="form-label">courier</label>
                        <input type="text" class="form-control" id="image" name="email" value="Fedex">
                    </div>
                    <div class="modal-body">
                        <label for="category" class="form-label">payment</label>
                        <input type="text" class="form-control" id="image" name="email" value="{{ $row->payment }}">
                    </div>
                    <div class="modal-body">
                        <label for="category" class="form-label">payment URL</label>
                        <a href="{{ $row->payment_url }}" class="form-label"></a>
                    </div>
                    <div class="modal-body">
                        <label for="category" class="form-label">status</label>
                        <input type="text" class="form-control" id="image" name="email" value="{{ $row->status }}">
                    </div>
                    <div class="modal-body">
                        <label for="category" class="form-label">total price</label>
                        <input type="text" class="form-control" id="image" name="email" value="{{ $row->total_price }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>

        </div>
    </div>
</div>
