<!-- Modal -->
<div class="modal fade" id="exampleModalTow" tabindex="-1" aria-labelledby="exampleModalTow" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Product</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="errMsgContainer my-3">
            
        </div>
        <form class="container p-2 mt-4" action="{{route('products.store')}}" method="POST">
        @csrf
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Product Name</label>
        <input type="text" class="form-control" name="name" aria-describedby="emailHelp" >
        </div>
        <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Product Price</label>
        <input type="text" class="form-control" name="price">
        </div>
       
        
   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add product</button>
      </div>
      </form>
    </div>
  </div>
</div>