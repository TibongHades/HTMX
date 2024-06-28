<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(Request $request) {
        $products = Product::orderBy('created_at', 'desc');

        if ($request->filter) {
            $products->where('name', 'like', "%$request->filter%")
                     ->orWhere('description', 'like', "%$request->filter%");
        }

        return view('pages.product-message', ['products' => $products]);

    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'imgUrl' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);

        if($validator->fails()) {
            $products = Product::orderBy('created_at', 'desc');
            return view('pages.product-error', ['errors'=>$validator->errors(), 'products'=>$products]);
        }
        
        Product::create($request->all());

        $products = Product::orderBy('created_at', 'desc');
        
        return view('pages.product-message', ['products'=>$products]);
    }

    public function edit($id)
    {
        $product = Product::find($id);
    
        return view('pages.edit', compact('product'));
    }
    
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
    
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }
    
        $product->update($request->all());
    
        $products = Product::orderBy('created_at', 'desc')->get();
    
        return view('pages.products', compact('products'));
    }
    

    public function destroy($id)
{
    $product = Product::find($id);
    $product->delete();

    return view('pages.products');
}

    
    
}