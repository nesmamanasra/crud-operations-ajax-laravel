<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products()
    {
        $products = Product::latest()->paginate(7);
        $productsTow = Product::latest()->paginate(4);
        return view('products',compact('products','productsTow'));
    }
 // add product  
    public function addProduct(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:products',
            'price'=>'required',

        ],
        [
            'name.required'=>'Name is Required',
            'name.unique'=>'Product Already Exists',
            'price.required'=>'price is Required',

        ]
        );
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();
        return response()->json([
            'status'=>'success',
        ]);
    }
// update product
    public function updateProduct(Request $request)
    {
        $request->validate([
            'updateName'=>'required|unique:products,name,'.$request->updateId,
            'updatePrice'=>'required',

        ],
        [
            'updateName.required'=>'Name is Required',
            'updateName.unique'=>'Product Already Exists',
            'updatePrice.required'=>'price is Required',

        ]
        );
        Product::where('id',$request->updateId)->update([
            'name'=>$request->updateName,
            'price'=>$request->updatePrice,
        ]);
         
        return response()->json([
            'status'=>'success',
        ]);
    }

// delete product
    public function deleteProduct(Request $request)
    {
        Product::find($request->productId)->delete();
        return response()->json([
            'status'=>'success',
        ]);
    }

    // pagination product
    public function pagination(Request $request)
    {
        $products = Product::latest()->paginate(7);
        return view('paginationProducts',compact('products'))->render();
    }
}
