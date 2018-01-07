<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class FrontEndProductController extends Controller
{
    public function getMaster(){
        $products = Product::all();
        return view('frontEnd.products.index')->with('products', $products);
    }

    public function getAddtoCart(Request $request, $id) {
        $product = Product::find($id);
    }
}
