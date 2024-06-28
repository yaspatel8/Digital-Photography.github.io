
<?php 
    include_once("connection.php");
?>
<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from htmldemo.net/eliza/eliza/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 17 Mar 2024 13:14:14 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Alexander</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../Images/logo.jpg">

    <!-- CSS
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="assets/css/vendor/line-awesome.css">
    <link rel="stylesheet" href="assets/css/vendor/themify.css">

    <!-- othres CSS -->
    <link rel="stylesheet" href="assets/css/plugins/animate.css">
    <link rel="stylesheet" href="assets/css/plugins/owl-carousel.css">
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/plugins/jquery-ui.css">
    <link rel="stylesheet" href="assets/css/plugins/slick.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

    <div class="main-wrapper wrapper-2">
        <header class="header-area sticky-bar section-padding-1">
            <div class="main-header-wrap">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo">
                                
                                <a href="index.php">
                                    <img src="../Images/logo.jpg" alt="logo" height="80vh">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8">
                            <div class="main-menu">
                                <nav>
                                    <ul>
                                        <li class="angle-shape"><a href="index.php">Home </a>
                                            
                                        </li>
                                        
                                        
                                        
                                        <li class="angle-shape"><a href="">Category </a>
                                        
                                            <ul class="submenu">
                                            <?php 
                                        $qry=mysqli_query($con,"select * from catrgory_master where status=0"); 
                                        while($row=mysqli_fetch_array($qry)){
                                        ?>
                                                <li><a href="products.php?x=<?php echo "$row[0]"; ?>"><?php echo "$row[cname]"; ?> </a></li>
                                                <?php } ?>
                                            </ul>
                                            
                                        </li>
                                        <li class="angle-shape"><a href="pro.php">Products </a>
                                            
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2">
                            <div class="header-right-wrap">
                                <div class="same-style cart-wrap">
                                    <a href="addtocart.php">
                                        <i class="la la-shopping-cart"></i>
                                    
                                    </a>
                                </div>
                                
                                <div class="same-style setting-wrap ml-15">
                                
								
								<a href="profile.php" style="font-size: 4vh;" > Profile </span></a>
							
                                    
                                </div>
                                <div class="same-style setting-wrap ml-15">
                                
								
								<a href="logout.php" style="font-size: 4vh;" > Logout </span></a>
							
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-small-mobile">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <div class="mobile-logo">
                                <a href="index.php">
                                    <img alt="" src="../Images/logo.jpg" height="80vh">
                                </a>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="header-right-wrap">
                                <div class="same-style cart-wrap">
                                    <a href="#" class="cart-active">
                                        <i class="la la-shopping-cart"></i>
                                        <span class="count-style">02</span>
                                    </a>
                                </div>
                                <div class="same-style mobile-off-canvas">
                                    <a class="mobile-aside-button" href="#"><i class="la la-navicon"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        <div class="mobile-off-canvas-active">
            <a class="mobile-aside-close"><i class="la la-close"></i></a>
            <div class="header-mobile-aside-wrap">
                <div class="mobile-search">
                    <form class="search-form" action="#">
                        <input type="text" placeholder="Search entire store…">
                        <button class="button-search"><i class="la la-search"></i></button>
                    </form>
                </div>
                <div class="mobile-menu-wrap">
                    <!-- mobile menu start -->
                    <div class="mobile-navigation">
                        <!-- mobile menu navigation start -->
                        <nav>
                            <ul class="mobile-menu">
                                <li class="menu-item-has-children"><a href="index.html">Home</a>
                                    <ul class="dropdown">
                                        <li><a href="index.html">Home version 1 </a></li>
                                        <li><a href="index-2.html">Home version 2 </a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children "><a href="shop.html">shop</a>
                                    <ul class="dropdown">
                                        <li class="menu-item-has-children"><a href="#">Shop Layout</a>
                                            <ul class="dropdown">
                                                <li><a href="shop.html">standard style</a></li>
                                                <li><a href="shop-2col.html">grid 2 column</a></li>
                                                <li><a href="shop-right-sidebar.html">grid right sidebar</a></li>
                                                <li><a href="shop-grid-no-sidebar.html">grid no sidebar</a></li>
                                                <li><a href="shop-grid-fw.html">grid full wide</a></li>
                                                <li><a href="shop-list.html">list 1 column</a></li>
                                                <li><a href="shop-list-fw-2col.html">list 2 column</a></li>
                                                <li><a href="shop-list-fw.html">list full wide</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children"><a href="#">products details</a>
                                            <ul class="dropdown">
                                                <li><a href="product-details.html">tab style 1</a></li>
                                                <li><a href="product-details-tab-2.html">tab style 2</a></li>
                                                <li><a href="product-details-tab-3.html">tab style 3</a></li>
                                                <li><a href="product-details-gallery.html">gallery style </a></li>
                                                <li><a href="product-details-sticky.html">sticky style</a></li>
                                                <li><a href="product-details-sticky-right.html">sticky right</a></li>
                                                <li><a href="product-details-slider-box.html">slider style</a></li>
                                                <li><a href="product-details-affiliate.html">Affiliate style</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="shop.html">Accessories </a></li>
                                <li class="menu-item-has-children"><a href="#">pages</a>
                                    <ul class="dropdown">
                                        <li><a href="about-us.html">about us </a></li>
                                        <li><a href="cart.html">cart page </a></li>
                                        <li><a href="checkout.html">checkout </a></li>
                                        <li><a href="compare.html">compare </a></li>
                                        <li><a href="wishlist.html">wishlist </a></li>
                                        <li><a href="my-account.html">my account </a></li>
                                        <li><a href="contact.html">contact us </a></li>
                                        <li><a href="login-register.html">login/register </a></li>
                                        <li><a href="404.html">404 page </a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children "><a href="blog.html">Blog</a>
                                    <ul class="dropdown">
                                        <li><a href="blog.html">standard style </a></li>
                                        <li><a href="blog-no-sidebar.html"> blog no sidebar </a></li>
                                        <li><a href="blog-right-sidebar.html">blog right sidebar</a></li>
                                        <li><a href="blog-details.html">blog details</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact-us.html">Contact us</a></li>
                            </ul>
                        </nav>
                        <!-- mobile menu navigation end -->
                    </div>
                    <!-- mobile menu end -->
                </div>
                <div class="mobile-curr-lang-wrap">
                    <div class="single-mobile-curr-lang">
                        <a class="mobile-language-active" href="#">Language <i class="la la-angle-down"></i></a>
                        <div class="lang-curr-dropdown lang-dropdown-active">
                            <ul>
                                <li><a href="#">English (US)</a></li>
                                <li><a href="#">English (UK)</a></li>
                                <li><a href="#">Spanish</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="single-mobile-curr-lang">
                        <a class="mobile-currency-active" href="#">Currency <i class="la la-angle-down"></i></a>
                        <div class="lang-curr-dropdown curr-dropdown-active">
                            <ul>
                                <li><a href="#">USD</a></li>
                                <li><a href="#">EUR</a></li>
                                <li><a href="#">Real</a></li>
                                <li><a href="#">BDT</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="single-mobile-curr-lang">
                        <a class="mobile-account-active" href="#">My Account <i class="la la-angle-down"></i></a>
                        <div class="lang-curr-dropdown account-dropdown-active">
                            <ul>
                                <li><a href="login-register.html">Login</a></li>
                                <li><a href="login-register.html">Creat Account</a></li>
                                <li><a href="my-account.html">My Account</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="quick-info">
                    <ul>
                        <li><i class="la la-phone"></i> +012 456 789</li>
                        <li> <i class="la la-envelope"></i> <a href="#">INFO@EXAMPLE.COM</a></li>
                        <li> <i class="la la-clock-o"></i> MON-SAT:8AM TO 9PM</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- search start -->
        <div class="search-content-wrap main-search-active">
            <a class="search-close"><i class="la la-close"></i></a>
            <div class="search-content">
                <p>Start typing and press Enter to search</p>
                <form class="search-form" action="#">
                    <input type="text" placeholder="Search entire store…">
                    <button class="button-search"><i class="la la-search"></i></button>
                </form>
            </div>
        </div>
        <!-- mini cart start -->
        <div class="sidebar-cart-active">
            <div class="sidebar-cart-all">
                <a class="cart-close" href="#"><i class="la la-close"></i></a>
                <div class="cart-content">
                    <h3>Shopping Cart</h3>
                    <ul>
                        <li class="single-product-cart">
                            <div class="cart-img">
                                <a href="#"><img src="assets/images/cart/cart-1.jpg" alt=""></a>
                            </div>
                            <div class="cart-title">
                                <h4><a href="#"> Flower Dress </a></h4>
                                <span>1 × £54.00</span>
                            </div>
                            <div class="cart-delete">
                                <a href="#">×</a>
                            </div>
                        </li>
                        <li class="single-product-cart">
                            <div class="cart-img">
                                <a href="#"><img src="assets/images/cart/cart-2.jpg" alt=""></a>
                            </div>
                            <div class="cart-title">
                                <h4><a href="#">Ruffled cotton top</a></h4>
                                <span>1 × £54.00</span>
                            </div>
                            <div class="cart-delete">
                                <a href="#">×</a>
                            </div>
                        </li>
                    </ul>
                    <div class="cart-total">
                        <h4>Subtotal: <span>£ 108.00</span></h4>
                    </div>
                    <div class="cart-checkout-btn btn-hover default-btn">
                        <a class="btn-size-md btn-bg-black btn-color" href="cart.html">view cart</a>
                        <a class="no-mrg btn-size-md btn-bg-black btn-color" href="checkout.html">checkout</a>
                    </div>
                </div>
            </div>
        </div>