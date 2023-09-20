<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <title>Login</title>
    <link rel="stylesheet" href="css/loginform1.css">
    <?php
    session_start();
    include_once 'Connect.php';
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
            $sql = "select * from  `nguoidung` where `username` = '$u' and `pass` = '$p' and `IdNhom` = 1 and `TinhTrang` ='Active'";
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
                $_SESSION["email"]=$data["email"];
                $_SESSION["phone"]=$data["SoDienThoai"];
            }
    // Link client sửa ở đây
            header('Location: trangchu.php');
            }
        }
        }
?>
  </head>
  <body>

      <section class="login py-5 bg-light">
          <div class"container">
              <div class="row g-0">
                  <div class="col-lg-5">
                    <!-- Link ảnh sửa tại đây -->
                       <img src="images/background-login.jpg" class="img-fluid" alt="backgroundLogin">

                  </div>
                  <div class="col-lg-7 text-center py-5">
                      <h1 class="animate__animated animate__heartBeat animate__infinite"> Welcome To PINNACLE</h1>
                    <form method="POST">
                        <div class="form-row py-3 pt-5">
                            <div class="offset-1 col-lg-10">
                                <input type="text" class="inp px-3" name="UserName" value="<?php echo isset($_COOKIE['UserName'])?$_COOKIE['UserName']:"";?>" placeholder="UserName" required>
                            </div>
                        </div>
                        <div class="form-row py-3">
                            <div class="offset-1 col-lg-10">
                                <input type="password" class="inp px-3" placeholder="Password" name="PassWord" value="<?php echo isset($_COOKIE['PassWord'])?$_COOKIE['PassWord']:"";?>" required>
                            </div>
                        </div>
                        <div class="remember">
                        <input type="checkbox"  >
                            <small>Remember Me</small>
            
                        </div>
                        <div class="form-row py-3">
                            <div class="offset-1 col-lg-10">
                                <input class="btn1" type="submit" name="login" value="LOGIN">
                            </div>
                        </div>
    
                    </form>
                             <br/>
                    <div class="remember1">
                    <!-- Link register chỉnh ở đây -->
                    <a href="register.php">Register</a></div>
                  </div>
              </div>   
          </div>
      </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>