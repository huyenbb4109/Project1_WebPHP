<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="cssthan.css">
    <title>Add new Staff</title>
    <?php
    include_once 'Phan_Quyen_admin.php';
    ?>
</head>
<body>

    <form name = "Registration" method="POST">
    <center class="register-form">
        <img src="./Images/logo.jpg" alt="">
        <H1>ADD NEW STAFF</H1>
        <div>
                    <input type="text" class="tuk" name="HoTen" placeholder="Full name" required>
        </div><br>
        <div>
                <input type="email" name="email" placeholder="Email" required>
        </div><br>
        <div>
                <input type="text" class="tuk" pattern="^0\d{9}$" name="Phone" placeholder="Phone number" required>
        </div><br>
        <div>
                <input type="text" class="tuk" name="UserName" placeholder="Username" required>
        </div><br>
        <div>
                <input type="password" name="PassWord" placeholder="Password" required>
        </div><br>
        <div>
        <?php
				$query = "SELECT * FROM `nhomnguoidung` where `IdNhom` <>1 order by `TenNhom` DESC";
				$sql = mysqli_query($connect,$query);
                echo "<select name='IdNhom' style='width: 355px; height: 35px; border-color: lightblue'>";
				while ($row = mysqli_fetch_array($sql)){
				echo '<option value=" '. $row['IdNhom']	.'">'. $row['TenNhom'] . "</option>";}
                echo '</select>';
			?>
        </div><br>
            <div>
            <select name="TinhTrang" style="width: 355px; height: 35px; border-color: lightblue">
				<option value="Active"> Active </option>
  				<option value="Inactive"> Inactive </option>
	        </select>
        </div><br>
        </table>
            <br>
            <input type="submit" name="submit" value="Tạo tài khoản mới" style="margin-top: -1px ;"> </br></br>
    </center>
    
    </form>
    <?php
include_once './connect.php';
// $userName="";
// $pass="";
// $phone="";
if(isset($_POST['HoTen'])){
    $HoTen=$_POST['HoTen'];
}
if(isset($_POST['email'])){
    $email=$_POST['email'];
}
if(isset($_POST['UserName'])){
    $userName=$_POST['UserName'];
}
if(isset($_POST['PassWord'])){
    $pass=md5($_POST['PassWord']);
}
if(isset($_POST['Phone'])){
    $phone=$_POST['Phone'];
}
if(isset($_POST['IdNhom'])){
    $IdNhom=$_POST['IdNhom'];
}
if(isset($_POST['TinhTrang'])){
    $TinhTrang=$_POST['TinhTrang'];
}

if(isset($userName)&& isset($pass) && isset($phone) && isset($email) && isset($HoTen)&& isset($IdNhom) && isset($TinhTrang)){
    $sql = "select * from nguoidung where UserName = '$userName'";
    $check = $connect->query($sql);
    $sql1 = "select * from nguoidung where email = '$email'";
    $check1 = $connect->query($sql1);
    $sql2 = "select * from nguoidung where SoDienThoai = '$phone'";
    $check2 = $connect->query($sql2);
    if(mysqli_num_rows($check) > 0){
        echo '<script>alert ("UserName already exists")</script>';
        die();
    }
    else if(mysqli_num_rows($check1) > 0){
        echo '<script>alert ("Email already exists")</script>';
        die();
    }else if(mysqli_num_rows($check2) > 0){
        echo '<script>alert ("Phone number already exists")</script>';
        die();
    }
    else{
    $Insert = "insert into nguoidung (Hoten,email,SoDienThoai,username,pass,IdNhom,TinhTrang) values ('$HoTen','$email',$phone,'$userName','$pass','$IdNhom','$TinhTrang')";
    if($connect!=null){
        $kq=$connect->query($Insert);
        $connect->close();  
        echo '<script>alert ("Register successfull")</script>';
    }}
}
?>
</body>
</html>