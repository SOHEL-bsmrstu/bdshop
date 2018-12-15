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
                        <li><a  id="profile" style="cursor: pointer;"><i class="fa fa-user-o"></i> {{Auth::user()->name}}</a></li>
                        <li><a  style="cursor: pointer;" href="{{route('user.logout')}}" id="logout"><i class="fa fa-user-o"></i> LogOut</a></li>
                        @else
                        <li><a style="cursor: pointer;" id="sign"><i class="fa fa-user-o"></i> SignUp</a></li>
                        <li><a style="cursor: pointer;" id="login"><i class="fa fa-user-o"></i> LogIn</a></li>
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
                                        @if(Auth::check())
                                        <div class="qty" id="cartvalue"></div>
                                        @else
                                        <div class="qty" >0</div>
                                        @endif
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
        @section('content')
        
        @show
        @section('footer')
        <!-- NEWSLETTER -->
        <div id="newsletter" class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row" >
                    <div class="col-md-12">
                        <div class="newsletter">
                            <p>Subscribe  for the <strong>NEWSLETTER</strong></p>
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