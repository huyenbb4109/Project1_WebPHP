<?php
    require_once('conndb.php');
    $conn= conn();
    if($conn!=false){
        $codepd = $_POST['codepd'];
        $codepd_exist= mysqli_num_rows($conn->query("SELECT pd_code FROM product_detail where pd_code='$codepd'"));
        $codepm_exist= mysqli_num_rows($conn->query("SELECT pd_code_pm FROM promotion where pd_code_pm='$codepd'"));
        if($codepd_exist!=0){
           if($codepm_exist!=0){
            echo json_encode(
                array(
                    "error"=>"Mã khuyến mãi đã tồn tại"
                )
              );
           }else{
                echo json_encode(
                array(
                    "action"=>""
                )
              );
           }
        }else{
            echo json_encode(
                array(
                    "error"=>"Mã sản phẩm không tồn tại"
                )
              );
        }
    }

?>