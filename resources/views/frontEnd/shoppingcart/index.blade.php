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
                            <div class="rem">
                                <div class="close1"> </div>
                            </div>
                            <script>$(document).ready(function(c) {
                                $('.close1').on('click', function(c){
                                    $('.rem1').fadeOut('slow', function(c){
                                        $('.rem1').remove();
                                    });
                                    });	  
                                });
                            </script>
                        </td>
                        <td class="invert-image"><a href="single.html"><img src="images/w4.png" alt=" " class="img-responsive" /></a></td>
                        <td class="invert">
                                <div class="quantity"> 
                                <div class="quantity-select">                           
                                    <div class="entry value-minus">&nbsp;</div>
                                    <div class="entry value"><span>{{ $product['qty'] }}</span></div>
                                    <div class="entry value-plus active">&nbsp;</div>
                                </div>
                            </div>
                        </td>
                        <td class="invert">{{ $product['item']['nama'] }}</td>
                        <td class="invert">{{ $product['price'] }}</td>
                    </tr>
                @endforeach
                <!--quantity-->
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
                <!--quantity-->
			</table>
		</div>
		<div class="checkout-left">	
            <div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
                <a href="{{ route('frontEnd.product') }}"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back To Shopping</a>
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