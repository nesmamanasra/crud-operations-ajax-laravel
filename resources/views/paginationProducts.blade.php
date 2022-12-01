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