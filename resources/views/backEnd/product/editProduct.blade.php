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
            <select class="form-control" name="product_category" id="product_category">
                <option>Pilih Kategori Barang</option>
                @foreach($categories as $category)
                <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Berat</label>
            <div class="input-group">
                    <input value="{{$product->berat}}" class="form-control" type="text" name="product_weight" placeholder="Masukkan Berat Barang">
                    <span class="input-group-addon" id="basic-addon2">grams</span>
            </div>
        </div>
        <div class="form-group">
            <label>Sale Status</label>
            <select class="form-control" name="product_sale_status" id="product_sale_status">
                <option>Pilih Satus Penjualan</option>
                <option value="Promo">Promo</option>
                <option value="Terbaru">Terbaru</option>
                <option value="Terlaris">Terlaris</option>
            </select>
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

@section('script')
<script>
    var optionValue  = {{ $product->kategori }};
    $("#product_category").val(optionValue).find("option[value=" + optionValue +"]").attr('selected', true);

    var optionValuePStatus  = {{ $product->sale_status }};
    $("#product_sale_status").val(optionValuePStatus).find("option[value=" + optionValuePStatus +"]").attr('selected', true);
</script>
@endsection