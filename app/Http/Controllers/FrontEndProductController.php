<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\Category;
use Stripe\Stripe;
use Stripe\Charge;
use App\Order;
use Auth;
use Session;

class FrontEndProductController extends Controller
{
    public function getMaster(){
        $products = Product::all();
        $categoriesShort = Category::whereRaw('char_length(category_name) < 12')->get();
        $categoriesLong = Category::whereRaw('char_length(category_name) > 12')->get();
        return view('frontEnd.products.index')->with('products', $products)->with('categoriesShort', $categoriesShort)->with('categoriesLong', $categoriesLong);
    }

    public function index(){
        $products = Product::all();
        return view('frontEnd.home.index')->with('products', $products);
    }    

    public function getAddtoCart(Request $request, $id) {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        $request->session()->flash('message', 'Product has been added to the cart !');
        return redirect()->back();//->with('message', 'Product has been added to the cart !');
    }

    public function getAdd($id) {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);

        Session::put('cart', $cart);
        return redirect()->route('frontEnd.shoppingCart');
    }

    public function getRemove($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->remove($id);

        if(count($cart->items) > 0){
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        
        return redirect()->route('frontEnd.shoppingCart');
    }

    public function getProvinces()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key: a0efbd5b835e1794a04a1ace4cade474"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        return "cURL Error #:" . $err;
        } else {
        return $response;
        }
    }

    public function getCity($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=".$id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key: a0efbd5b835e1794a04a1ace4cade474"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        return "cURL Error #:" . $err;
        } else {
        return $response;
        }
    }

    public function getCost($kota, $kurir)
    {
        $bobot = 5000;
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "origin=444&destination=".$kota."&weight=".$bobot."&courier=".$kurir,
        CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: a0efbd5b835e1794a04a1ace4cade474"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        return "cURL Error #:" . $err;
        } else {
        return $response;
        }
    }

    public function getRemoveAll($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeAll($id);

        if(count($cart->items) > 0){
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        
        return redirect()->route('frontEnd.shoppingCart');
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

    public function postCheckout(Request $request){
        if (!Session::has('cart')) {
            return redirect()->route('frontEnd.shoppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        // Save the order to the database
        $order = new Order();
        $order->cart = serialize($cart);
        $order->address = $request->input('address');
        $order->name = $request->input('name');
        $order->payment_id = md5(uniqid(rand(), true));

        Auth::user()->orders()->save($order);

        Session::forget('cart');
        return redirect()->route('frontEnd.product')->with('success', 'Complete the payment, wait for us to confirm your payment! It only needs couple of hours. Thank you ! ');
    }

    public function getSearch(Request $request){
        $search = $request->input('search');
        $kategori = $request->input('kategori');
        $products = Product::where('nama', 'like', '%'.$search.'%')
            ->orWhere('kategori', $kategori)
            ->get();
        return view('frontEnd.home.search')->with('products', $products)->with('search', $search);
        // dd($search, $kategori);
    }

    public function getProductDetail($id){
        $product = Product::find($id);
        return view('frontEnd.products.detail')->with('product', $product);
    }

    public function getByCategory($kategori){
        $products = Product::where('kategori', $kategori)->get();
        return view('frontEnd.home.category')->with('products', $products)->with('kategori', $kategori);
    }
}
