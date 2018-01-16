<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('backEnd.product.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('backEnd.product.createProduct')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->nama = $request->product_name;
        $product->stok = $request->product_stock;
        $product->kategori = $request->product_category;
        $product->berat = $request->product_weight;
        $product->sale_status = $request->product_sale_status;
        $product->deskripsi = $request->product_description;

        $file = $request->file('product_image');
        $fileName = time().'.'.$file->getClientOriginalExtension();
        $request->file('product_image')->move('image', $fileName);
        $product->gambar = $fileName;

        $product->harga = $request->product_price;
        $product->harga_diskon = $request->product_price_discount;
        // dd($file);
        $product->save();
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('backEnd.product.editProduct')->with('product', $product)->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->nama = $request->input('product_name');
        $product->stok = $request->input('product_stock');
        $product->kategori = $request->input('product_category');
        $product->berat = $request->input('product_weight');
        $product->sale_status = $request->input('product_sale_status');
        $product->deskripsi = $request->input('product_description');
        $product->gambar = $request->input('product_image');
        $product->harga = $request->input('product_price');
        $product->harga_diskon = $request->input('product_price_discount');
        $product->save();
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('product.index');
    }
}
