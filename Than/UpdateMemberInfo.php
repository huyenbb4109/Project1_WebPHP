<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="cssthan/style.css">
    <title>Chỉnh sửa thông tin người dùng</title>
	<?php
	include_once 'Phan_Quyen_admin.php';
	if (isset($_SESSION["IdNhom"]) == FALSE) {
        header('Location: Login_quan_tri.php');
			if ($_SESSION["IdNhom"]<>0 && $_SESSION["TinhTrang"]<>"Hoạt động"){
				header('Location: Login_quan_tri.php');
			}
	}	
	?>
</head>
<body>
      	<?php
		    include_once 'Connect.php';

		    if (isset($_POST["submit"])) {
		    	$id = $_POST["id"];
				$TinhTrang = $_POST["TinhTrang"];
                $IdNhom = $_POST["IdNhom"];
		    	$sql = "update `nguoidung` set `IdNhom` = '$IdNhom', `TinhTrang` = '$TinhTrang'	where `id` = $id";
				// echo $sql;
		    	mysqli_query($connect, $sql);
                echo '<script>alert ("You have successfully updated")</script>';
				// header('Location: Quan-Ly-nhan-vien.php');
		    }
			

		    $id = $_GET["id"];
		    	$sql = "select * from `chitietnguoidung` where `id` = $id";
		    	$query = mysqli_query($connect, $sql);
		    	while ( $data = mysqli_fetch_array($query) ) {
		    		$Hoten = $data["Hoten"];
		    		$email = $data["email"];
		    		$SoDienThoai = $data["SoDienThoai"];
                    $IdNhom = $data["IdNhom"];
					$TenNhom = $data["TenNhom"];
					$TinhTrang = $data["TinhTrang"];
                }
		?>
		<div  style="margin-left: 350px">
        <h3> Member Information</h3>
        <form method="POST" name="Chinh-sua-thanh-vien">
	        <table class="table">
	           	<input type="hidden" name="id" value="<?php echo $id; ?>">
	          	<tr><td>Full Name : </td><td><input type="text" name="Hoten" value="<?php echo $Hoten; ?>"  disabled /></td></tr>
	          	<tr><td>Email : </td><td><input type="text" name="email" value="<?php echo $email; ?>" disabled/></td></tr>
                <tr><td>Phone number: </td><td><input type="text" name="SoDienThoai" value="<?php echo $SoDienThoai; ?> " disabled/></td></tr>  
	          	<tr>
	          		<td>Group: </td>
	          		<td>
	          			<select name="IdNhom">
							
							<?php
							echo '<option value=" '. $IdNhom.' selected">'."--". $TenNhom . "--"."</option>";
							if($IdNhom==1){
								echo $TenNhom;
							} else {
							$query = "SELECT * FROM `nhomnguoidung` where `idNhom` <>1";
							$sql = mysqli_query($connect,$query);
							while ($row = mysqli_fetch_array($sql)){
								echo '<option value=" '. $row['IdNhom']	.'">'. $row['TenNhom'] . "</option>";}}
								?>
	          			</select>
	          		</td>
	          	</tr>
				<tr>
					<td>Status:</td>
					<td><select name="TinhTrang">
							<option <?php if($TinhTrang == 'Active'){echo("selected");}?>>Active</option>
  							<option <?php if($TinhTrang == 'Inactive'){echo("selected");}?>>Inactive</option>
	          			</select></td>
				</tr>
	          	<tr><td colspan="2">
                      <input type="submit" name="submit" value="Submit">
                      <a <?php if($IdNhom==1){echo 'href="index.php?option=Customer"';} echo 'href="index.php?option=Staff"';?>><input type="button" value="Back"></a>
                    </td></tr>
	        </table>
        </form>
		</div>
</body>
</html>