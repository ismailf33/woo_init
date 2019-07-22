<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">
    <title>eCommerce premium HTML5 & CSS3 Template</title>
    <!-- Bootstrap Core CSS -->
  
    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/font-awesome.css">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<?php wp_head();?>
</head>

<body <?php body_class();?> class="cnt-home" >
    <header class="header-style-1">
        <div class="top-bar animate-dropdown">
            <div class="container">
                <div class="header-top-inner">
                    <div class="cnt-account">
                        <ul class="list-unstyled">
                            <li><a href="#"><i class="icon fa fa-user"></i>My Account</a></li>
                            <li><a href="#"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
                            <li><a href="#"><i class="icon fa fa-check"></i>Checkout</a></li>
                            <li><a href="#"><i class="icon fa fa-lock"></i>Login</a></li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="main-header">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-10 logo-holder">
                        <div class="logo">
                            <a href="home.html"> <img src="<?php echo get_template_directory_uri();?>/assets/images/logo.png" alt="logo"> </a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
                        <div class="dropdown dropdown-cart">
                            <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
                                <div class="items-cart-inner">
                                    <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                                    <div class="basket-item-count"><span class="count">2</span></div>
                                    <div class="total-price-basket"> <span class="lbl">cart -</span> <span class="total-price"> <span class="sign">$</span><span class="value">600.00</span> </span>
                                    </div>
                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="cart-item product-summary">
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <div class="image">
                                                    <a href="detail.html"><img src="<?php echo get_template_directory_uri();?>/assets/images/cart.jpg" alt=""></a>
                                                </div>
                                            </div>
                                            <div class="col-xs-7">
                                                <h3 class="name"><a href="index8a95.html?page-detail">Simple Product</a></h3>
                                                <div class="price">$600.00</div>
                                            </div>
                                            <div class="col-xs-1 action"> <a href="#"><i class="fa fa-trash"></i></a> </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <hr>
                                    <div class="clearfix cart-total">
                                        <div class="pull-right"> <span class="text">Sub Total :</span><span class='price'>$600.00</span> </div>
                                        <div class="clearfix"></div>
                                        <a href="checkout.html" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a> </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nav-bg-class">
                <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                    <div class="nav-outer">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'main_menu',
                            'container_class' => 'nav-outer',
                            'items_wrap' => '<ul class="nav navbar-nav">%3$s</ul>'
                        ));                       
                        ?>
                    </div>
                </div>
            </div>
    </header>