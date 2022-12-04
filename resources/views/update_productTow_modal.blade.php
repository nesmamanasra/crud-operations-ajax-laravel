<!-- Modal -->
<div class="modal fade" id="updateModalTow" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="updateModalLabel">Update Product</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="errMsgContainer my-3">
            
        </div>
      <form action="{{route('products.update', $product->id)}}" method="POST">
        @csrf
        @method("PUT")
        <input type="hidden" id="updateId">
          <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Name Product</label>
          <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}">
          </div>
          <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Price Product</label>
          <input type="text" class="form-control" id="price" name="price" value="{{$product->price}}">
        </div>
  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary ">Update Product</button>
        </form>
      </div>
    </div>
  </div>
</div>