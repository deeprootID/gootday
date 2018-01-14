@extends('frontEnd.master')
@section('page-title', 'Profile')
@section('content')
<!-- banner -->
<div class="page-head">
	<div class="container">
		<h3>User Profile</h3>
	</div>
</div>
<!-- //banner -->

<div class="row">
	<div class="col-md-8 col-md-offset-2" style="margin-top: 30px;">
		<h1>Hi, {{ Auth::user()->name }}</h1>
		<hr>
		<h2>My Orders</h2>
		@foreach($orders as $order)
			<div class="panel panel-default" style="margin-top: 10px;">
				<div class="panel-body">
					<ul class="list-group">
						@foreach($order->cart->items as $item)
							<li class="list-group-item">
								<span class="badge">Rp {{ $item['price'] }}</span>
								{{ $item['item']['nama'] }} | {{ $item['qty'] }} Units
							</li>
						@endforeach
					</ul>
				</div>
				<div class="panel-footer">
					<strong>Total price : Rp {{ $order->cart->totalPrice }}</strong>
				</div>
			</div>
		@endforeach
	</div>
</div>

@endsection
