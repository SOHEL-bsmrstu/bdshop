<html>
    <head>
        <title>Admin Panel of Ecommerce - </title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>E-commerce</title>
        <!-- Google font -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
        <!-- Bootstrap -->
        <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
        <!-- Slick -->
        <!-- nouislider -->
        <!-- Font Awesome Icon -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!-- Custom stlylesheet -->
        <link type="text/css" rel="stylesheet" href="css/style.css"/>
        <!-- Custom stlylesheet -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    </head>
    <body>
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
                        <li><a href="{{route('profile')}}" id="profile"><i class="fa fa-user-o"></i> {{Auth::user()->name}}</a></li>
                        <li><a href="{{route('user.logout')}}" id="logout"><i class="fa fa-user-o"></i> LogOut</a></li>
                        @else
                        <li><a  id="sign"><i class="fa fa-user-o"></i> SignUp</a></li>
                        <li><a id="login"><i class="fa fa-user-o"></i> LogIn</a></li>
                        @endif
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
                                        <div class="qty" id="cartvalue"></div>
                                    </a>
                                </div>
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
        <div class="container" style="margin-top: 3%;">
            <div class="row"  style="margin-left: 20%; margin-right: 20%;">
                <div class = "col sm-6 col md-6 col md-offset-3 col sm-offset-3" >
                    <h1>Billing Address</h1>
                    <br>
                    <h4><span style="color: red;">*</span>Your Total Product Price: {{$total}} $</h4>
                    <form  method="post" enctype="multipart/form-data" id="checkout-form">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="fname">First Name</label>
                                <input type="text" name="fname" id="fname" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="lname">Last Name</label>
                                <input type="text" name="lname" id="lname" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="E-mail">E-mail</label>
                                <input type="text" name="email" id="email" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="card-number">Country Name</label>
                                <input type="text" name="country_name" id="country_name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-sm-6" style="margin-left: -2%;">
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" name="city" id="city" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="zip-code">Zip Code</label>
                                    <input type="text" name="zip_code" id="zip_code" style="width: 110%;" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="Phone Number"> Phone Number</label>
                                <input type="text" name="phn_number" id="phn_number" class="form-control" required>
                            </div>
                        </div>
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-success" style="margin-bottom: 2%;">Bye Now</button>
                    </form>
                </div>
            </div>
        </div>
        
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
                                    <li><a href="#"><i class="fa fa-map-marker"></i>Natore, Rajshahi</a></li>
                                    <li><a href="#"><i class="fa fa-phone"></i>+8801742021380</a></li>
                                    <li><a href="#"><i class="fa fa-envelope-o"></i>rana37351@gmail.com</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-6">
                            <div class="footer">
                                <h3 class="footer-title">Categories</h3>
                                <ul class="footer-links">
                                    <li><a href="#">Hot deals</a></li>
                                    <li><a href="#">Laptops</a></li>
                                    <li><a href="#">Smartphones</a></li>
                                    <li><a href="#">Cameras</a></li>
                                    <li><a href="#">Accessories</a></li>
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
                                    <li><a href="#">My Account</a></li>
                                    <li><a href="#">View Cart</a></li>
                                    <li><a href="#">Wishlist</a></li>
                                    <li><a href="#">Track My Order</a></li>
                                    <li><a href="#">Help</a></li>
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
        <script type="text/javascript">
        $(document).ready(function(){
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
        $('#checkout-form').on('submit',function(event){
        // alert('okk');
        event.preventDefault();
        var form_data = $(this).serialize();
        // alert(form_data);
        $.ajax({
        url:"{{ route('order.buy') }}",
        method:"POST",
        data:form_data,
        dataType:"json",
        success:function(data){
        alert(data.buy_msg);
        $("#checkout-form")[0].reset();
        }
        });
        setTimeout(function(){ window.location = "{{route('home')}}"; },3000);
        });
        })
        </script>
        <!-- /FOOTER -->
        <!-- jQuery Plugins -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>