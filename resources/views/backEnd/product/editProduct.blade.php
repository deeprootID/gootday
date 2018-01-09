@extends('backEnd.master')
@section('page-title', 'product')
@section('page-heading', 'Edit Product')
@section('content')

<section class="content">
    <div class="col-xs-12">
        <form action="{{route('product.update', $product->id)}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label>Product Name</label>
            <input name="product_name" class="form-control" type="text" placeholder="Masukkan Nama Barang" value="{{$product->nama}}">
        </div>
        <div class="form-group">
            <label>Jumlah Stok</label>
            <input value="{{$product->stok}}" class="form-control" type="number" name="product_stock" placeholder"Masukkan Jumlah Stok">
        </div>
        <div class="form-group">
            <label>Kategori</label>
            <input value="{{$product->kategori}}" class="form-control" type="text" name="product_category" placeholder="Masukkan Kategori">
        </div>
        <div class="form-group">
            <label>Berat</label>
            <div class="input-group">
                    <input value="{{$product->berat}}" class="form-control" type="text" name="product_weight" placeholder="Masukkan Berat Barang">
                    <span class="input-group-addon" id="basic-addon2">grams</span>
            </div>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea class="form-control" name="product_description" cols="30" rows="10" placeholder="Masukkan Deskripsi Produk">{{$product->deskripsi}}</textarea>
        </div>
        <div class="form-group">
            <label>Gambar Barang</label>
            <input  value="{{$product->gambar}}" class="form-control" type="text" name="product_image">
        </div>
        <div class="form-group">
            <label>Harga Barang</label>
            <div class="input-group">
                <span class="input-group-addon">Rp </span>
                <input  value="{{$product->harga}}" class="form-control" type="number" name="product_price">
                <span class="input-group-addon">.00</span>
            </div>
        </div>
        <div class="form-group">
            <label>Harga Diskon Barang</label>
            <div class="input-group">
                <span class="input-group-addon">Rp </span>
                <input value="{{$product->harga_diskon}}" class="form-control" type="number" name="product_price_discount">
                <span class="input-group-addon">.00</span>
            </div>
        </div>
        <div class="form-group">
            <input type="submit" value="UPDATE PRODUCT" class="btn btn-primary btn-block">
        </div>
        </form>
    </div>
</section>

@endsection