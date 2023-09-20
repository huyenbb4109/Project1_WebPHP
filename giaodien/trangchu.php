<?php
   if (session_id() === '') session_start();
   include_once 'Connect.php';
   $sql = "select * from `Contactus` where `idC`=1";
   $query = mysqli_query($connect, $sql);
   while ( $data = mysqli_fetch_array($query) ) {
       $phone = $data["phone"];
       $email = $data["email"];
       $address = $data["address"];
       $iframe = $data["iframe"];
   }
?>
<!doctype html>
<html >
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PINNCALE GEMS</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <script src="js/countdown.js"></script>

    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Owl Carousel min css -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="css/custom.css">
    <!-- slide-->
    <link rel="stylesheet" href="css/shortcode/slider.css">

    <link rel="stylesheet" href="css/shortcode/header.css">

    <link rel="stylesheet" href="css/sale.css">
    <!-- Modernizr JS -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>

    <script type="text/javascript" src="js/demo.js"></script>

    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <!-- heover ảnh  -->
    <link rel="stylesheet" href="css/shortcode/hoveranh.css">

<!-- -------------------------------------------------------------------------------------------------- -->
<script src="js/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap framework js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- All js plugins included in this file. -->
    <script src="js/plugins.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <!-- Waypoints.min.js. -->
    <script src="js/waypoints.min.js"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="js/main.js"></script>

    <script>
                            checkout_array = {};
                           load_checkout = function(){
                                checkout_string = [];
                                $.each(checkout_array,function(index, val){
                                    checkout_string.push(index+"="+val);
                                });
                                checkout_string = checkout_string.join("&");
                                $.ajax({
                                    url:"../Than/checkout_session.php",
                                    type:'post',
                                    data:checkout_string,
                                    dataType:'json',
                                    async:true,
                                    success:function(kq){
}
                                });

                                pattern = "";
                                for (var key in checkout_array){
                                    sosanh_id = $(".sosanh[data-id='"+key+"']").attr("data-id");
                                    sosanh_name = $(".sosanh[data-id='"+key+"']").attr("data-name");   
                                    sosanh_img = $(".sosanh[data-id='"+key+"']").attr("data-img");                                       
                                    pattern = pattern + 
                                    "+<div class='shp__single__product' data-id='"+sosanh_id+"'>"+
                                        "<div class='shp__pro__thumb'>"+
                                            "<a href='#'>"+
                                            "<img src='"+sosanh_img+"'>"+
                                            "</a>"+
                                        "</div>"+
                                        "<div class='shp__pro__details'>"+
                                            "<h2><a href='product-details.html'>"+sosanh_name+"</a></h2>"+
                                            "<span class='quantity' style='color: #000000;'>Mã: PNJ SPXMW000242 </span>"+
                                            "<span class='shp__price'>$105.00</span>"+
                                        "</div>"+
                                        "<div class='remove__btn'>"+
                                            "<a href='#' title='Remove this item'><i class='zmdi zmdi-close'></i></a>"+
                                        "</div>"+
                                    "</div>";
                                }
                                $(".shp__cart__wrap").html(pattern);
                            }

                            $(document).on('click','.sosanh',function(e){
                                id = $(this).attr("data-id");
                                if(typeof checkout_array[id] !== 'undefined'){
                                    checkout_array[id] = checkout_array[id] + 1;
                                }else{
                                    checkout_array[id] = 1;
                                }
                                load_checkout();

                                e.preventDefault();
                        
                                if($(this).hasClass('disable')){
                                    return false ;
                                }
                                // $(this).addClass('disable');
                                $(document).find('.sosanh').addClass('disable');
                                
                                var seft = $(this);                     
                                var parent = $(this).parents('.category');
                                var cart = $(document).find('#cart-shop');
                                var src = parent.find('img').attr('src');
var parTop = parent.offset().top;
                                var parLeft = parent.offset().left;
                                $('<img />',{
                                    class: 'img-product-fly',
                                    src: src
                                }).appendTo('body').css({
                                    'top'  :parTop,
                                    'left'  : parseInt(parLeft) + parseInt(parent.width()) - 50
                                });
                                setTimeout(function(){
                                    $(document).find('.img-product-fly').css({
                                        'top'  :  cart.offset().top ,
                                        'left' :  cart.offset().left
                                    });
                                    setTimeout(function(){
                                        $(document).find('.img-product-fly').remove();
                                        var citem = parseInt(cart.find('#count-item').data('count'))+1;
                                        cart.find('#count-item').text(citem+' Item').data('count',citem);
                                        $(document).find('.sosanh').removeClass('disable');                                              
                                    },1000);
                                },500);
                                
                            });
                        </script>

    <style>
        /* body{
            position: relative;

        } */
        .img-product-fly{
            position: absolute;
            z-index: 99999999;
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 100%;
            border: 2px solid red;
            transition: all 1s ease;
            animation: myanimation 1.5s ;
        }
        @keyframes myanimation {
            0%   {transform:scale(0.4)}
            25%  {transform:scale(1)}
            50%  {transform:scale(1)}
            100% {transform:scale(0.4)}
}
        </style>
</head>

<body >

    <!-- Body main wrapper start -->
    <div class='grid_12'>
        <div class="hotline_email"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a style="color: white;" href="tel:034 789 1247"><i class="fa fa-volume-control-phone" aria-hidden="true"></i> 034 789 1247</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a style="color: white;" href="mailto:<?php echo $email?>"><i class="fa fa-envelope-o" aria-hidden="true"></i> <?php echo $email?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <!-- <a style="color: white;" href="mailto:sale@web3c.net"><i class="fa fa-envelope-o" aria-hidden="true"></i> vungocanhqwe@gmail.com</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
        <!-- <div class="grid_13"> -->
                    <i class="icon-social-twitter icons"></i>&nbsp;&nbsp;&nbsp;
                    <i class="icon-social-instagram icons"></i>&nbsp;&nbsp;&nbsp;
                    <i class="icon-social-facebook icons"></i>&nbsp;&nbsp;&nbsp;
                    <i class="icon-social-google icons"></i>&nbsp;&nbsp;&nbsp;
                    <i class="icon-social-linkedin icons"></i>
        </div>
           </div>

        <div class="wrapper">
        <!-- Start Header Style -->
        <header id="htc__header" class="htc__header__area header--one" style="background-color: white;">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="menumenu__container clearfix" style="margin-top: -10px;" >                            
                            <h2 class="lolo"> <i class="fa fa-diamond" style="color: #000000;"></i> JEWELRY PINNCALE  GEMS <i class="fa fa-diamond" style="color: #000000;"></i></h2>
                            <h5 class="lolo1"><b>Perfect  </b>  Highlight for Perfect <b>Beauty</b></h5>

                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5"> 
                                <div class="logo">
                                     <a href="?option=home"><img src="images/anhprojech/logo.jpg" alt="logo images"></a>
                                </div>
                            </div>
                            
                            <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                                <nav class="main__menu__nav hidden-xs hidden-sm" style="margin-top: 0px;">
                                    <ul class="main__menu">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <li class="drop"><a href="?option=home">Home</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <li class="drop"><a href="?option=aboutus">About us</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </li>
                                        <li class="drop"><a >product</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <ul class="dropdown mega_dropdown">
                                                <!-- Start Single Mega MEnu -->
                                                <li><a class="mega__title" href="?option=SP">Diamond</a>
                                                    <ul class="mega__item">
                                                     
                                                    <a href="#" class="anhmenu"><img src="images/anhprojech/dimod.jpg" alt="logo images"></a>
                                                    </ul>
                                                    
                                                </li>
                                                <!-- End Single Mega MEnu -->
                                                <!-- Start Single Mega MEnu -->
                                                <li><a class="mega__title" href="?option=SP1" style="margin-left: 20px;">Ruby</a>
                                                    <ul class="mega__item">
                                                       
                                                        <a href="#" class="anhmenu"><img src="images/anhprojech/ruby.jpg" alt="logo images"></a>  
                                                    </ul>
                                                </li>
                                                <!-- End Single Mega MEnu -->
                                                <!-- Start Single Mega MEnu -->
                                                <li><a class="mega__title" href="?option=SP2">Sapphire</a>
                                                    <ul class="mega__item">
                                                        
                                                        <a href="#" class="anhmenu"><img src="images/anhprojech/sapphire.jpg" alt="logo images"></a>  
                                                    </ul>
                                                </li>
                                              
                                            </ul>
                                        </li>
                                        <!--/////////////////////-->
                                        <li class="drop"><a>Product type</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <ul class="dropdown">
                                                <li><a href="?option=productsale">Product Sale</a></li>
                                                <li><a href="?option=productnew">New Product</a></li>
                                            </ul>
                                        </li>   
                                        <!--//////////////////////-->                                                      
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<li class="drop"><a href="?option=contactus2">Contact</a></li>
                                    </ul>
                                </nav>

                                <div class="mobile-menu clearfix visible-xs visible-sm">
                                    <nav id="mobile_dropdown">
                                        <ul>
                                            <li><a href="?option=home">Home</a></li>
                                            <li><a href="?option=aboutus">About Us</a></li>
                                            <li><a>Product</a>
                                                <ul>
                                                    <li ><a href="?option=SP">Diamond</a>
                                                        
                                                    </li>
                                                    <li><a href="?option=SP1">Ruby</a>
                                                        </li>
                                                    <li><a href="?option=Sp2">Sapphire</a>
                                                        </li>
                                                    
                                                </ul>
                                            </li>
                                            <li><a href="?option=contactus2">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>  
                            </div>
                            

                            
                            <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                                <div class="header__right">
                                    <div class="header__search search search__open">
                                        <a href="#" style="margin-right: -15px;"><i class="icon-magnifier icons"></i></a>
                                    </div>
                                            <!-- <nav class="main__menu__nav hidden-xs hidden-sm"> -->
                                                <ul class="main__menu">
                                                    <li class="drop">   
                                                        <div class="header__account">
                                                                <a href="#"style="margin-right: -5px;" ><i class="icon-user icons"></i></a>
                                                                        
                                                            <ul class="dropdown" style="margin-top: 10px;">
                                                                <li>Customer: <?php echo $_SESSION["HoTen"];?></li>
                                                                <li><a href="Login_Customer.php">Login</a></li>
                                                                <li><a href="register.php">Register</a></li>
                                                            </ul>
                                                        </div>
                                                    </li> 
                                                    
                                                </ul>
                                            <!-- </nav> -->
                                       
                                    <div class="htc__shopping__cart">
                                        <a class="cart__menu" href="#"><i id="cart-shop" class="icon-heart icons"><span id="count-item" data-count="0" class="htc__qua">0</span></i></a>
                                        <!-- <a href="#"><span class="htc__qua">2</span></a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div style="margin-right: -20px;" class="mobile-menu-area"></div>
                </div>
            </div>
             <!-- End Mainmenu Area -->
        </header>
        <!-- End Header Area -->

        
            <!-- Start Search Popap -->
            <div class="search__area" >
                <div class="container" >
                    <div class="row" >
                        <div class="col-md-12" >
                            <div class="logo__search">
                                <a href="demo.html"><img src="images/anhprojech/logo.jpg" alt="logo images"></a>
                            </div>
                            <div class="search__inner">
                               <!-- -------timkiem---------- -->
                                <form>
                                    <input placeholder="Search here... " type="text" class='search_text'>
                                    <button type="button" class="search_ok"></button>
                                </form>
                                <!-- ----timkiem--- -->
                                <script src="../giaodien/js/khong_dau.js"></script>
                                <script>
                                    $(document).ready(function(){
                                        $(".search_text").on("keyup",function(){
                                            $(".list_item").show();                                            
                                            name = khong_dau($(this).val());                                           
                                            if(name!=""){
                                                for (i = 0; i < $(".list_item").length; i++) {
                                                    attr =  khong_dau($(".list_item").eq(i).attr("data-name"));
                                                    if(attr.indexOf(name) < 0){
                                                        $(".list_item").eq(i).hide();
                                                    };
                                                }                                                
                                            }else{
                                                $(".list_item").show();
                                            }
                                            
                                        });
                                    });
                                </script>
                                
                                
                                <div class="search__close__btn">
                            
                                    <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                                </div>                              
                            </div>
                        </div>
                    </div>
                </div>
                <script src="js/main.js"></script>
            </div>
            
            <!-- End Search Popap -->
            <!-- Start Cart Panel -->
            <div class="shopping__cart">
                <div class="shopping__cart__inner">
                    <div class="offsetmenu__close__btn">
                        <a href="#"><i class="zmdi zmdi-close"></i></a>
                    </div>
                    <div class="shp__cart__wrap">
                        <div class="shp__single__product">
                            <div class="shp__pro__thumb">
                                <a href="#">
                                    <!-- <img src="images/anhprojech/nhan3.png" > -->
                                </a>
                            </div>
                            <!-- <div class="shp__pro__details">
                                <h2><a href="product-details.html">Nhẫn vàng trắng 14K đính đá shapphire</a></h2>
                                <span class="quantity" style="color: #000000;">Mã: PNJ SPXMW000242 </span>
                                <span class="shp__price">$105.00</span>
                            </div> -->
                            <div class="remove__btn">
                                <!-- <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a> -->
                            </div>
                        </div>
                        <div class="shp__single__product">
                            <div class="shp__pro__thumb">
                                <a href="#">
                                    <!-- <img src="images/anhprojech/bongtai1.png"> -->
                                </a>
                            </div>
                            <!-- <div class="shp__pro__details">
                                <h2><a href="product-details.html">Bông tai vàng 18K đính đá sapphire</a></h2>
                                <span class="quantity" style="color: #000000;">Mã: PNJ SPDDC000003 </span>
                                <span class="shp__price">$120.00</span>
                            </div> -->
                            <div class="remove__btn">
                                <!-- <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a> -->
                            </div>
                        </div>
                    </div>
                    <ul class="shoping__total">
                        <!-- <li class="subtotal">Subtotal:</li>
                        <li class="total__price">$225.00</li> -->
                    </ul>
                    <ul class="shopping__btn">
                        <!-- <li><a href="cart.html">View Cart</a></li> -->
                        <li class="shp__checkout"><a href="?option=favorrite">Compare</a></li>
                    </ul>
                </div>
                <script src="js/main.js"></script>
            </div>
             <article >
                 <?php
                    
                    if(isset($_GET['option'])){
                        if(file_exists($_GET['option'].".php")){
                          ob_start();
                          require $_GET['option'].".php";
                          echo ob_get_clean();
                        }else{
                          ob_start();
                          require "home.php";
                          echo ob_get_clean();
                        }                 
                    }else{
                      ob_start();
                      require "home.php";
                      echo ob_get_clean();
                    }
                
                ?>

                    


             </article>

             <footer id="htc__footer">
            <!-- Start Footer Widget -->
            <div class="footer__container bg__cat--1">
                <div class="container">
                    <div class="row">
                        <!-- Start Single Footer Widget -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="footer">
                                <h2 class="title__line--2">ABOUT US</h2>
                                <div class="ft__details">
                                <p>Women always deserve the fullest things for their lives: Complete happiness, complete beauty and much more. PINNACLE is more than a jewelry brand, but also represents a lifestyle of the most worthy values ​​for women.</p>
                                    <div class="ft__social__link">
                                        <ul class="social__link">
                                            <li><a href="#"><i class="icon-social-twitter icons"></i></a></li>

                                            <li><a href="#"><i class="icon-social-instagram icons"></i></a></li>

                                            <li><a href="#"><i class="icon-social-facebook icons"></i></a></li>

                                            <li><a href="#"><i class="icon-social-google icons"></i></a></li>

                                            <li><a href="#"><i class="icon-social-linkedin icons"></i></a></li>
                                        </ul><br/>
                                        <a style="color: white;" href="tel:034 789 1247"><i class="fa fa-volume-control-phone" aria-hidden="true"></i> 034 789 1247</a><br/>
                                        <a style="color: white;" href="tel:0123456789"><i aria-hidden="true"></i>&nbsp;&nbsp; 0123 456 789</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Footer Widget -->
                        <!-- Start Single Footer Widget -->
                        <div class="col-md-2 col-sm-6 col-xs-12 xmt-40">
                            <div class="footer">
                            <h2 class="title__line--2">product</h2>
                                <div class="ft__inner">
                                    <ul class="ft__list">
                                        <li><a href="?option=SP">Dimond</a></li>
                                        <li><a href="?option=SP1">Ruby</a></li>
                                        <li><a href="?option=Sp2">Sapphire</a></li>
                                        
                                    
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Footer Widget -->
                        <!-- Start Single Footer Widget -->
<div class="col-md-2 col-sm-6 col-xs-12 xmt-40 smt-40">
                            <div class="footer">
                            <h2 class="title__line--2">My Account</h2>
                                <div class="ft__inner">
                                    <ul class="ft__list">
                                        <li><a href="#">Account</a></li>
                                        <li><a href="?option=favorrite">Favourite</a></li>
                                        <li><a href="#">Login</a></li>
                                        <li><a href="?option=contactus2">Contact</a></li>
                                        <!-- <li><a href="checkout.html">Checkout</a></li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Footer Widget -->
                        <!-- Start Single Footer Widget -->
                        <div class="col-md-2 col-sm-6 col-xs-12 xmt-40 smt-40">
                            <div class="footer">
                            <h2 class="title__line--2">Our service</h2>
                                <div class="ft__inner">
                                    <ul class="ft__list">
                                        <li><a href="?option=home">Account</a></li>
                                        <li><a href="?option=contactus2">Location</a></li>
                                        <li><a href="#">Login/Register</a></li>
                                        <li><a href="*">Wishlist</a></li>
                                        <li><a href="#">Customer Care</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Footer Widget -->
                        <!-- Start Single Footer Widget -->
                        <div class="col-md-3 col-sm-6 col-xs-12 xmt-40 smt-40">
                            <div class="footer">
                                <h2 class="title__line--2">NEWSLETTER </h2>
                                <div class="ft__inner">
                                    <div class="news__input">
                                        <input type="text" placeholder="Your Mail*">
                                        <div class="send__btn">
                                            <a class="fr__btn" href="#">Send Mail</a>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- End Single Footer Widget -->
                    </div>
                </div>
            </div>
            <!-- End Footer Widget -->
<!-- Start Copyright Area -->
            <div class="htc__copyright bg__cat--5">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="copyright__inner">
                            <p><a href="#"><i style="color:white" class="fas fa-map-marker" aria-hidden="true"></i> 285 Đội Cấn, Vĩnh Phú, Ba Đình, Hà Nội. </a></p>
                                <a href="#"><i class="fa fa-cc-visa" style="margin-right: 20px; color: white; height: 5px;"></i>
                                    <i class="fa fa-credit-card" style="margin-right: 20px; color: white; height: 5px;"></i>
                                    <i class="fa fa-cc-discover" style="margin-right: 20px;color: white;height: 5px;"></i>
                                    <i class="fa fa-cc-jcb" style="margin-right: 20px;color: white;height: 5px;"></i>
                                    <i class="fa fa-cc-mastercard" style="margin-right: 20px;color: white; height: 5px;"></i>
                                    <i class="fa fa-cc-paypal" style="margin-right: 20px;color: white; height: 5px;"></i>
                                </a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Copyright Area -->
        </footer>

                    
    
        <script src="js/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap framework js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- All js plugins included in this file. -->
    <script src="js/plugins.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <!-- Waypoints.min.js. -->
    <script src="js/waypoints.min.js"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="js/main.js"></script>
    <!-- Hover ảnh -->
    <link rel="stylesheet" href="css/shortcode/hoveranh.css">

</body>
</html>