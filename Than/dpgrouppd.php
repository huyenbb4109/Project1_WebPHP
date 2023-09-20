<?php
    require_once('conndb.php');
    
    $conn= conn();
    if($conn!=false){
        $sql= "select id_pd_group, name_pd_group from product_group";
        $kq= $conn->query($sql);

        
    }
?>
