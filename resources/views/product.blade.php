@extends('basic.header')
@section('title', 'Hot Deal')
@section('content')
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
										<br><br>
										<div class="add-to-cart">
											<button class="add-to-cart-btn" id = "{{$value->id}}" style="border-radius: 10px 10px 10px 10px; min-width: 120px;"><i class="fa fa-shopping-cart"></i> add to cart</button>
										</div>
									</div>
									@endforeach
								</div>
								<div id="slick-nav-1" class="products-slick-nav"></div>
							</div>
							<!-- /tab -->
						</div>
					</div>
				</div>
				<!-- Products tab & slick -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
</div>
	<!-- /SECTION -->
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
	@endsection
	<!-- jQuery Plugins -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/product.js"></script>