<!DOCTYPE html >
    <html >
        <head>
            <meta http-equiv="Content-Type"content="text/html; charset=utf-8"/>
            <meta name="viewport"content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
            <title>Contact Us</title>
            <link href="css/style12.css"rel="stylesheet"type="text/css"/>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">
            <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="stylesheet" href="3dcube3.css">

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

        </head>
        <body>
            <?php
            if(isset($_POST['submit'])){
                $name = $_POST['name'];
            $email1 = $_POST['email'];
                $phone1 = $_POST['phone'];
                $message = $_POST['message'];
                $message = strip_tags($message);
                $message = addslashes($message);
                $email = strip_tags($email);
                $email = addslashes($email);
                $phone = strip_tags($phone);
                $phone = addslashes($phone);
            }
            if(isset($name)&& isset($email1) && isset($phone1) && isset($message)){
            $Insert = "insert into message (name,email,phone,message) values ('$name','$email1',$phone1,'$message')";
            if($connect!=null){
                $kq=$connect->query($Insert);    }
                
            }
            ?>
            
    <!-- Thân sửa -->
            <div class="contact-wrap">
                <div class="contact-in">
                    <h1>Contact Us</h1>
                    <h2 style="color: aliceblue;"><i class="fa fa-phone" aria-hidden="true"></i> Phone</h2>
                    <p><a style="color: aliceblue;" href="tel:<?php echo $phone;?>"><?php echo $phone;?></a></p>
                    <h2 style="color: aliceblue;"><i class="fa fa-envelope" aria-hidden="true"></i> Email</h2>
                    <p><a style="color: aliceblue;" href="mailto:<?php echo $email;?>"><?php echo $email;?></a></p>
                    <h2 style="color: aliceblue;"><i class="fa fa-map-marker" aria-hidden="true"></i> Address</h2>
                    <p style="color: aliceblue;"><?php echo $address;?></p>
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-google" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
                <div class="contact-in">
                    <h1>Send a Message</h1>
                    <form name = "message" method="POST">
                        <input type="text" name="name" value="<?php if(isset($_SESSION['HoTen'])){echo $_SESSION['HoTen'];}?>" placeholder="Full Name" required class="contact-in-input">
                        <input type="text" name="email" value="<?php if(isset($_SESSION['email'])){echo $_SESSION['email'];}?>" placeholder="Email" required class="contact-in-input">
                        <input type="text" name="phone" value="<?php if(isset($_SESSION['phone'])){echo $_SESSION['phone'];}?>" placeholder="Phone" required class="contact-in-input">
                        <textarea name="message" placeholder="Message" class="contact-in-textarea" required></textarea>
                        <input type="submit" value="SUBMIT" name="submit" class="contact-in-btn">
                    </form>
                </div>
<div class="contact-in">
                    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59826.459871218816!2d106.13187726965378!3d20.41775355100165!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135e0adb8d5f1cd%3A0xb5f4baba00e67462!2zVHAuIE5hbSDEkOG7i25oLCBOYW0...!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> -->
                    <?php echo $iframe;?>
                </div>
            </div>
            

                        
        
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
