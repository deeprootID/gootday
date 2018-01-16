<!-- header -->
<div class="header">
	<div class="container">
		<ul>
			<li><span class="glyphicon glyphicon-time" aria-hidden="true"></span>Straight from the Farm</li>
			<li><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Improving Farmers’ Livelihood</li>
			<li><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><a href="mailto:info@dateebdev.com">info@dateebdev.com</a></li>
		</ul>
	</div>
</div>
<!-- //header -->
<!-- header-bot -->
<div class="header-bot">
	<div class="container">
		<div class="col-md-3 header-left">
			<h1><a href="{{route('frontEnd.home')}}"><img src="{{asset('frontEnd/images/freshop.png')}}"></a></h1>
		</div>
		<div class="col-md-6 header-middle">
			<form action="{{ route('product.search') }}" method="POST">
				<div class="search">
					<input name="search" type="search" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}" required="">
				</div>
				<div class="section_room">
					<select id="kategori" name="kategori" onchange="change_country(this.value)" class="frm-field required">
						<option>All categories</option>
						<option value="Buah">Buah</option>
						<option value="Sayur Mayur">Sayur Mayur</option>
						<option value="Rempah">Rempah</option>
						<option value="Lauk Pauk">Lauk Pauk</option>
						<option value="Beras">Beras</option>
						<option value="Siap Konsumsi">Siap Konsumsi</option>
					</select>
				</div>
				<div class="sear-sub">
					<input type="submit" value="">
				</div>
				<div class="clearfix"></div>
				{{ csrf_field() }}
			</form>
		</div>
		<div class="col-md-3 header-right footer-bottom">
			<ul>
				@if(Auth::check())
					<li><a href="{{ route('user.profile') }}" class="use2"><span>Profile</span></a></li>
				@else
					<li><a href="#" class="use1" data-toggle="modal" data-target="#myModal4"><span>Login</span></a></li>
				@endif
				<li><a class="fb" href="#"></a></li>
				<li><a class="twi" href="#"></a></li>
				<li><a class="insta" href="#"></a></li>
				@if(!Auth::check())
					<li><a class="you" href="#"></a></li>
				@endif
				@if(Auth::check())
					<li><a href="{{ route('user.logout') }}" class="use2"><span>Logout</span></a></li>
				@endif
			</ul>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //header-bot -->
<!-- banner -->
<div class="ban-top">
	<div class="container">
		<div class="top_nav_left">
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav menu__list">
					<!-- <li class="active menu__item menu__item--current"><a class="menu__link" href="{{route('frontEnd.home')}}">Home <span class="sr-only">(current)</span></a></li> -->
					<li class="dropdown menu__item">
						<a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">shop <span class="caret"></span></a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="row">
									<div class="col-sm-6 multi-gd-img1 multi-gd-text ">
										<a href="{{ route('frontEnd.product') }}"><img src="{{asset('frontEnd/images/151554936022287050.jpeg')}}" alt=" "/></a>
									</div>
									<div class="col-sm-3 multi-gd-img">
										<ul class="multi-column-dropdown">
											<li><a href="{{ route('product.getByCategory', ['kategori' => 'Buah']) }}">Buah</a></li>
											<li><a href="{{ route('product.getByCategory', ['kategori' => 'Rempah']) }}">Rempah</a></li>
											<li><a href="{{ route('product.getByCategory', ['kategori' => 'Lauk Pauk']) }}">Lauk Pauk</a></li>
											<li><a href="{{ route('product.getByCategory', ['kategori' => 'Beras']) }}">Beras</a></li>
											<li><a href="{{ route('product.getByCategory', ['kategori' => 'Sayur Mayur']) }}">Sayur Mayur</a></li>
											<li><a href="{{ route('product.getByCategory', ['kategori' => 'Promo Spesial']) }}">Promo Spesial</a></li>
											<li><a href="{{ route('product.getByCategory', ['kategori' => 'Pilihan Terbaru']) }}">Pilihan Terbaru</a></li>
										</ul>
									</div>
									<div class="clearfix"></div>
								</div>
							</ul>
					</li>
					<li class=" menu__item"><a class="menu__link" href="electronics.html">News And Promo</a></li>
					<li class=" menu__item"><a class="menu__link" href="codes.html">How It Works</a></li>
					<li class=" menu__item"><a class="menu__link" href="codes.html">FAQ</a></li>
					<li class=" menu__item"><a class="menu__link" href="codes.html">How To Pay</a></li>
					<li class=" menu__item"><a class="menu__link" href="{{route('frontEnd.contact')}}">contact</a></li>
				  </ul>
				</div>
			  </div>
			</nav>
		</div>
		<div class="top_nav_right">
			<div class="cart box_1">
				<a href="{{ route('frontEnd.shoppingCart') }}">
					<h3> <div class="total">
						<i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i>
						Rp <span>{{ Session::has('cart') ? Session::get('cart')->totalPrice : '0' }}</span> (<span>{{ Session::has('cart') ? Session::get('cart')->totalQty : '0' }}</span> items)</div>

					</h3>
				</a>
				<p><a href="{{ route('frontEnd.shoppingCart') }}" class="simpleCart_empty">My Cart</a></p>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //banner-top -->
