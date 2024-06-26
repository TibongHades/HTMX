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

        $html = "";

        foreach ($products->get() as $prod) {
            $html .= "
            <div class='p-4 rounded bg-blue-200 w-full flex flex-col items-start'>
            <div class='flex items-center w-full'>
                <img src='$prod->imgUrl' style='width: 100px; height: auto;' class='mr-4'>
                <div class='flex-1'>
                    <h3 class='text-2xl'>$prod->name</h3>
                    <div class='italic text-gray-500'>$prod->description</div>
                </div>
            </div>
            <div class='text-4xl text-yellow-600 self-end mt-4'>$prod->price</div>
        </div>
            ";
        }

        return $html;
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
    
}
