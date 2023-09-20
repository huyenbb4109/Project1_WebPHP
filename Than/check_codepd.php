<?php
    require_once('conndb.php');
    $conn= conn();
    if($conn!=false){
        $codepd = $_POST['codepd'];
        $sql= "SELECT pd_code FROM product_detail where pd_code='$codepd'";
        $kq= $conn->query($sql);
        if($kq->num_rows!=0){
            echo json_encode(
                array(
                  "error"=>"exist"
                )
              );
        }else{
            echo json_encode(
                array(
                  "action"=>"no_exist"
                )
              );
        }
    }

?>