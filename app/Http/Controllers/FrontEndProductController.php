<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use Session;

class FrontEndProductController extends Controller
{
    public function getMaster(){
        $products = Product::all();
        return view('frontEnd.products.index')->with('products', $products);
    }

    public function getAddtoCart(Request $request, $id) {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        return redirect()->route('frontEnd.product');
    }

    public function getCart() {
        if(!Session::has('cart')) {
            return view('frontEnd.shoppingcart.index');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('frontEnd.shoppingcart.index', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getCheckout() {
        if(!Session::has('cart')) {
            return view('frontEnd.shoppingcart.index');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('frontEnd.checkout.index', ['total' => $total]);
    }
}
