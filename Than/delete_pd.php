<?php
    include_once('conndb.php');
    require_once('../Than/Phan_Quyen_Nhan_Vien.php');

    $id= $_GET['id'];
    $kq= delete_pd($id);
    if($kq!=false){
       
        header('Location:index.php?option=editproduct');
    }else{
        echo "Can't delete product, error. <br>";
    }
?>