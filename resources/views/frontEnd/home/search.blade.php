@extends('frontEnd.master')
@section('content')
<!-- banner -->

<div class="product-easy">
	<div class="container">
        @foreach($products as $product)
            <div class="col-md-3 product-men">
                <div class="men-pro-item simpleCart_shelfItem">
                    <div class="men-thumb-item">
                        <img src="/image/{{ $product->gambar }}" alt="" class="pro-image-front">
                        <img src="/image/{{ $product->gambar }}" alt="" class="pro-image-back">
                        <div class="men-cart-pro">
                            <div class="inner-men-cart-pro">
                                <a href="single.html" class="link-product-add-cart">Quick View</a>
                            </div>
                        </div>
                        <span class="product-new-top">Diskon</span>
                        
                    </div>
                    <div class="item-info-product ">
                        <h4><a href="single.html">{{ $product->nama }}</a></h4>
                        <div class="info-product-price">
                            <span class="item_price">{{ $product->harga_diskon }}</span>
                            <del>{{ $product->harga }}</del>
                        </div>
                        <a href="{{ route('product.addToCart', ['id' => $product->id]) }}" class="item_add single-item hvr-outline-out button2">Add to cart</a>
                    </div>
                </div>
            </div>
            @endforeach
        <div class="clearfix"></div>
	</div>
</div>
<!-- //product-nav -->
@endsection
