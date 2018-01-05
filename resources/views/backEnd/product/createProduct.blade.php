@extends('backEnd.master')
@section('page-title', 'Product')
@section('page-heading', 'Manage Product')
@section('content')

<section class="content">
  <div class="col-xs-12">
    <form action="{{route('product.store')}}" method="post">
      {{csrf_field()}}
      <div class="form-group">
        <label>Product Name</label>
        <input name="product_name" class="form-control" type="text" placeholder="Masukkan Nama Barang">
      </div>
      <div class="form-group">
          <label>Jumlah Stok</label>
          <input class="form-control" type="number" name="product_stock" placeholder"Masukkan Jumlah Stok">
      </div>
      <div class="form-group">
          <label>Deskripsi</label>
          <textarea class="form-control" name="product_description" cols="30" rows="10" placeholder="Masukkan Deskripsi Produk"></textarea>
      </div>
      <div class="form-group">
          <label>Gambar Barang</label>
          <input class="form-control" type="text" name="product_image">
      </div>
      <div class="form-group">
          <label>Harga Barang</label>
          <input class="form-control" type="number" name="product_price">
      </div>
      <div class="form-group">
          <label>Harga Diskon Barang</label>
          <input class="form-control" type="number" name="product_price_discount">
      </div>
      <div class="form-group">
        <input type="submit" value="SUBMIT" class="btn btn-primary btn-block">
      </div>
    </form>
  </div>
</section>

@endsection
