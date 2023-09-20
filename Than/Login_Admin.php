<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="cssthan/register.css">
    <link rel="stylesheet" type="text/css" href="cssthan/style.css">
    <title>LOGIN</title>
    <?php
    session_start();
    include_once './connect.php';
    $u="";
    $p="";
    if(isset($_POST['remember'])){
        setcookie("UserName",$_POST["UserName"],time()+86400);
        setcookie("PassWord",$_POST["PassWord"],time()+86400);
    }
    if (isset($_POST['login'])){
        $u = $_POST["UserName"];
        $p = $_POST["PassWord"];
        		//làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
                //mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
        $u = strip_tags($u);
    	$u = addslashes($u);
	    $p = strip_tags($p);
	    $p = addslashes($p);
        $p = md5($p);
        if(isset($u)&&isset($p)){
            $sql = "select * from  `nguoidung` where `UserName` = '$u' and `Pass` = '$p' and `IdNhom` <> 1 and `TinhTrang` ='Active'";
            $query = mysqli_query($connect,$sql);
            $num_row = mysqli_num_rows($query);
            // echo $sql;
            if($num_row==0){
                echo '<script>alert ("Username or password incorrect")</script>';
                $_SESSION["UserName"]=NULL;
            }else{
                while ( $data = mysqli_fetch_array($query) ) {
                $_SESSION["UserName"]=$data["username"];
                $_SESSION["Password"]=$data["pass"];
                $_SESSION["IdNhom"]=$data["IdNhom"];
                $_SESSION["HoTen"]=$data["Hoten"];
                $_SESSION["TinhTrang"]=$data["TinhTrang"];
            }
            header('Location: index.php');
            }
        }
        }
?>
</head>
<body>
    <div class="login-box">
    <h2>LOGIN ADMIN</h2>
    <form action="Login_admin.php" method="POST">
    <div class="user-box">
            <input type="text" name="UserName" value="<?php echo isset($_COOKIE['UserName'])?$_COOKIE['UserName']:"";?>" required>
            <label>UserName</label>
          </div>

          <div class="user-box">
          <input type="password" name="PassWord" value="<?php echo isset($_COOKIE['PassWord'])?$_COOKIE['PassWord']:"";?>" required>
            <label>Password</label>
          </div>
          <div class="remember">
          <input type="checkbox"  >
             <small>Remember Me</small>
            
            </div>
          <a href="#" style="margin-top: -1px; height: 40px; width: 120px;">
          <input type="submit" name="login" value="LOGIN" class="login-sub">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </a>
    </form>
</div>

</body>
</html>