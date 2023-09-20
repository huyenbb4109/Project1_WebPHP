<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PINNCALE GEMS</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    

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
    <script src="js/countdown.js"></script>
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
    
          <br/><br/>
    <!-- Body main wrapper start -->
    
            <!-- End Cart Panel -->
                   
                    <div class="slideshow-container">

                        <div class="mySlides ">
                          <a href="?option=home"><img class="slideshow" src="images/anhprojech/slide2.jpg"  ></a>
                        </div>                                               
                        <div class="mySlides">                         
                          <a href="?option=productsale"><img class="slideshow" src="images/anhprojech/slide1.jpg" >  </a>                      
                        </div>                        
                        <div class="mySlides">                       
                          <a href="?option=productnew"><img class="slideshow" src="images/anhprojech/slide5.jpg">  </a>                      
                        </div>                      
                        </div>                         
                         <!-- <a class="prev" onclick="plusSlides(-5)">&#10094;</a>
                        <a class="next" onclick="plusSlides(1)">&#10095;</a> -->

                        
                        <div style="text-align:center;">
                            <span class="dot" ></span> 
                            <span class="dot" ></span>  
                            <span class="dot" ></span> 
                        </div>
                        <!-- <script type="text/javascript" src="js/demo.js"></script>  -->
                    </div>
                    
                    <!-- <script>
            
                        var slideIndex;
                    
                        function showSlides() {
                            var i;
                            var slides = document.getElementsByClassName("mySlides");
                            var dots = document.getElementsByClassName("dot");
                            for (i = 0; i < slides.length; i++) {
                               slides[i].style.display = "none";  
                            }
                            for (i = 0; i < dots.length; i++) {
                                dots[i].className = dots[i].className.replace(" active", "");
                            }
                       
                            slides[slideIndex].style.display = "block";  
                            dots[slideIndex].className += " active";
                    
                            slideIndex++;
                        
                            if (slideIndex > slides.length - 1) {
                              slideIndex = 0
                            }    
                            
                            setTimeout(showSlides, 2000);
                        }
                        
                        showSlides(slideIndex = 0);
                       
                        function currentSlide(n) {
                          showSlides(slideIndex = n);
                        }
                      </script> -->

<!---------------------------------------------------------------------------------------------------------------------------- -->         

<!---------------------------------------------------------------------------------------------------------------------------- -->                   
    
                <!-- <div id="cart-shop" style="margin-left: 80%;"> <img src="images/anhprojech/iconsale.jpg">Danh mục yêu thích:  <span id="count-item" data-count="0">0 Item</span></div> -->
        <section class="htc__category__area ptb--100 back">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">New Arrivals</h2>
                            <p>But I must explain to you how all this mistaken idea</p>
                        </div>
                    </div>
                </div>
                <div class="htc__product__container">
                    <div class="row">
                        <div class="product__list clearfix mt--30">
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
                        <?php 
                            require("home_fill.php");
                        ?>                        
                </div>
            </div>
        </div>
    </div>
</section>

<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
           

                    
    
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