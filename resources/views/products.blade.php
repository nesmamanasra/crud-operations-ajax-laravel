<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
  <div class="container">
    <div class="row">
         <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="my-3 text-center"><h2>Ajax Crud 'Product'</h2></div>
            <div class="my-3">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">ADD PRODUCT</button>
            </div>
            
            <div class="table-data">
                <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $key=>$product)
                    <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}}</td>
                    <td><button type="button" class="btn btn-secondary updateProductForm" data-bs-toggle="modal" data-bs-target="#updateModal" 
                    data-id="{{$product->id}}"
                    data-name="{{$product->name}}"
                    data-price="{{$product->price}}"
                    >edit</button></td>
                    <td><button type="button" class="btn btn-danger deleteProduct"
                    data-id="{{$product->id}}"
                    >Delete</button></td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
                {!!$products->links() !!}
</div>
</div>
  </div>
</div>
</br>
</br>
</br>
</br>


<div class="container">
<div class="row">
     <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="my-3 text-center"><h2>Without Ajax Crud 'Product'</h2></div>
        <div class="my-3">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalTow">ADD PRODUCT</button>
        </div>
        
        <div class="table-data">
        <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Product Name</th>
            <th scope="col">Product Price</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @php
                $i =0;
            @endphp
            @foreach ($productsTow as $productT)

            <tr>
              <th scope="row">{{++$i}}</th>
              <td>{{$productT->name}}</td>
              <td>{{$productT->price}}</td>
              <td>

              <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#updateModalTow" 
                    >edit</button>
              <form action="{{route('products.destroy', $product->id)}}" style="display:inline" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger ">Delete</button>
                </form>
              </td>
            </tr>
            @endforeach
        </tbody>
      </table>
            {!!$products->links() !!}
</div>
</div>
</div>
</div>
@include('add_product_modal'); 
@include('update_product_modal');
@include('product_js');
@include('add_productTow_modal'); 
@include('update_productTow_modal');
</body>
</html>