<?php
    include_once('conndb.php');
    $conn= conn();
    if($conn!=false){
        $sql= "select id_category, name_category from category";
        $kq= $conn->query($sql);        
    }
?>
