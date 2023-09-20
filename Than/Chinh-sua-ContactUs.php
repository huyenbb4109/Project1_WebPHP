<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="cssthan/style.css">
    <title>Document</title>
    <style>
        .tuk2{

            width:600px;
            padding: 7.5px 15px;
            height: 40px;
            border: 1px solid #cccccc;
            
            
            /* width: 500px;
            outline: none;
            font-size: 16px;
            display: inline-block;
            height: 40px;
            color: #666666; */
        }
        .divtuk{
            margin-top:50px;
            border: 0px dotted #9D9FA0;
            width: 710px;
            margin-left: 300px;
            
        }
        
    </style>
    <?php
    include_once 'Phan_Quyen_admin.php';
    
    if (isset($_SESSION["IdNhom"]) == FALSE) {
        header('Location: Login_Admin.php');
			if ($_SESSION["IdNhom"]<>0 && $_SESSION["TinhTrang"]<>"Active"){
				header('Location: Login_Admin.php');
			}
	}	        
    ?>
</head>
<body>
    <?php
    if (isset($_POST["submit"])) {
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $iframe = $_POST["iframe"];
        $sql = "update `ContactUs` set `phone` = '$phone', `email` = '$email', `address`='$address', `iframe`='$iframe'	where `idC` = 1";
        mysqli_query($connect, $sql);
        echo '<script>alert ("Update successfully")</script>';
    }

    $sql = "select * from `Contactus` where `idC`=1";
    $query = mysqli_query($connect, $sql);
    while ( $data = mysqli_fetch_array($query) ) {
        $phone = $data["phone"];
        $email = $data["email"];
        $address = $data["address"];
        $iframe = $data["iframe"];  
    }
    ?>
    <div class="divtuk">
    
        <h3 style="text-align: center;"><b>Contact Us</b></h3>
        <form method="POST" name="Chinh-sua-ContactUs" class="formtuk2" ">
                <table class="table">
                    <tr class="tuktr"><td><h5 ><b>Phone</b></h5></td><td><input type="text" class="tuk2" name="phone" value="<?php echo $phone; ?>"></td></tr>
                    <tr class="tuktr"><td><H5><b>Email</b></H5></td><td><input type="text" class="tuk2" name="email" value="<?php echo $email; ?>"></td></tr>
                    <tr class="tuktr"><td><H5><b>Address</b></H5></td><td><input type="text" class="tuk2" name="address" value="<?php echo $address; ?>"></td></tr> 
                    <tr class="tuktr"><td><H5 ><b>Iframe Google Map</b></H5></td><td><input type="text" class="tuk2" style="width:586px" name="iframe" value="<?php echo $iframe;?>"></td></tr> 
                    <tr class="tuktr"><td colspan="2" style="text-align: center;">
                        <input type="submit" name="submit" value="Submit">
                        <a href="InfoStaff.php"><input type="button" value="Back"></a>
                        </td></tr>
        </form>
    </div>

</body>
</html>