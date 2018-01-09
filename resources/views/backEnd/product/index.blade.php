@extends('backEnd.master')
@section('page-title', 'Products')
@section('page-heading', 'Manage Products')
@section('content')
<section class="content">
    <div class="col-xs-12">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Weight</th>
                    <th>Stock</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Discount Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->nama}}</td>
                    <td>{{$product->kategori}}</td>
                    <td>{{$product->berat}}</td>
                    <td>{{$product->stok}}</td>
                    <td>{{$product->deskripsi}}</td>
                    <td>{{$product->gambar}}</td>
                    <td>{{$product->harga}}</td>
                    <td>{{$product->harga_diskon}}</td>
                    <td>
                        <a href="{{route('product.edit', $product->id)}}" class="btn btn-primary">Edit</a>
                        <a href="{{route('product.delete', $product->id)}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection