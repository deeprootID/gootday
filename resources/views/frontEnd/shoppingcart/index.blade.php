@extends('frontEnd.master')
@section('page-title', 'Shopping Cart')
@section('content')
<!-- banner -->
<div class="page-head">
	<div class="container">
		<h3>Check Out</h3>
	</div>
</div>
<!-- //banner -->
@if(Session::has('cart'))
<!-- check out -->
<div class="checkout">
	<div class="container">
		<h3>My Shopping Bag</h3>
		<div class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".5s">
			<table class="timetable_sub">
				<thead>
					<tr>
						<th>Remove</th>
						<th>Product</th>
						<th>Quantity</th>
						<th>Product Name</th>
						<th>Price</th>
					</tr>
                </thead>
                @foreach($products as $product)
                    <tr class="rem1">
                        <td class="invert-closeb">
                            <a href="{{ route('shoppingCart.product.removeAll', ['id' => $product['item']['id']]) }}" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                        </td>
                        <td class="invert-image"><a href="{{ route('product.detail', ['id' => $product['item']['id']]) }}"><img src="image/{{ $product['item']['gambar'] }}" alt=" " class="img-responsive" /></a></td>
                        <td class="invert">
                            <div class="quantity"> 
                                <div class="quantity-select">                           
                                    {{--  <div class="entry value-minus" style="position: relative;"><a href="{{ route('shoppingCart.product.remove', ['id' => $product['item']['id']]) }}"><span></span></a></div>  --}}
                                    <a href="{{ route('shoppingCart.product.remove', ['id' => $product['item']['id']]) }}" class="btn btn-warning"><span class="glyphicon glyphicon-minus"></span></a>
                                    <div class="entry value"><span>{{ $product['qty'] }}</span></div>
                                    <a href="{{ route('shoppingCart.product.add', ['id' => $product['item']['id']]) }}" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span></a>
                                </div>
                            </div>
                        </td>
                        <td class="invert">{{ $product['item']['nama'] }}</td>
                        <td class="invert">{{ $product['price'] }}</td>
                    </tr>
                @endforeach
                {{--  <!--quantity-->
                <script>
                $('.value-plus').on('click', function(){
                    var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
                    divUpd.text(newVal);
                });

                $('.value-minus').on('click', function(){
                    var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
                    if(newVal>=1) divUpd.text(newVal);
                });
                </script>
                <!--quantity-->  --}}
			</table>
		</div>
		<div class="checkout-left">	
            <div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
                <a href="{{ route('frontEnd.product') }}"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back To Shopping</a>
                <a href="{{ route('frontEnd.checkout') }}">Continue to Checkout<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
            </div>
            <div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">
                <h4>Shopping basket</h4>
                <ul>
                    @foreach($products as $product)
                        <li>{{ $product['item']['nama'] }} <i>-</i> <span>{{ $product['price'] * $product['qty'] }}</span></li>
                    @endforeach
                    <li>Total <i>-</i> <span>{{ $totalPrice }}</span></li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
	</div>
</div>	
<!-- //check out -->
@else
<div class="checkout">
    <div class="container">
        <h3>Cart is empty !</h3>
    </div>
</div>
@endif
@endsection