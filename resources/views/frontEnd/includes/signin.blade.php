<!-- login -->
<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content modal-info">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body modal-spa">
				<div class="login-grids">
					<div class="login">
						<div class="login-bottom">
							@if(count($errors) > 0)
								<div class="alert alert-danger">
									@foreach($errors->all() as $error)
										<p>{{ $error }}</p>
									@endforeach
								</div>
							@endif
							<h3>Sign up for free</h3>
							<form action="{{ route('user.signup') }}" method="POST">
								<div class="sign-up">
									<h4>Name :</h4>
									<input name="name" type="text" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" placeholder="Name" required>
								</div>
								<div class="sign-up">
									<h4>Email :</h4>
									<input name="email" type="text" placeholder="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}"  required>
								</div> 
								<div class="sign-up">
									<h4>Password :</h4>
									<input name="password" type="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" placeholder="Password" required>

								</div>
								<div class="sign-up">
									<input type="submit" value="REGISTER NOW" >
								</div>
							{{ csrf_field() }}
							</form>
						</div>
						<div class="login-right">
							<h3>Sign in with your account</h3>
							<form action="{{ route('user.signin') }}" method="POST">
								<div class="sign-in">
									<h4>Email :</h4>
									<input name="email" type="text" value="Type here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" required="">
								</div>
								<div class="sign-in">
									<h4>Password :</h4>
									<input name="password" type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
									<a href="#">Forgot password?</a>
								</div>
								<div class="single-bottom">
									<input type="checkbox"  id="brand" value="">
									<label for="brand"><span></span>Remember Me.</label>
								</div>
								<div class="sign-in">
									<input type="submit" value="SIGNIN" >
								</div>
							{{ csrf_field() }}
							</form>
						</div>
						<div class="clearfix"></div>
					</div>
					<p>By logging in you agree to our <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a></p>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- //login -->
