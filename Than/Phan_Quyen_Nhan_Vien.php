<?php
if (session_id() === '') session_start();
	if (empty($_SESSION['UserName']) && empty($_SESSION['Password']) && empty($_SESSION["IdNhom"]) && empty($_SESSION["TinhTrang"])){
		header('Location: Login_Admin.php');
	} else if (isset($_SESSION['UserName']) && isset($_SESSION['Password']) && isset($_SESSION["IdNhom"]) && isset($_SESSION["TinhTrang"])) {
        $IdNhom = $_SESSION['IdNhom'];
        $UserName = $_SESSION['UserName'];
        $TinhTrang	= $_SESSION["TinhTrang"];
        if ($IdNhom == 1 || $TinhTrang == "Không hoạt động") {
            // Nếu không phải nhân viên / admin thì xuất thông báo
            echo "You are not allowed to access this page<br>";
            echo "<a href='Login_Admin.php'> Click go to login</a>";
            // echo $IdNhom . $TinhTrang;
            exit();
        }
    }  

?>
