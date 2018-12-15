<html>
	<head>
		<title>Admin Panel of Ecommerce - @yield('title')</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>E-commerce</title>
		<!-- Google font -->
		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>
		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>
		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>
		<link rel="stylesheet" href="css/register.css">
		
		<!-- Custom stlylesheet -->
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	</head>
	<body>
		
		@section('header')
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +8801742021380</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> rana37351@gmail.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> Natore</a></li>	
					</ul>
					
					<ul class="header-links pull-right">
						@if(Auth::check())
						<li><a href="{{route('profile')}}" id="profile" style="cursor: pointer;"><i class="fa fa-user-o"></i> {{Auth::user()->name}}</a></li>
						<li><a href="{{route('user.logout')}}" id="logout" style="cursor: pointer;"><i class="fa fa-user-o"></i> LogOut</a></li>
						@else
						<li><a  id="sign" style="cursor: pointer;"><i class="fa fa-user-o"></i> SignUp</a></li>
						<li><a id="login" style="cursor: pointer;"><i class="fa fa-user-o"></i> LogIn</a></li>
						@endif
						<li>							
							<div id="google_translate_element"></div>
							<script type="text/javascript">
							function googleTranslateElementInit() {
							new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
							}
							</script>
							<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
						</li>
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->
			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="{{route('home')}}" class="logo">
									<img src="./img/logo.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->
						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form>
									<select class="input-select">
										<option value="">All Categories</option>
										<option value="laptop">Laptop</option>
										<option value="camera">Camera</option>
										<option value="mobile">Mobile</option>
										<option value="headphone">HeadPhone</option>
									</select>
									<input class="input" placeholder="Search here">
									<button class="search-btn">Search</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->
						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								<div>
									<a href="#">
										<i class="fa fa-heart-o"></i>
										<span>Your Wishlist</span>
										<div class="qty">2</div>
									</a>
								</div>
								<!-- /Wishlist -->
								<!-- Cart -->
								<div class="dropdown">
									<a href="{{route('product.ShoppingCart')}}">
										<i class="fa fa-shopping-cart"></i>
										<span>Your Cart</span>
										@if(Auth::check())
										<div class="qty" id="cartvalue"></div>
										@else
										<div class="qty" >0</div>
										@endif
									</a>
								</div>
								<!-- /Cart -->
								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->
		@show
		@section('nav-bar')
		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="#">Home</a></li>
						<li><a href="#hot-deal">Hot Deals</a></li>
						<li><a href="#product">Products</a></li>
						<li><a href="#topselling">Top Selling</a></li>
						<li><a href="#newsletter">News Letter</a></li>
						<li><a href="#footer">Contacts</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->
		@show
		@section('products')
		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop01.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Laptop<br>Collection</h3>
								<a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->
					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop03.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Accessories<br>Collection</h3>
								<a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->
					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop02.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Cameras<br>Collection</h3>
								<a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		<!-- Product Details -->
		<!-- SECTION -->
		<div class="section" id="product">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title"> Products</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<li class="active"><a data-toggle="tab" href="#laptop" style="text-decoration: none;">Laptops</a></li>
									<li><a data-toggle="tab" href="#mobile"  style="text-decoration: none;">Smartphones</a></li>
									<li><a data-toggle="tab" href="#camera"  style="text-decoration: none;">Cameras</a></li>
									<li><a data-toggle="tab" href="#headphone"  style="text-decoration: none;">HeadPhone</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->
					<!-- laptop Products tab & slick -->
					<div class="col-md-12" style="height: 550px; margin-bottom: 4%;">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="laptop" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<!-- product -->
										@foreach($data as $value)
										@if($value->produt_catecory == 'laptop')
										<div class="product">
											<div class="product-img">
												<img src="images/{{$value->product_image}}" alt="">
												<div class="product-label">
													@if($value->discount != 0)
													<span class="sale">-{{$value->discount}}%</span>
													@else
													<span class="sale">0%</span>
													@endif
													<span class="new">{{$value->product_stategy}}</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">{{$value->produt_catecory}}</p>
												<h3 class="product-name"><a href="#">{{$value->product_name}}</a></h3>
												@if($value->discount == 0)
												<h4 class="product-price">{{$value->product_price}}$
												@else
												<h4 class="product-price">{{$value->new_price}}$
												<del class="product-old-price">{{$value->product_price}}$</del></h4>
												@endif
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view" id = "{{$value->id}}"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn" id = "{{$value->id}}" style="border-radius: 10px 10px 10px 10px; min-width: 120px;"><i class="fa fa-shopping-cart"></i> add to cart</button>
											</div>
										</div>
										@endif
										@endforeach
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
								<div id="mobile" class="tab-pane fade">
									<div class="products-slick" data-nav="#slick-nav">
										<!-- product -->
										@foreach($data as $value)
										@if($value->produt_catecory == 'mobile')
										<div class="product">
											<div class="product-img">
												<img src="images/{{$value->product_image}}" alt="">
												<div class="product-label">
													@if($value->discount != 0)
													<span class="sale">-{{$value->discount}}%</span>
													@else
													<span class="sale">0%</span>
													@endif
													<span class="new">{{$value->product_stategy}}</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">{{$value->produt_catecory}}</p>
												<h3 class="product-name"><a href="#">{{$value->product_name}}</a></h3>
												@if($value->discount == 0)
												<h4 class="product-price">{{$value->product_price}}$
												@else
												<h4 class="product-price">{{$value->new_price}}$
												<del class="product-old-price">{{$value->product_price}}$</del></h4>
												@endif
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view" id = "{{$value->id}}"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"  id = "{{$value->id}}"  style="border-radius: 10px 10px 10px 10px; min-width: 120px;"><i class="fa fa-shopping-cart"></i> add to cart</button>
											</div>
										</div>
										@endif
										@endforeach
									</div>
									<div id="slick-nav" class="products-slick-nav"></div>
								</div>
								<div id="camera" class="tab-pane fade">
									<div class="products-slick" data-nav="#slick-nav-camera">
										<!-- product -->
										@foreach($data as $value)
										@if($value->produt_catecory == 'camera')
										<div class="product">
											<div class="product-img">
												<img src="images/{{$value->product_image}}" alt="">
												<div class="product-label">
													@if($value->discount != 0)
													<span class="sale">-{{$value->discount}}%</span>
													@else
													<span class="sale">0%</span>
													@endif
													<span class="new">{{$value->product_stategy}}</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">{{$value->produt_catecory}}</p>
												<h3 class="product-name"><a href="#">{{$value->product_name}}</a></h3>
												@if($value->discount == 0)
												<h4 class="product-price">{{$value->product_price}}$
												@else
												<h4 class="product-price">{{$value->new_price}}$
												<del class="product-old-price">{{$value->product_price}}$</del></h4>
												@endif
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view" id = "{{$value->id}}"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn" id = "{{$value->id}}"   style="border-radius: 10px 10px 10px 10px; min-width: 120px;"><i class="fa fa-shopping-cart"></i> add to cart</button>
											</div>
										</div>
										@endif
										@endforeach
									</div>
									<div id="slick-nav-camera" class="products-slick-nav"></div>
								</div>
								<div id="headphone" class="tab-pane fade">
									<div class="products-slick" data-nav="#slick-nav-headphone">
										<!-- product -->
										@foreach($data as $value)
										@if($value->produt_catecory == 'headphone')
										<div class="product">
											<div class="product-img">
												<img src="images/{{$value->product_image}}" alt="">
												<div class="product-label">
													@if($value->discount != 0)
													<span class="sale">-{{$value->discount}}%</span>
													@else
													<span class="sale">0%</span>
													@endif
													<span class="new">{{$value->product_stategy}}</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">{{$value->produt_catecory}}</p>
												<h3 class="product-name"><a href="#">{{$value->product_name}}</a></h3>
												@if($value->discount == 0)
												<h4 class="product-price">{{$value->product_price}}$
												@else
												<h4 class="product-price">{{$value->new_price}}$
												<del class="product-old-price">{{$value->product_price}}$</del></h4>
												@endif
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view" id = "{{$value->id}}"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn" id = "{{$value->id}}"   style="border-radius: 10px 10px 10px 10px; min-width: 120px;"><i class="fa fa-shopping-cart"></i> add to cart</button>
											</div>
										</div>
										@endif
										@endforeach
									</div>
									<div id="slick-nav-headphone" class="products-slick-nav"></div>
								</div>
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		<!-- HOT DEAL SECTION -->
		<div id="hot-deal" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="hot-deal">
							<ul class="hot-deal-countdown">
								<li>
									<div>
										<h3 id="day">00</h3>
										<span>Days</span>
									</div>
								</li>
								<li>
									<div>
										<h3 id="hour">00</h3>
										<span>Hours</span>
									</div>
								</li>
								<li>
									<div>
										<h3 id="minute">00</h3>
										<span>Mins</span>
									</div>
								</li>
								<li>
									<div>
										<h3 id="second">00</h3>
										<span>Secs</span>
									</div>
								</li>
							</ul>
							<h2 class="text-uppercase">hot deal this week</h2>
							<p>New Collection Up to 50% OFF</p>
							<a class="primary-btn cta-btn" id="btn-hot-deal" href="{{route('hot-deal')}}">Shop now</a>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /HOT DEAL SECTION -->
		<!-- Product Details -->
		<!-- SECTION -->
		<div class="section" id="topselling">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Today Top Selling</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<li class="active"><a data-toggle="tab" href="#top_laptop" style="text-decoration: none;">Laptops</a></li>
									<li><a data-toggle="tab" href="#top_mobile"  style="text-decoration: none;">Smartphones</a></li>
									<li><a data-toggle="tab" href="#top_camera"  style="text-decoration: none;">Cameras</a></li>
									<li><a data-toggle="tab" href="#top_headphone"  style="text-decoration: none;">HeadPhone</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->
					<!-- laptop Products tab & slick -->
					<div class="col-md-12" style="height: 550px; margin-bottom: 4%;">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="top_laptop" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-toplaptop">
										<!-- product -->
										@foreach($data as $value)
										@if($value->produt_catecory == 'laptop')
										<div class="product">
											<div class="product-img">
												<img src="images/{{$value->product_image}}" alt="">
												<div class="product-label">
													@if($value->discount != 0)
													<span class="sale">-{{$value->discount}}%</span>
													@else
													<span class="sale">0%</span>
													@endif
													<span class="new">{{$value->product_stategy}}</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">{{$value->produt_catecory}}</p>
												<h3 class="product-name"><a href="#">{{$value->product_name}}</a></h3>
												@if($value->discount == 0)
												<h4 class="product-price">{{$value->product_price}}$
												@else
												<h4 class="product-price">{{$value->new_price}}$
												<del class="product-old-price">{{$value->product_price}}$</del></h4>
												@endif
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view" id = "{{$value->id}}"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn" id = "{{$value->id}}" style="border-radius: 10px 10px 10px 10px; min-width: 120px;"><i class="fa fa-shopping-cart"></i> add to cart</button>
											</div>
										</div>
										@endif
										@endforeach
									</div>
									<div id="slick-nav-toplaptop" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
								<div id="top_mobile" class="tab-pane fade">
									<div class="products-slick" data-nav="#slick-nav-topmobile">
										<!-- product -->
										@foreach($data as $value)
										@if($value->produt_catecory == 'mobile')
										<div class="product">
											<div class="product-img">
												<img src="images/{{$value->product_image}}" alt="">
												<div class="product-label">
													@if($value->discount != 0)
													<span class="sale">-{{$value->discount}}%</span>
													@else
													<span class="sale">0%</span>
													@endif
													<span class="new">{{$value->product_stategy}}</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">{{$value->produt_catecory}}</p>
												<h3 class="product-name"><a href="#">{{$value->product_name}}</a></h3>
												@if($value->discount == 0)
												<h4 class="product-price">{{$value->product_price}}$
												@else
												<h4 class="product-price">{{$value->new_price}}$
												<del class="product-old-price">{{$value->product_price}}$</del></h4>
												@endif
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view" id = "{{$value->id}}"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn" id = "{{$value->id}}" style="border-radius: 10px 10px 10px 10px; min-width: 120px;"><i class="fa fa-shopping-cart"></i> add to cart</button>
											</div>
										</div>
										@endif
										@endforeach
									</div>
									<div id="slick-nav-topmobile" class="products-slick-nav"></div>
								</div>
								<div id="top_camera" class="tab-pane fade">
									<div class="products-slick" data-nav="#slick-nav-topcamera">
										<!-- product -->
										@foreach($data as $value)
										@if($value->produt_catecory == 'camera')
										<div class="product">
											<div class="product-img">
												<img src="images/{{$value->product_image}}" alt="">
												<div class="product-label">
													@if($value->discount != 0)
													<span class="sale">-{{$value->discount}}%</span>
													@else
													<span class="sale">0%</span>
													@endif
													<span class="new">{{$value->product_stategy}}</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">{{$value->produt_catecory}}</p>
												<h3 class="product-name"><a href="#">{{$value->product_name}}</a></h3>
												@if($value->discount == 0)
												<h4 class="product-price">{{$value->product_price}}$
												@else
												<h4 class="product-price">{{$value->new_price}}$
												<del class="product-old-price">{{$value->product_price}}$</del></h4>
												@endif
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view" id = "{{$value->id}}"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn" id = "{{$value->id}}" style="border-radius: 10px 10px 10px 10px; min-width: 120px;"><i class="fa fa-shopping-cart"></i> add to cart</button>
											</div>
										</div>
										@endif
										@endforeach
									</div>
									<div id="slick-nav-topcamera" class="products-slick-nav"></div>
								</div>
								<div id="top_headphone" class="tab-pane fade">
									<div class="products-slick" data-nav="#slick-nav-topheadphone">
										<!-- product -->
										@foreach($data as $value)
										@if($value->produt_catecory == 'headphone')
										<div class="product">
											<div class="product-img">
												<img src="images/{{$value->product_image}}" alt="">
												<div class="product-label">
													@if($value->discount != 0)
													<span class="sale">-{{$value->discount}}%</span>
													@else
													<span class="sale">0%</span>
													@endif
													<span class="new">{{$value->product_stategy}}</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">{{$value->produt_catecory}}</p>
												<h3 class="product-name"><a href="#">{{$value->product_name}}</a></h3>
												@if($value->discount == 0)
												<h4 class="product-price">{{$value->product_price}}$
												@else
												<h4 class="product-price">{{$value->new_price}}$
												<del class="product-old-price">{{$value->product_price}}$</del></h4>
												@endif
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view" id = "{{$value->id}}"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn" id = "{{$value->id}}" style="border-radius: 10px 10px 10px 10px; min-width: 120px;"><i class="fa fa-shopping-cart"></i> add to cart</button>
											</div>
										</div>
										@endif
										@endforeach
									</div>
									<div id="slick-nav-topheadphone" class="products-slick-nav"></div>
								</div>
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		<!-- SECTION -->
		<div class="section" style="height: 500px;">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Top selling</h4>
							<div class="section-nav">
								<div id="slick-nav-3" class="products-slick-nav"></div>
							</div>
						</div>
						<div class="products-widget-slick" data-nav="#slick-nav-3">
							<div>
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="images/1542682057.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget -->
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product08.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget -->
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product09.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- product widget -->
							</div>
							<div>
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product01.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget -->
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product02.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget -->
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product03.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- product widget -->
							</div>
						</div>
					</div>
					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Top selling</h4>
							<div class="section-nav">
								<div id="slick-nav-4" class="products-slick-nav"></div>
							</div>
						</div>
						<div class="products-widget-slick" data-nav="#slick-nav-4">
							<div>
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product04.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget -->
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product05.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget -->
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product06.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- product widget -->
							</div>
							<div>
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product07.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget -->
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product08.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget -->
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product09.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- product widget -->
							</div>
						</div>
					</div>
					<div class="clearfix visible-sm visible-xs"></div>
					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Top selling</h4>
							<div class="section-nav">
								<div id="slick-nav-5" class="products-slick-nav"></div>
							</div>
						</div>
						<div class="products-widget-slick" data-nav="#slick-nav-5">
							<div>
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product01.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget -->
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product02.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget -->
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product03.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- product widget -->
							</div>
							<div>
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product04.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget -->
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product05.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- /product widget -->
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product06.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="#">product name goes here</a></h3>
										<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
									</div>
								</div>
								<!-- product widget -->
							</div>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		@show
		@section('footer')
		<!-- NEWSLETTER -->
		<div id="newsletter" class="section" >
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row" >
					<div class="col-md-12">
						<div class="newsletter">
							<p>Subscribe Up for the <strong>NEWSLETTER</strong></p>
							<form>
								<input class="input" type="email" placeholder="Enter Your Email">
								<button class="newsletter-btn" style="float: right;"><i class="fa fa-envelope"></i> Subscribe</button>
							</form>
							<ul class="newsletter-follow">
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-pinterest"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /NEWSLETTER -->
		<!-- FOOTER -->
		<footer id="footer" style="margin-top: 0%;">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">About Us</h3>
								<ul class="footer-links">
									<li><a><i class="fa fa-map-marker"></i>Natore, Rajshahi</a></li>
									<li><a><i class="fa fa-phone"></i>+8801742021380</a></li>
									<li><a><i class="fa fa-envelope-o"></i>rana37351@gmail.com</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Categories</h3>
								<ul class="footer-links">
									<li><a href="{{route('hot-deal')}}">Hot deals</a></li>
									<li><a href="{{route('product.laptop')}}">Laptops</a></li>
									<li><a href="{{route('product.mobile')}}">Smartphones</a></li>
									<li><a href="{{route('product.camera')}}">Cameras</a></li>
									<li><a href="{{route('product.headphone')}}">HeadPhone</a></li>
								</ul>
							</div>
						</div>
						<div class="clearfix visible-xs"></div>
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Information</h3>
								<ul class="footer-links">
									<li><a href="#">About Us</a></li>
									<li><a href="#">Contact Us</a></li>
									<li><a href="#">Privacy Policy</a></li>
									<li><a href="#">Orders and Returns</a></li>
									<li><a href="#">Terms & Conditions</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Service</h3>
								<ul class="footer-links">
									<li><a href="{{route('profile')}}">My Account</a></li>
									<li><a href="{{route('product.ShoppingCart')}}">View Cart</a></li>
									<li><a href="#">Wishlist</a></li>
									<li><a href="{{route('profile')}}">Track My Order</a></li>
									<li><a>Help</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->
			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<ul class="footer-payments">
								<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
								<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
							</ul>
							<span class="copyright">
								Copyright &copy;2018 All rights reserved by <a href="https://facebook.com" target="_blank" style="color: white;">Sohel Rana</a>
							</span>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->
		<!-- The Modal -->
		<div class="modal fade" id="quickview">
			<div class="modal-dialog">
				<div class="modal-content">
					<!-- Modal Header -->
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">QuickView</h4>
					</div>
					
					<!-- Modal body -->
					<div class="modal-body" style="height: 400px;">
						<div id="imgContainer" style="border : 1px solid gray; width: 225px; float: left;"></div>
						<P> <li style =" margin-left: 50%;">The Product name is <b><span style="color: blue" id="product_name"></span></b></li></P>
						<P> <li style =" margin-left: 50%;">The Product name is <b><span style="color: blue"  id="produt_catecory"></span></b></li></P>
						<P> <li style =" margin-left: 50%;">The Product name is <b><span style="color: blue"  id="description"></span></b></li></P>
						<P> <li style =" margin-left: 50%;">The Product Price is <b style="color: #D10024;">$<span style="color: #D10024"  id="product_price"></span></b></li></P>
						<div style="float: right; margin-right: 20%; margin-top: 20%;">
							<button class="add-to-cart-btn"  style="border-radius: 10px 10px 10px 10px; width: 150px; height: 50px; color: white; background-color: #D10024; border:none;"><i class="fa fa-shopping-cart"></i> <b>Add To Cart</b></button>
						</div>
						<div style="float: left; margin-top : 20%; margin-left: -30%;">
							<button style="border-radius: 10px 10px 10px 10px; width: 170px; height: 50px; color: white; background-color: #D10024; border:none;"><i class="fa fa-shopping-cart"></i> <b>View Full Details</b></button>
						</div>
					</div>
					
					<!-- Modal footer -->
					<div class="modal-footer">
						
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
					
				</div>
			</div>
		</div>
		<!--Resgistration MODAL -->
		<div class="modal fade" id="modal-register" tabindex="-1" role="dialog" aria-labelledby="modal-register-label" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
						</button>
						<h3 class="modal-title" id="modal-register-label">Sign up now</h3>
					</div>
					
					<div class="modal-body" >
						
						<form role="form" action="{{route('usercreate')}}" method="post" class="registration-form">
							<div class="form-group">
								<label  for="form-first-name"> Name</label>
								<input type="text" name="name" placeholder="Name..." style="height: 45px;" class=" form-control" id="name" required>
							</div>
							
							<div class="form-group">
								<label  for="form-email">Email</label>
								<input type="text" name="email" style="height: 45px;" placeholder="Email..." class=" form-control" id="email" required>
							</div>
							<div class="form-group">
								<label  for="form-password">Password</label>
								<input type="password" name="password" style="height: 45px;" placeholder="Password..." class="form-control" id="password" required>
							</div>
							<div class="form-group">
								<label  for="form-password">Confirm Password</label>
								<input type="password" name="password_confirmation" style="height: 45px;" placeholder="Password..." class="form-control" id="password_confirmation" required>
							</div>
							{{csrf_field()}}
							<button type="submit" class="btn btn-primary btn-block" >Sign me up!</button>
						</form>
						
					</div>
					
				</div>
			</div>
		</div>
		<!-- LogIn Modal -->
		<!--Resgistration MODAL -->
		<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="modal-register-label" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
						</button>
						<h3 class="modal-title" id="modal-register-label">Log in now</h3>
					</div>
					
					<div class="modal-body" >
						
						<form role="form" action="{{route('custom.login')}}" method="post" class="registration-form">
							<div class="form-group">
								<label  for="form-email">Email</label>
								<input type="text" name="email" style="height: 45px;"  class=" form-control" id="email" required>
							</div>
							<div class="form-group">
								<label  for="form-password">Password</label>
								<input type="password" name="password" style="height: 45px;"  class="form-control" id="password" required>
							</div>
							{{csrf_field()}}
							<button type="submit" class="btn btn-primary btn-block" >LogIn</button>
						</form>
						
					</div>
					
				</div>
			</div>
		</div>
		<script type="text/javascript">
		$(document).ready(function(){
			//fetch cart value
			var user_id = '0';
			$.ajax({
					url:"{{route('order.tmpqty')}}",
			method:'get',
			data:{id:user_id},
			dataType:'json',
			success:function(data)
			{
				//alert(data);
				var HTMLbuilder = "";
				var imgHtml = data.cartvalue;
			HTMLbuilder = HTMLbuilder + imgHtml;
				//alert(HTMLbuilder);
			$("#cartvalue").html(HTMLbuilder);
			}
		});
			//alert('okk');
		$('.quick-view').click(function(){
			var id = $(this).attr('id');
				//alert(id);
			$.ajax({
				url:"{{route('product.fetchdata')}}",
				method:'get',
				data:{id:id},
				dataType:'json',
				success:function(data)
				{
					//alert(data);
					var HTMLbuilder = "";
					var imgHtml = "<img style = 'height:220px; width: 220px;' src='images/" + data.product_image + "'>";
				HTMLbuilder = HTMLbuilder + imgHtml;
					//alert(HTMLbuilder);
				$("#imgContainer").html(HTMLbuilder);
				$('#product_name').html(data.product_name);
				$('#produt_catecory').html(data.produt_catecory);
				$('#product_image').val(data.product_image);
				$('#description').html(data.description);
				$('#product_price').html(data.product_price);
				$('#quickview').modal('show');
				}
			});
		});
		$('#sign').click(function(){
				//alert('ok');
			$('#modal-register').modal('show');
		});

		$('#login').click(function(){
				//alert('ok');
			$('#login-modal').modal('show');
		});

		$('.add-to-cart-btn').click(function(){
			var id = $(this).attr('id');
				//alert(id);
			var loggedIn = {{ auth()->check() ? 'true' : 'false' }};
			if (loggedIn){
				$.ajax({
					url:"{{route('order.temporay')}}",
					method:'get',
					data:{id:id},
					dataType:'json',
					success:function(data)
					{
						//alert(data);
						var HTMLbuilder = "";
						var imgHtml = data.cartvalue;
					HTMLbuilder = HTMLbuilder + imgHtml;
						//alert(HTMLbuilder);
					$("#cartvalue").html(HTMLbuilder);
					alert('Product added to cart');
					}
				});
		}else{
				alert('Need login to buy!!!');
				$('#login-modal').modal('show');
			}
		});
	});
		</script>
		@show
		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/product.js"></script>
</body>
</html>