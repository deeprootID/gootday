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
							<textarea name="address" id="address" cols="30" rows="5" class="form-control"></textarea>
						</div>
					</div>
					<div class="col-xs-12">
							<div class="row">
								<div class="col-xs-6">
									<div class="form-group">
										<label for="card-expiry-month">Postal Code</label>
										<input type="text" id="card-expiry-month" class="form-control" required>
									</div>
								</div>
								<div class="col-xs-6">
									<div class="form-group">
										<label for="card-expiry-year">Phone Number</label>
										<input type="text" id="card-expiry-year" class="form-control" required>
									</div>
								</div>
							</div>
						</div>
					<div class="col-xs-12">
						<div class="form-group">
							<label for="provinsi">Pilih provinsi :</label>
							<select class="form-control" id="provinsi">
								<option>Jawa Timur</option>
								<option>Jawa Barat</option>
								<option>Jawa Tengah</option>
								<option>DKI Jakarta</option>
							</select>
						</div>
					</div>
					<div class="col-xs-12">
						<div class="form-group">
							<label for="kota">Pilih kota :</label>
							<select class="form-control" id="kota">
								<option>Surabaya</option>
								<option>Malang</option>
								<option>Kediri</option>
								<option>Tulungagung</option>
							</select>
						</div>
					</div>
					<div class="col-xs-12">
							<div class="row">
								<div class="col-xs-6">
									<div class="form-group">
										<label for="card-expiry-month">Your Total</label>
										<div class="input-group">
											<span class="input-group-addon">Rp</span>
											<input value="{{ $total }}" type="text" id="card-expiry-month" class="form-control" readonly>
										</div>
									</div>
								</div>
								<div class="col-xs-6">
									<div class="form-group">
										<label for="card-expiry-year">Shipping Cost</label>
										<div class="input-group">
											<span class="input-group-addon">Rp</span>
											<input type="text" id="card-expiry-year" class="form-control" readonly>
										</div>
									</div>
								</div>
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