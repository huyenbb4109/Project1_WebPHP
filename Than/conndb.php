<?php
    function conn(){
        $servername= "localhost";
        $username= "root";
        $pass= "";
        $db= "project1";

        $conn= new mysqli($servername, $username, $pass, $db);

        if(!$conn->connect_error){
            return $conn;
        }else{
            return false;
        }
    }

    function insertpd($codepd, $namepd, $img, $color, $mainstone, $material, 
    $stonesize, $weight, $state, $category, $grouppd, $description){
        $conn= conn();
        if($conn!=false){            
            $date = date("Y-m-d");
            $sql= "insert into product_detail(pd_code, name, img, color, main_stone, material, 
            stone_size, weight, state, id_category, id_pd_group, description,date) 
            values('$codepd', '$namepd', '$img', '$color', '$mainstone', '$material', 
            '$stonesize', '$weight', '$state', '$category', '$grouppd', '$description','$date') ";
            $result= $conn->query($sql);
            return $result;
        }else{
            return false;
        }
    }


    function insert_pm($codepd, $percent, $timestart, $timeend){
        $conn= conn();
        if($conn!=false){
            $sql= "insert into promotion(pd_code_pm, percent_pm, time_start, time_end) 
            values('$codepd','$percent','$timestart','$timeend')";
            $result= $conn->query($sql);
            return $result;
        }else{
            return false;
        }
    }

    function update_addpd($id,$codepd, $namepd, $img, $color, $mainstone, $material, 
    $stonesize, $weight, $state, $category, $grouppd, $description){
        $conn= conn();
        if($conn!=false){
            
            $date = date("Y-m-d");
            $exist = mysqli_num_rows($conn->query("select id_product from product_detail where id_product!='$id' and pd_code= '$codepd'"));
            if($exist!=0){
                $result = false;
            }else{
                if($img!=""){                    
                    $sql= "update product_detail set pd_code= '$codepd', name= '$namepd', img= '$img', 
                    color= '$color', main_stone= '$mainstone', material='$material', 
                    stone_size='$stonesize', weight='$weight', state='$state', 
                    id_category='$category', id_pd_group='$grouppd', description='$description',date='$date'
                    where id_product= '$id' ";
                }else{                    
                    $sql= "update product_detail set pd_code= '$codepd', name= '$namepd', 
                    color= '$color', main_stone= '$mainstone', material='$material', 
                    stone_size='$stonesize', weight='$weight', state='$state', 
                    id_category='$category', id_pd_group='$grouppd', description='$description',date='$date'
                    where id_product= '$id' ";
                }
                $result = $conn->query($sql);                
            }            
            return $result;
        }else{
            return false;
        }
    }

    function delete_pd($id){
        $conn= conn();

        if($conn!=false){
            $sql= "delete from product_detail where id_product= '$id' ";
            $result= $conn->query($sql);
            return $result;
        }else{
            return false;
        }
    }

    function delete_pm($id){
        $conn= conn();

        if($conn!=false){
            $sql= "delete from promotion where id_pm='$id'";
            $result= $conn->query($sql);
            return $result;
        }else{
            return false;
        }
    }
    
    

    

    


?>
















