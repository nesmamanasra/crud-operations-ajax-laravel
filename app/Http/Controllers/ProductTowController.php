<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductTowController extends Controller
{

    public function index()
    {
        //show all data here
        // $products = Product::all();
        // $productsTow = Product::latest()->paginate(4);
        // return view("products" ,compact('productsTow'));
    }

    public function store(Request $request)
    {
        //add new product
        $request->validate([
            'name'=>'required',
            'price'=>'required',

        ]);
        $product = Product::create($request->all());
         return redirect()->route('products')->with('sucsess','create update');

    }

   
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
        ]);
        $product->update($request->all());
         return redirect()->route('products');

    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products')->with('sucsess delete');

    }

    public function pagination(Request $request)
    {
        $products = Product::latest()->paginate(4);
        return view("products.index" ,compact('products'));
    }
}
