<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{URL::to('frontend/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{URL::to('frontend/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{URL::to('frontend/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{URL::to('frontend/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{URL::to('frontend/images/ico/apple-touch-icon-57-precomposed.png')}}">
</head><!--/head-->
<style type="text/css">
    .paymentWrap {
    padding: 50px;
}

.paymentWrap .paymentBtnGroup {
    max-width: 800px;
    margin: auto;
}

.paymentWrap .paymentBtnGroup .paymentMethod {
    padding: 40px;
    box-shadow: none;
    position: relative;
}

.paymentWrap .paymentBtnGroup .paymentMethod.active {
    outline: none !important;
}

.paymentWrap .paymentBtnGroup .paymentMethod.active .method {
    border-color: #4cd264;
    outline: none !important;
    box-shadow: 0px 3px 22px 0px #7b7b7b;
}

.paymentWrap .paymentBtnGroup .paymentMethod .method {
    position: absolute;
    right: 3px;
    top: 3px;
    bottom: 3px;
    left: 3px;
    background-size: contain;
    background-position: center;
    background-repeat: no-repeat;
    border: 2px solid transparent;
    transition: all 0.5s;
}

.paymentWrap .paymentBtnGroup .paymentMethod .method.visa {
    background-image: url("https://www.exemptmagazine.com/wp-content/uploads/2018/04/uiju-560x416.jpg");
}

.paymentWrap .paymentBtnGroup .paymentMethod .method.master-card {
    background-image: url("http://pngimage.net/wp-content/uploads/2018/05/bkash-logo-png.png");
}

.paymentWrap .paymentBtnGroup .paymentMethod .method.amex {
    background-image: url("https://i2.wp.com/deshicoupon.com/wp-content/uploads/2017/05/Payza-Bangladesh.png?resize=724%2C354");
}

 
.paymentWrap .paymentBtnGroup .paymentMethod .method.ez-cash {
    background-image: url("https://cdn.merchantmaverick.com/wp-content/uploads/2013/03/Paypal-Logo-2015.png");
}


.paymentWrap .paymentBtnGroup .paymentMethod .method:hover {
    border-color: #4cd264;
    outline: none !important;
}
</style>
<body>
    <header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> +8801798495808</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i>eshop@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->
        
        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="{{URL::to('/')}}"><img src="{{URL::to('frontend/images/home/logo.png')}}" alt="" /></a>
                        </div>
                        <div class="btn-group pull-right">
                             
                             
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="{{URL::to('/login')}}"><i class="fa fa-user"></i> Account</a></li>
                                 
                                
                                 <?php 
                                    $customer_id = Session::get('customer_id');
                                    $shipping_id = Session::get('shipping_id');

                                    ?>

                                   <?php if ( $customer_id != NULL && $shipping_id==NULL) {?>
                                       <li><a href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                   <?php }

                                    else if($customer_id != NULL && $shipping_id != NULL) { ?>
                                      <li><a href="{{URL::to('/payment')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                  <?php }
                                    
                                    else {
                                    ?>  
                                        <li><a href="{{URL::to('/login')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                  <?php } ?>

                                <li><a href="{{URL::to('/show_cart')}}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                                <?php 
                                    $customer_id=Session::get('customer_id');

                                    if ( $customer_id != NULL) {?>
                                       <li><a href="{{URL::to('/customer_logout')}}"><i class="fa fa-lock"></i> Logout</a></li>
                                   <?php }

                                    else { ?>
                                      <li><a href="{{URL::to('/login')}}"><i class="fa fa-lock"></i> Login</a></li>
                                  <?php }
                                    
                                    ?>                          
                               
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->
    
        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{URL::to('/')}}" class="active">Home</a></li>
                                <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="/">Products</a></li> 
                                        <li><a href="{{URl::to('/login')}}">Checkout</a></li> 
                                        <li><a href="{{URL::to('/show_cart')}}">Cart</a></li> 
                                        
                                    </ul>
                                </li> 
                                 
                                
                                <li><a href="/login">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="search_box pull-right">
                            <form action="{{url('/search')}}" >
                                <input type="text" name="searchdata" placeholder="Search"/>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->


  <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">    
                        <div class="carousel-inner">

                        <?php 
                            $all_published_slider=DB::table('tbl_slider')
                                                ->where('publication_status',1)
                                                ->get(); 

                                $i=1;
                            foreach ($all_published_slider as $v_slider) {
                                
                                if ($i==1) {  ?>  
                            <div class="item active">

                            <?php } else{ ?>

                                    <div class="item">
                                      <?php }?>
                                <div class="col-sm-4">
                                    <h1><span>E</span>-SHOP</h1>
                                    
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-8">
                                    <img style="height:320px " src="{{URL::to($v_slider->slider_image)}}"class="girl img-responsive" alt="" />                                   
                                </div>
                            </div>  
                            <?php $i++; }  ?>         
                        </div>     
                        
                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </section><!--/slider--> 
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Category</h2>
                       <div class="panel-group category-products" id="accordian"><!--category-productsr-->                                                      
                            
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="#">Kids</a></h4>
                                </div>
                            </div>
                             
                             <?php

                             $all_cat_info=DB::table('tbl_category')
                                                ->where('publications_status',1)
                                                ->get();

                                foreach ($all_cat_info as $v_category) {?>
                                    <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="{{URL::to('/product_by_category/'.$v_category->id)}}">{{$v_category->category_name}}</a></h4>
                                </div>
                            </div>
                               <?php }

                             ?>  

                             <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordian" href="#womens">
                                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                            Others
                                        </a>
                                    </h4>
                                </div>                                                                
                                <div id="womens" class="panel-collapse collapse">                                    
                                        <div class="panel-body">
                                             <?php

                             $all_subcat_info=DB::table('tbl_subcategory')
                                                ->where('publications_status',1)
                                                ->get();

                                         foreach ($all_subcat_info as $v_subcategory) {?>
                                            <ul>
                                                <li>
                                                <a href="{{URL::to('/product_by_subcategory/'.$v_subcategory->id)}}">{{$v_subcategory->sub_category_name}}</a>
                                                </li>
                                            </ul> 
                                             <?php } ?>
                                        </div>  
                                          </div>                                                                    
                               
                            </div>
                        </div>
                         
                        <div class="brands_products"><!--brands_products-->
                            <h2>Brands</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                     
                          
                        <?php

                            $all_manufac_info=DB::table('tbl_manufacture')
                                            ->where('publication_status',1)
                                            ->get();
                                            foreach ($all_manufac_info as $v_manufac) {?> 
                                               <li><a href="{{URL::to('/product_by_manufacture/'.$v_manufac->manufacture_id)}}"> <span class="pull-right"> </span>{{$v_manufac->manufacture_name}}</a></li>
                                          <?php  }?> 
                    
                            </div>
                        </div><!--/brands_products-->
                        
                        <div class="price-range"><!--price-range-->
                            <h2>Price Range</h2>
                            <div class="well text-center">
                                 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                                 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                            </div>
                        </div><!--/price-range-->
                        
                        <div class="shipping text-center"><!--shipping-->
                            <img src="{{URL::to('images/home/shipping.jpg')}}" alt="" />
                        </div><!--/shipping-->
                    
                    </div>
                </div>
                
                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        @yield('content')
                </div>
            </div>
        </div>
    </section>
    
    <footer id="footer"><!--Footer-->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        
                    </div>
                    <div class="col-sm-7">
                        
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                     <?php

                            $all_dv_info=DB::table('delivery_man')
                                            ->where('delivery_area',"Natullabad")
                                            ->get();
                                             foreach ($all_dv_info as $v_slider) {?> 
                                    <div class="iframe-img">
                                        <img style="height:60px; width:130px" src="{{URL::to($v_slider->image)}}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>{{$v_slider->delivery_man_name}}</p>
                                <h2>Area:{{$v_slider->delivery_area}}</h2>
                                 <?php  }?> 
                            </div>
                        </div>
                         
                        
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                     <?php

                            $all_manufac_info=DB::table('delivery_man')
                                            ->where('delivery_area',"Sagordi & Rupatoli")
                                            ->get();
                                             foreach ($all_manufac_info as $v_slider) {?> 
                                    <div class="iframe-img">
                                        <img style="height:60px; width:130px" src="{{URL::to($v_slider->image)}}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                               <p>{{$v_slider->delivery_man_name}}</p>
                                <h2>Area:{{$v_slider->delivery_area}}</h2>
                                 <?php  }?> 
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                     <?php

                            $all_manufac_info=DB::table('delivery_man')
                                            ->where('delivery_area',"Bangla Bazar")
                                            ->get();
                                             foreach ($all_manufac_info as $v_slider) {?> 
                                    <div class="iframe-img">
                                        <img style="height:60px; width:130px" src="{{URL::to($v_slider->image)}}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>{{$v_slider->delivery_man_name}}</p>
                                <h2>Area:{{$v_slider->delivery_area}}</h2>
                                 <?php  }?> 
                            </div>
                        </div>
                        
                        
                    </div>
                    <div class="col-sm-3">
                        <div class="address">
                            <img src="{{URL::to('frontend/images/home/map.png')}}" alt="" />
                            <p>Barishal,bangladesh</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Service</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Online Help</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Order Status</a></li>
                                <li><a href="#">Change Location</a></li>
                                <li><a href="#">FAQ’s</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Quock Shop</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">T-Shirt</a></li>
                                <li><a href="#">Mens</a></li>
                                <li><a href="#">Womens</a></li>
                                <li><a href="#">Gift Cards</a></li>
                                <li><a href="#">Shoes</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Policies</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Terms of Use</a></li>
                                <li><a href="#">Privecy Policy</a></li>
                                <li><a href="#">Refund Policy</a></li>
                                <li><a href="#">Billing System</a></li>
                                <li><a href="#">Ticket System</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>About EShopper</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Company Information</a></li>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">Store Location</a></li>
                                <li><a href="#">Affillate Program</a></li>
                                <li><a href="#">Copyright</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-offset-1">
                        <div class="single-widget">
                            <h2>About EShopper</h2>
                            <form action="#" class="searchform">
                                <input type="text" placeholder="Your email address" />
                                <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                                <p>Get the most recent updates from <br />our site and be updated your self...</p>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2019 eShop.com Inc. All rights reserved.</p>
                    
                </div>
            </div>
        </div>
        
    </footer><!--/Footer-->
    

  
    <script src="{{asset('frontend/js/jquery.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('frontend/js/price-range.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>
</body>
</html>