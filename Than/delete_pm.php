<?php
    include_once('conndb.php');
    require_once('../Than/Phan_Quyen_Nhan_Vien.php');
    $id= $_GET['id'];
    $kq= delete_pm($id);
    if($kq!=false){
        header('Location: ../Than/index.php?option=promotion');
    }else{
        echo "Can't delete product, error. <br>";
    }
?>