@extends('frontEnd.master')
@section('page-title', 'Checkout')
@section('content')
<!-- banner -->
<div class="page-head">
	<div class="container">
		<h3>Payment</h3>
	</div>
</div>
<div class="container">
	<div class="row" style="margin: 30px;">
		<div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-4">
			<h1>Checkout</h1>
			<h4>Your total : {{ $total }}</h4>
			<div id="charge-error" class="alert alert-danger {{ !Session::has('error') ? 'hidden' : '' }} ">
				{{ Session::get('error') }}
			</div>
			<form action="{{ route('product.checkout') }}" method="POST" id="checkout-form">
				<div class="row">
					<div class="col-xs-12">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" id="name" class="form-control" name="name" required>
						</div>
					</div>
					<div class="col-xs-12">
						<div class="form-group">
							<label for="address">Address</label>
							<input type="text" id="address" class="form-control" name="address" required>
						</div>
					</div>
					<div class="col-xs-12">
						<div class="form-group">
							<label for="card-name">Card Holder <Name></Name></label>
							<input type="text" id="card-name" class="form-control" required>
						</div>
					</div>
					<div class="col-xs-12">
						<div class="form-group">
							<label for="card-number">Credit Card Number</label>
							<input type="text" id="card-number" class="form-control" required>
						</div>
					</div>
					<div class="col-xs-12">
						<div class="row">
							<div class="col-xs-6">
								<div class="form-group">
									<label for="card-expiry-month">Expiration Month</label>
									<input type="text" id="card-expiry-month" class="form-control" required>
								</div>
							</div>
							<div class="col-xs-6">
								<div class="form-group">
									<label for="card-expiry-year">Expiration Year</label>
									<input type="text" id="card-expiry-year" class="form-control" required>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-12">
						<div class="form-group">
							<label for="card-cvc">CVC</label>
							<input type="text" id="card-cvc" class="form-control" required>
						</div>
					</div>
				</div>
				{{ csrf_field() }}
				<button class="btn btn-success" type="submit">BUY NOW</button>
			</form>
		</div>
	</div>
</div>
@endsection

{{--  @section('script')
	<script src="https://js.stripe.com/v3/"></script>
	<script src="{{ URL::to('frontEnd/js/checkout.js') }}"></script>
@endsection  --}}