<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/register1.css">
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php session_start();?>
</head>
<body>
    <div class="login-box">
      <!-- <center><img src="./Images/logo.jpg" alt=""></center> -->
        <h2>Register</h2>
        <form name = "Registration" method="POST">
          <div class="user-box">
            <input type="text" name="HoTen" required>
            <label>Full Name</label>
          </div>

          <div class="user-box">
            <input type="email" name="email" required>
            <label>Email</label>
          </div>

          <div class="user-box">
            <input type="text" pattern="^0\d{9}$" name="Phone" required>
            <label>Phone number</label>
          </div>

          <div class="user-box">
            <input type="text" name="UserName" required>
            <label>UserName</label>
          </div>

          <div class="user-box">
            <input type="password" pattern="^[a-z0-9_-]{6,}$" name="PassWord"   >
            <label>Password</label>
          </div>
          <div class="user-box">
            <input type="password" pattern="^[a-z0-9_-]{6,}$" name="PassWord2" required>
            <label>Confirm Password</label>
          </div>

          <!-- <div class="remember">
          <input type="checkbox"  >
             <small>Remember Me</small>
            
            </div> -->
            <center>
            <div>  
</br> 
          <a href="#" style="margin-top: -1px ;">
          <input type="submit" name="submit" value="Register" class="remember2">

            <span></span>
            <span></span>
            <span></span>
            <span></span>
          </a>
            </div>
            
          </center>   
          </form>    
          <center>
          <p style="color: white;">Have you a account?<a href="Login_Customer.php">LOGIN</a></p>
          </center> 
      </div>
      <?php
include_once 'connect.php';
$pass2="";

if(isset($_POST['HoTen'])){
    $HoTen=$_POST['HoTen'];
}
if(isset($_POST['email'])){
    $email=$_POST['email'];
}
if(isset($_POST['UserName'])){
    $userName=$_POST['UserName'];
    $userName = strip_tags($userName);  // Báo sửa
    $userName = addslashes($userName);  // Báo sửa 
}
if(isset($_POST['PassWord'])){
    $pass=($_POST['PassWord']);
    $pass = strip_tags($pass); // Báo sửa 
    $pass = addslashes($pass);  // Báo sửa
    $pass = md5($pass);          // Báo sửa
}
if(isset($_POST['Phone'])){
    $phone=$_POST['Phone'];
}
if(isset($_POST['Password2'])){
  $pass2=md5($_POST['Password2']);
}

if(isset($userName)&& isset($pass) && isset($phone) && isset($email) && isset($HoTen)&& isset($pass2)){
    $sql = "select * from nguoidung where UserName = '$userName'";
    $check = $connect->query($sql);
    $sql1 = "select * from nguoidung where email = '$email'";
    $check1 = $connect->query($sql1);
    $sql2 = "select * from nguoidung where SoDienThoai = '$phone'";
    $check2 = $connect->query($sql2);
    if(mysqli_num_rows($check) > 0){
        echo '<script>alert ("UserName đã tồn tại")</script>';
        die();
    }
    else if(mysqli_num_rows($check1) > 0){
        echo '<script>alert ("Email đã tồn tại")</script>';
        die();
    }else if(mysqli_num_rows($check2) > 0){
        echo '<script>alert ("Số điện thoại đã tồn tại")</script>';
        die();
    }else if($_POST['PassWord']<>$_POST['PassWord2']){
        echo '<script>alert ("Mật khẩu nhập lại không đúng")</script>';
        die();
      }
    else{
    $Insert = "insert into nguoidung (Hoten,email,SoDienThoai,username,pass) values ('$HoTen','$email',$phone,'$userName','$pass')";
    if($connect!=null){
        $kq=$connect->query($Insert);
        $connect->close();  
        header('Location: Confirm_register.php');
    }}
}
?>    
      
</body>
</html>





 
