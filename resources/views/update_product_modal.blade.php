<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="updateModalLabel">Update Product</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="errMsgContainer my-3">
            
        </div>
      <form action="" method="" id="updateProductForm">
        @csrf
        <input type="hidden" id="updateId">
          <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Name Product</label>
          <input type="text" class="form-control" id="updateName" name="updateName">
          </div>
          <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Price Product</label>
          <input type="text" class="form-control" id="updatePrice" name="updatePrice">
        </div>
  </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary update_product">Update Product</button>
      </div>
    </div>
  </div>
</div>