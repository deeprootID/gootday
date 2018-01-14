@extends('frontEnd.master')
@section('page-title', 'Product based on Category')
@section('content')

@if(Session::has('message'))
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-12">
				<div id="charge-message" class="alert alert-success" style="margin-top: 20px; margin-bottom: 20px;">
					<center>
						{{ Session::get('message') }}
					</center>
				</div>
			</div>
		</div>
	</div>
@endif


<div class="product-easy">
	<div class="container">
        @if(count($products) > 0)
            <h3>We found {{ count($products) }} products in "{{ $kategori }}" category</h3>
            @foreach($products as $product)
            <div class="col-md-3 product-men yes-marg">
                <div class="men-pro-item simpleCart_shelfItem">
                    <div class="men-thumb-item">
                        <img src="/image/{{ $product->gambar }}" alt="" class="pro-image-front">
                        <img src="/image/{{ $product->gambar }}" alt="" class="pro-image-back">
                        <div class="men-cart-pro">
                            <div class="inner-men-cart-pro">
                                <a href="{{ route('product.detail', ['id' => $product->id]) }}" class="link-product-add-cart">Quick View</a>
                            </div>
                        </div>
                        <span class="product-new-top">{{ $product->kategori }}</span>
                        
                    </div>
                    <div class="item-info-product ">
                        <h4><a href="single.html">{{ $product->nama }}</a></h4>
                        <div class="info-product-price">
                            <span class="item_price">Rp {{ $product->harga_diskon }}</span>
                            <del>Rp {{ $product->harga }}</del>
                        </div>
                        <a href="{{ route('product.addToCart', ['id' => $product->id]) }}" class="item_add single-item hvr-outline-out button2">Add to cart</a>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <h3>No one product with category "{{ $kategori }}" found !</h3>
        @endif
        <div class="clearfix"></div>
	</div>
</div>
<!-- //product-nav -->
@endsection
