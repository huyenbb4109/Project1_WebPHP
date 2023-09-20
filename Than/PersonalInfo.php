<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="cssthan/style.css">
    <title>Personal Information</title>
	<?php
	include_once 'Phan_Quyen_Nhan_Vien.php';
	?>
	<style>
.container {
    width: 500px;
    height: 50%;
    margin: 50px auto;
    display: flex;
}
/* Định dạng phần form đăng nhập */
.fomrgroup {
    width: 50%;
    height: 50%;
    margin: auto;
}
/* The Modal (background) */
.modal {
    display: none; /* mặc định được ẩn đi */
    position: fixed; /* vị trí cố định */
    z-index: 1; /* Ưu tiên hiển thị trên cùng */
    padding-top: 100px; 
    margin: auto;
    width: 30%;
    height: 100%; 
    overflow: auto;
    background-color: rgb(0,0,0); 
    background-color: rgba(0,0,0,0.4); 
}
Modal Content */
.modal-content {
    background-color: #fff  ;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 60%;
}
/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}
 
.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
	</style>
</head>
<body>
      	<?php
		    include_once 'Connect.php';
			$UserName = $_SESSION['UserName'];
		    	$sql = "select * from `nguoidung` where `username` = '$UserName'";
		    	$query = mysqli_query($connect, $sql);
		    	while ( $data = mysqli_fetch_array($query) ) {
		    		$Hoten = $data["Hoten"];
		    		$email = $data["email"];
		    		$phone = $data["SoDienThoai"];
					$pass = $data["pass"];
                    // $IdNhom = $data["IdNhom"];
					// $TenNhom = $data["TenNhom"];
					// $TinhTrang = $data["TinhTrang"];
                }
		    if (isset($_POST["submit"])) {
		    	// $UserName = $_SESSION['UserName'];
				$email = $_POST["email"];
                $phone = $_POST["phone"];
		    	$sql = "update `nguoidung` set `email` = '$email', `SoDienThoai` = '$phone'	where `username` = '$UserName'";
				echo $sql;
		    	mysqli_query($connect, $sql);
                echo '<script>alert ("You have successfully updated")</script>';
				// header('Location: Quan-Ly-nhan-vien.php');
		    }
			if (isset($_POST["submit2"])) {
		    	$OldPass = md5($_POST['OldPass']);
				$NewPass = $_POST["NewPass"];
				$NewPass = strip_tags($NewPass); 
    			$NewPass = addslashes($NewPass);
    			$NewPass = md5($NewPass);
				if($OldPass <> $pass){
					echo '<script>alert ("Old password incorrect")</script>';
					die();
					// header('Location: PersonalInfo.php');
				}else if($_POST['NewPass']<>$_POST['NewPass2']){
					echo '<script>alert ("Confirm password incorrect")</script>';
					die();
					// header('Location: PersonalInfo.php');
				  }else{
				$update = "update `nguoidung` set `pass` = '$NewPass' where `username` = '$UserName'";
				if($connect!=null){
					$kq=$connect->query($update);
					echo '<script>alert ("Your password have successfully updated")</script>';
					// $connect->close();
		    }}}
		?>
		<center>
<h3 style="margin-left: 130px;"> Member Information</h3><br>
        <form method="POST" name="PersonalInfo" style="margin-left: 400px;">
	        <table class="table">
	           	<input type="hidden" name="id" value="<?php echo $id; ?>">
	          	<tr><td>Full Name : </td><td><input type="text" style="width: 350px" name="Hoten" value="<?php echo $Hoten; ?>" disabled/></td></tr>
	          	<tr><td>Email : </td><td><input type="text" style="width: 350px" name="email" value="<?php echo $email; ?>" /></td></tr>
                <tr><td>Phone number: </td><td><input type="text" style="width: 350px" name="phone" value="<?php echo $phone; ?> " /></td></tr>
  	          	<tr><td colspan="2">
                      <input type="submit" name="submit" style="margin-left: 160px;" value="Submit">
				    </td></tr>
	        </table>
        </form>
		</center>

  
    <!-- Button đăng nhập để mở form đăng nhập -->
    <button id="myBtn" style="margin-left: 540px;">Change Password</button>
	<div class="container">
    <!-- The Modal -->
    <div id="myModal" class="modal">
        <!-- Nội dung form đăng nhập -->
        <div class="modal-content" style="margin-left: 20px;">
            <form method="POST">
                <span class="close" style="margin-right: -30px;">&times;</span>
                <h2 style="margin-left: 80px;">Change Password</h2>
				<table>
                <tr class="fomrgroup">
                    <td>&nbsp&nbsp&nbsp Old Password:</td>
                    <td><input style="width: 220px; height: 30px;" type="text" name="OldPass" id="OldPass" onkeyup="check()"></td>
					<td><div id="z-OldPass"></div></td>
                </tr>
                <tr class="fomrgroup">
                    <td>&nbsp&nbsp New PassWord:</td>
                    <td><input style="width: 220px; height: 30px;" type="passWord" pattern="^{6,}$" name="NewPass" id="NewPass" onkeyup="check()"></td>
					<td><div id="z-NewPass"></div></tdlass=>
                </tr>
				<tr class="fomrgroup">
                    <td>&nbsp&nbsp Confirm New &nbsp PassWord:</td>
                    <td><input style="width: 220px; height: 30px;" type="passWord" pattern="^{6,}$" name="NewPass2" id="NewPass2" onkeyup="password()"></td>
					<td><div id="z-NewPass2"></div></td>
                </tr>
				<tr>
                <td colspan="2">
					<input style="margin-left: 170px;" type="submit" name="submit2" value="Submit">
                </td>
				</tr>
				</table>
            </form>
        </div>
    </div>
</div>
<script>
    // lấy phần Modal
    var modal = document.getElementById('myModal');
  
    // Lấy phần button mở Modal
    var btn = document.getElementById('myBtn');
  
    // Lấy phần span đóng Modal
    var span = document.getElementsByClassName('close')[0];
  
    // Khi button được click thi mở Modal
    btn.onclick = function() {
        modal.style.display = "block";
    }
  
    // Khi span được click thì đóng Modal
    span.onclick = function() {
        modal.style.display = "none";
    }
  
    // Khi click ngoài Modal thì đóng Modal
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
	
	function check() {
    var data = new Array();
    data[0] = document.getElementById('OldPass').value;
    data[1] = document.getElementById('NewPass').value;
    data[2] = document.getElementById('NewPass2').value;

    var myerror = new Array();
    myerror[0] = "<span style='color:red,font-weight:bold'>Enter your old password</span>";
    myerror[1] = "<span style='color:red,font-weight:bold'>Enter your new password</span>";
    myerror[2] = "<span style='color:red,font-weight:bold'>Confirm your new password</span>";
    var nearby = new Array("z-OldPass", "z-NewPass", "z-NewPass2");


    for (i in data) {
        var error = myerror[i];
        var div = nearby[i];
        if (data[i]=="") {
            document.getElementById(div).innerHTML = error;
        } else {
            document.getElementById(div).innerHTML = "";
        }
    }
	}
function password() {
    var fpw = document.getElementById('NewPass').value;
    var spw = document.getElementById('NewPass2').value;
    if (fpw==spw) {
        document.getElementById('z-NewPass2').innerHTML = "Mật khẩu đã khớp";
    } else {
        document.getElementById('z-NewPass2').innerHTML = "<span color='red'>Mật khẩu chưa khớp</span>";
    }
}
</script>
</body>
</html>