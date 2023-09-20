<?php
if (session_id() === '') session_start();
	if (empty($_SESSION['UserName']) && empty($_SESSION['Password']) && empty($_SESSION["IdNhom"]) && empty($_SESSION["TinhTrang"])){
		header('Location: Login_Admin.php');
	} else if (isset($_SESSION['UserName']) && isset($_SESSION['Password']) && isset($_SESSION["IdNhom"]) && isset($_SESSION["TinhTrang"])) {
        $IdNhom = $_SESSION['IdNhom'];
        $UserName = $_SESSION['UserName'];
        $TinhTrang	= $_SESSION["TinhTrang"];
        if ($IdNhom <> 0 || $TinhTrang == "Không hoạt động") {
            // Nếu không phải nhân viên / admin thì xuất thông báo
            echo "<H1>You are not allowed to access this page</H1></br>";
            // echo "<a href='login_quan_tri.php'> Click để về lại trang đăng nhập</a>";
            // echo $IdNhom . $TinhTrang;
            exit();
        }
    }  

?>