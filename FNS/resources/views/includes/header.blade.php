<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>@yield('title','Fashion & Solutions !')</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="{{ url('home_asset/css/bootstrap.min.css') }}" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="{{ url('home_asset/css/slick.css') }}" />
	<link type="text/css" rel="stylesheet" href="{{ url('home_asset/css/slick-theme.css') }}" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="{{ url('home_asset/css/nouislider.min.css') }}" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="{{ url('home_asset/css/font-awesome.min.css') }}">
	<link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet">
	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{ url('home_asset/css/style.css') }}" />

 <style type="text/css"></style>
</head>

<body>
	<!-- HEADER -->
	<header>
		

		<!-- header -->
		<div id="header">
			<div class="container">
				<div class="pull-left">
					<!-- Logo -->
					<div class="header-logo">
						<a class="logo" href="{{ url('/') }}">
							<img src="{{ url('img/logo/logo_fav.png') }}" alt="" class="img-responsive" style="max-height: 70px;">
						</a>
					</div>
					<!-- /Logo -->

					<!-- Search -->
					<div class="header-search">
						<form>
							<input class="input search-input " type="text" placeholder="Enter your keyword">
							<!-- <select class="input ">
								<option value="0">All Categories</option>
								<option value="1">Category 01</option>
								<option value="1">Category 02</option>
							</select> -->
							<button class="search-btn"><i class="fa fa-search"></i></button>
						</form>
					</div>
					<!-- /Search -->
				</div>
				<div class="pull-right">
					<ul class="header-btns">
						<!-- Mobile nav toggle-->
						<li class="nav-toggle">
							<button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
						</li>
						<!-- / Mobile nav toggle -->
						<!-- Account -->
						<li class="header-account dropdown default-dropdown">
							<div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-user-o"></i>
								</div>
								<strong class="text-uppercase hidden-xs">My Account <i class="fa fa-caret-down"></i></strong>
							</div>
							@if(!Auth::check())
							<a class="text-uppercase hidden-xs" href="{{ url('login') }}">Login</a> <a href="" class="hidden-xs">/</a>

							 <a href="{{ url('register') }}" class="text-uppercase hidden-xs">Join</a>
							@endif
							<ul class="custom-menu" style="padding: 20px;">
								
								@if(Auth::check())
					 <li><a href="{{ route('user.profile') }}"><i class="fa fa-user-o"></i> My Account</a></li>
					 <li><a href="{{ url('logout') }}"><i class="fa fa-sign-out"></i>Logout</a></li>
								@else
                                <li><a   href="{{ url('login') }}"><i class="fa fa-unlock-alt"></i> Login</a></li>
								<li><a href="{{ url('register') }}"><i class="fa fa-user-plus"></i> Create An Account</a></li>
								@endif
							</ul>
						</li>
						<!-- /Account -->

						<!-- Cart -->
						<li class="header-cart dropdown default-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-shopping-cart"></i>
									<span class="qty">{{ Cart::count() }}</span>
								</div>
								<strong class="text-uppercase">My Cart:</strong>
								<br>
								<span>{{ Cart::subtotal() }}৳</span>
							</a>
							<div class="custom-menu">
								<div id="shopping-cart">
									<div class="shopping-cart-list">

										@foreach(Cart::content() as $cart)

										@php
                                         $image = getProductImage($cart->id);
										@endphp
										<div class="product product-widget">
											<div class="product-thumb">
												<img src="{{ asset('productImage/'.$image) }}" alt="" class="img-responsive" style="height: 70px;">
											</div>
											<div class="product-body">
												<h3 class="product-price">৳{{ $cart->price }}<span class="qty">X{{ $cart->qty }}</span></h3>
												<h2 class="product-name"><a href="#">{{ $cart->name }}</a></h2>
											</div>
											<a href="{{ route('cart.remove',$cart->rowId) }}" style="color: red" class="cancel-btn"><i class="fa fa-trash"></i></a>

										</div>
										
										@endforeach
									</div>
									@if(Cart::Count())
									<div class="shopping-cart-btns">
										<a class="main-btn" href="{{ route('cart.index') }}">View Cart</a>
										<a href="{{ route('cart.checkout') }}" class="primary-btn">Checkout <i class="fa fa-arrow-circle-right"></i></a>
									</div>
									@endif
								</div>
							</div>
						</li>
						<!-- /Cart -->

						
					</ul>
				</div>
			</div>
			<!-- header -->
		</div>
		<!-- container -->
	</header>
	<!-- /HEADER -->

	<!-- NAVIGATION -->
	<div id="navigation">
		<!-- container -->
		<div class="container">
			<div id="responsive-nav">
				

				<!-- menu nav -->
				<div class="menu-nav">
					<span class="menu-header">Menu <i class="fa fa-bars"></i></span>
					<ul class="menu-list">
						<li><a href="{{ url('/') }}">Home</a></li>
						@foreach($home_menu as $home_menu_value)
						<li class="dropdown mega-dropdown full-width"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" style="cursor: pointer">{{ $home_menu_value->menu_name }} <i class="fa fa-caret-down"></i></a>
							<div class="custom-menu">
								<div class="row">
									@php
										 $home_category = App\Category::orderBy('category_name','asc')->where('menu_id','=',$home_menu_value->id)->get();
									@endphp
									@foreach($home_category as $home_category_value)
									<div class="col-md-3">
										<div class="hidden-sm hidden-xs">
											
											<hr>
										</div>
										<ul class="list-links">
											<li>
												<h3 class="list-links-title"><a href="{{ route('category.product',['id'=>$home_category_value->id,'name'=>$home_category_value->category_name]) }}"> {{ $home_category_value->category_name }}</a></h3>
											</li>
											@php
													$home_sub_category = App\SubCategory::orderBy('id','desc')->where('category_id','=',$home_category_value->id)->get();
												@endphp
												@foreach($home_sub_category as $home_sub_category_value)
											<li>
												
												<a href="{{ route('subcategory.product',['id'=>$home_sub_category_value->id,'name'=>$home_sub_category_value->sub_category_name]) }}">{{ $home_sub_category_value->sub_category_name }}</a>
												
											</li>
											@endforeach
											
										</ul>
									</div>
									@endforeach
									
								</div>
							</div>
						</li>
						@endforeach
						<li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Pages <i class="fa fa-caret-down"></i></a>
							<ul class="custom-menu">
								<li><a href="{{ url('/') }}">Home</a></li>
								<li><a href="{{ route('view.cart') }}">Cart Item</a></li>
							</ul>
						</li>
					</ul>
				</div>
				<!-- menu nav -->
			</div>
		</div>
		<!-- /container -->
	</div>
	<!-- /NAVIGATION -->
