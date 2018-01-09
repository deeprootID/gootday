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
							</select>
						</div>
					</div>
					<div class="col-xs-12">
						<div class="form-group">
							<label for="kota">Pilih kota :</label>
							<select class="form-control" id="kota">
							</select>
						</div>
					</div>
					<div class="col-xs-12">
							<div class="form-group">
								<label for="kurir">Pilih kurir :</label>
								<select name="kurir" class="form-control" id="kurir">
									<option selected disabled>Pilih kurir</option>
									<option value="jne">JNE</option>
									<option value="pos">POS</option>
									<option value="tiki">TIKI</option>
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
										<label for="shipping-cost">Shipping Cost</label>
										<div class="input-group">
											<span class="input-group-addon">Rp</span>
											<input type="text" id="shipping-cost" class="form-control" readonly>
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

@section('script')
	{{--  <script src="https://js.stripe.com/v3/"></script>
	<script src="{{ URL::to('frontEnd/js/checkout.js') }}"></script>  --}}
	<script>
		$('document').ready(function(){
			$.ajax({
				type: 'GET',
				url: '{{ route("frontEnd.checkout.provinces") }}',
				dataType: 'json',
				success: function(data){
					$.each(data.rajaongkir.results, function(i, value){
						$('#provinsi').append('<option value="'+value.province_id+'">'+value.province+'</option>');
					});
					var prov_id = $('#provinsi').val();
					$('#kota').html('');
					$.ajax({
						type: 'GET',
						url: '{{ route("frontEnd.checkout.city", ["id" => ""]) }}/'+prov_id,
						dataType: 'json',
						success: function(data_city){
							console.log(data_city);
							$.each(data_city.rajaongkir.results, function(i, value){
								$('#kota').append('<option value="'+value.city_id+'">'+value.type+' '+value.city_name+'</option>');
							})
						}
					});
				}
			});
			$('#provinsi').change(function(event){
				var prov_id = $(this).val();
				$('#kota').html('');
				$.ajax({
					type: 'GET',
					url: '{{ route("frontEnd.checkout.city", ["id" => ""]) }}/'+prov_id,
					dataType: 'json',
					success: function(data){
						$.each(data.rajaongkir.results, function(i, value){
							$('#kota').append('<option value="'+value.city_id+'">'+value.type+' '+value.city_name+'</option>');
						})
					}
				});
			});
			$('#kurir').change(function(event){
				var city_id = $('#kota').val();
				var kurir = $('#kurir').val();
				{{--  $('#kota').html('');  --}}
				$.ajax({
					type: 'GET',
					url: '{{ route("frontEnd.checkout.cost", ["kota" => "", "kurir" => ""]) }}/'+city_id+'/'+kurir,
					dataType: 'json',
					success: function(data){
						$('#shipping-cost').val(data.rajaongkir.results[0].costs[0].cost[0].value);
					}
				});
			});
		});
	</script>
@endsection