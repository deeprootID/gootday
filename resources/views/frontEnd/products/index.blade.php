@extends('frontEnd.master')
@section('page-title', 'Shop')
@section('content')

@if(Session::has('success'))
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-12">
				<div id="charge-message" class="alert alert-success" style="margin-top: 20px; margin-bottom: -20px;">
					<center>
						{{ Session::get('success') }}
					</center>
				</div>
			</div>
		</div>
	</div>
@endif

@if(Session::has('message'))
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-12">
				<div id="charge-message" class="alert alert-success dismissable" style="margin-top: 20px; margin-bottom: -20px;">
					<button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>
					<center>
						{{ Session::get('message') }}
					</center>
				</div>
			</div>
		</div>
	</div>
@endif

<!-- mens -->
<div class="men-wear">
	<div class="container">
		<div class="col-md-4 products-left">
			<div class="css-treeview">
				<h4>Categories</h4>
				<ul class="tree-list-pad">
					<li><input type="checkbox" checked="checked" id="item-0" /><label for="item-0"><span></span>Men's Wear</label>
						<ul>
							@foreach($categoriesShort as $categoryShort)
								<li><a href="{{ route('product.getByCategory', ['kategori' => $categoryShort->category_name]) }}">{{ $categoryShort->category_name }}</a></li>
							@endforeach
						</ul>
					</li>
					<li><input type="checkbox" checked="checked" id="item-2" /><label for="item-2">Best Offers</label>
						<ul>
							@foreach($categoriesLong as $categoryLong)
								<li><a href="{{ route('product.getByCategory', ['kategori' => $categoryLong->category_name]) }}">{{ $categoryLong->category_name }}</a></li>
							@endforeach
						</ul>
					</li>
				</ul>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="col-md-8 products-right">
			<div class="men-wear-top">
				<script src="{{asset('frontEnd/js/responsiveslides.min.js')}}"></script>
				<script>
						// You can also use "$(window).load(function() {"
						$(function () {
						 // Slideshow 4
						$("#slider3").responsiveSlides({
							auto: true,
							pager: true,
							nav: false,
							speed: 500,
							namespace: "callbacks",
							before: function () {
						$('.events').append("<li>before event fired.</li>");
						},
						after: function () {
							$('.events').append("<li>after event fired.</li>");
							}
							});
						});
				</script>
				<div  id="top" class="callbacks_container">
					<ul class="rslides" id="slider3">
						<li>
							<img class="img-responsive" src="{{asset('frontEnd/images/gambar.jpg')}}" alt=" "/>
						</li>
						<li>
							<img class="img-responsive" src="{{asset('frontEnd/images/gambar.jpg')}}" alt=" "/>
						</li>
						<li>
							<img class="img-responsive" src="{{asset('frontEnd/images/gambar.jpg')}}" alt=" "/>
						</li>
						<li>
							<img class="img-responsive" src="{{asset('frontEnd/images/gambar.jpg')}}" alt=" "/>
						</li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>

		<div class="single-pro">
			<div class="row">
				<div class="men-wear-bottom" style="padding: 15px;">
					<div class="col-sm-4 men-wear-left">
						<img class="img-responsive" src="{{asset('frontEnd/images/choose.jpg')}}" alt=" " />
					</div>
					<div class="col-sm-8 men-wear-right">
						<h4>When and where does Freshop deliver?</h4>
						<p>We harvest and deliver the produce from our partner farmers four times a week, every Monday, Wednesday, Friday, and Saturday. We currently deliver our produce to Surabaya and Sidoarjo areas.
							For inquiries related to deliveries to other areas, please contact our team through LINE at @freshop (with @)</p>
						<p>Simply head to our website at www.freshop.com and click `Start Shopping` to view the selection of our fresh produce. Simply click-to-harvest on the produce you want and adjust the quantity. When you’re done with your selection, click `Checkout` and select the delivery date that suits you. After that, fill-in your contact and delivery address details, and submit your order.</p>
					</div>
					<div class="clearfix"></div>
				</div>
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
							<h4><a href="single.html">{{$product->nama}}</a></h4>
							<div class="info-product-price">
								<span class="item_price">Rp {{$product->harga_diskon}}</span>
								<del>Rp {{$product->harga}}</del>
							</div>
							<a href="{{ route('product.addToCart', ['id' => $product->id]) }}" class="item_add single-item hvr-outline-out button2">Add to cart</a>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>

		{{--  Pagination  --}}
		{{ $products->links() }}
	</div>
</div>
<!-- //mens -->

@endsection
