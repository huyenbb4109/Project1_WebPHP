<?php
    require_once('khong_dau.php');
    require_once('conndb.php');
    require_once('../Than/Phan_Quyen_Nhan_Vien.php');
    
    
    $id=$_GET['id'];

    $conn= conn();
    if($conn!=false){
        $sql= "select * from product_detail where id_product= '$id'";
        $kq= $conn->query($sql);
        while($row= $kq->fetch_assoc()){
            $kq2= $row;            
        }
    }

    $img = "";
    if(isset($_FILES['img']) && $_FILES['img']['size'] != 0) {
        $file_error = 0;
        $uploadOk= 1;
        if(file_exists("uploads/".$kq2["img"])){
            unlink("uploads/".$kq2["img"]);
        }   
        $name = $_FILES['img']['name'];
        $file_array = explode('.',$name);
        $current_name = current($file_array);
        $extension = end($file_array);
        $name = str_replace(",","",khong_dau($current_name)).strtotime(date("Y-m-d h:i:s")).".".$extension;

        $target_dir = "uploads/";
        $target_file = $target_dir . $name;

       if ($_FILES["img"]["size"] > 2000000) {
            $file_error = "Sorry, your file is too large.";
            $uploadOk = 0;            
        }else{
            if(in_array($extension,["jpg","png","jpeg","gif"]))
            {    
                move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
                $img = $name;    
            }else{
                $file_error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
        }       
    }

    if(isset($_POST['id'])){
        $id_post= addslashes(htmlspecialchars($_POST['id']));
    }

    if(isset($_POST['selectcat'])){
        $category= addslashes(htmlspecialchars($_POST['selectcat']));
    }
    if(isset($_POST['selectgrouppd'])){
        $grouppd= addslashes(htmlspecialchars($_POST['selectgrouppd']));
    }
    if(isset($_POST['codepd'])){
        $codepd= addslashes(htmlspecialchars($_POST['codepd']));
    }
    if(isset($_POST['namepd'])){
        $namepd= addslashes(htmlspecialchars($_POST['namepd']));
    }
    if(isset($_POST['color'])){
        $color= addslashes(htmlspecialchars($_POST['color']));
    }
    if(isset($_POST['mainstone'])){
        $mainstone= addslashes(htmlspecialchars($_POST['mainstone']));
    }
    if(isset($_POST['material'])){
        $material= addslashes(htmlspecialchars($_POST['material']));
    }
    if(isset($_POST['stonesize'])){
        $stonesize= addslashes(htmlspecialchars($_POST['stonesize']));
    }
    if(isset($_POST['weight'])){
        $weight= addslashes(htmlspecialchars($_POST['weight']));
    }
    if(isset($_POST['description'])){
        $description= addslashes(htmlspecialchars($_POST['description']));
    }
    if(isset($_POST['state'])){
        $state= addslashes(htmlspecialchars($_POST['state']));
    }
    
    if( isset($img) && isset($category) && isset($grouppd) && isset($codepd) && isset($namepd)
    && isset($color) &&isset ($mainstone) &&isset ($material) && isset($stonesize)
    && isset($weight) && isset($state) && isset($description)){
        $kq= update_addpd($id_post,$codepd, $namepd, $img, $color, $mainstone, $material, $stonesize,
        $weight, $state, $category, $grouppd, $description);
        if($kq!=false){
        ?>
        <script>
                window.location.href = 'index.php?option=editproduct';
        </script>
            
        <?php
        }else{
            echo "update false.";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="csshuyen/update_addpd.css">
    <script src="js/jquery.js"></script>
    <script src="js/update_addpd.js"></script>
    <style>
        .check_error{
        font-size: 15px;
        color: red;
        }
        .sao{
            color: red;
            
        }

        .editcolor{
            color:#616060EF;
            font-size:14px;
        }
        .submit{
            text-align: center;
        }
        .bdtb{
            padding: 7.5px 15px;
            width: 100%;
            border: 1px solid #cccccc;
            outline: none;
            font-size: 16px;
            display: inline-block;
            height: 40px;
            color: #666666;
        }
        .headtb{
            color: #0A0A0A;
            font-size: 30px;
            font-family: cursive;
            text-align: center;
        }
        .chiutb{
            margin-left: 140px;
        }
        .tenud{
            font-family: cursive;
            
        }

    </style>

</head>
<body>

<form method= "POST" class="chiutb" name="formpddetail" action="index.php?option=fix&id=<?php echo $id;?>" enctype="multipart/form-data">
        <table  style="border: 2px dotted #9D9FA0;" cellspacing= "0" rules="rows">
            <tr>
                <th colspan= "3" class="headtb">General information Update </th>
            </tr>
            <tr height="100px">
                <th class="tenud">&nbsp&nbsp Image</th>
                <td  class="image_show">
                    <?php 
                        echo "<img id='myImg' src='uploads/{$kq2['img']}' width= '100px' height= 'auto'>" ; 
                    ?>
                    
                </td>
                
            </tr>
            <tr>
                <th class="tenud">&nbsp&nbsp Upload image <span class="sao">*</span></th>
                <td>
                    <input type="file" name="img" id="img">
                    <div class="check_error"></div>
                </td>
                
            </tr>
            <tr class="thetr">
                <th class="tenud">&nbsp&nbsp Category <span class="sao">*</span></th>
                <td>
                    <?php 
                        require_once('dpcat.php');
                        if($kq->num_rows>0){
                            echo "<select name='selectcat'>";
                                while($row= $kq->fetch_assoc()){
                                    if($kq2['id_category']==$row['id_category']){
                                        echo "<option value='".$row['id_category']."' selected> ".$row['name_category']." </option>";
                                    }else{
                                        echo "<option value='".$row['id_category']."'> ".$row['name_category']." </option>";
                                    }                                
                                }
                            echo "</select>";                        
                        } 
                    ?>
                </td>
                
            </tr>
            <tr class="thetr">
                <th class="tenud">&nbsp&nbsp Product Group <span class="sao">*</span></th>
                <td>
                    <?php 
                        require_once('dpgrouppd.php');
                        if($kq->num_rows>0){
                            echo "<select name= 'selectgrouppd'>";
                                while($row= $kq->fetch_assoc()){
                                    if($kq2['id_pd_group']==$row['id_pd_group']){
                                        echo "<option value='".$row['id_pd_group']."' selected> ".$row['name_pd_group']." </option>";
                                    }else{
                                        echo "<option value='".$row['id_pd_group']."'> ".$row['name_pd_group']." </option>";
                                    }    
                                    
                                    
                                }
                            echo "</select>";
                            
                        } 
                    ?>
                
            </tr>
            <tr class="thetr">
                <th class="tenud">&nbsp&nbsp Product Code <span class="sao">*</span></th>
                <td>
                    <input type="text" id="cpd" name="codepd" value="<?php echo $kq2['pd_code']; ?>" data-id="<?php echo $id;?>"  maxlength="50" class="bdtb" required>
                    <span class="editcolor"></span>
                    <div class="check_error" id="checkcodepd"></div>
                </td>
                
            </tr>
            <tr class="thetr">
                <th class="tenud">&nbsp&nbsp Product Name <span class="sao">*</span></th>
                <td>
                    <input type="text" name="namepd" value="<?php echo $kq2['name']; ?>" maxlength="60" class="bdtb" required>
                    <span class="editcolor"></span>
                </td>
                
            </tr>
            
            <tr class="thetr">
                <th class="tenud">&nbsp&nbsp Color <span class="sao">*</span></th>
                <td>
                    <input type="text" name="color" value="<?php echo $kq2['color']; ?>" maxlength="30" class="bdtb" required >
                    <span class="editcolor"></span>
                </td>
                
            </tr>
            <tr class="thetr">
                <th class="tenud">&nbsp&nbsp Main Stone <span class="sao">*</span></th>
                <td>
                    <input type="text" name="mainstone" value="<?php echo $kq2['main_stone']; ?>" maxlength="30" class="bdtb" required>
                    <span class="editcolor"></span>
                </td>
                
            </tr>
            <tr class="thetr">
                <th class="tenud">&nbsp&nbsp Material <span class="sao">*</span></th>
                <td>
                    <input type="text" name="material" value="<?php echo $kq2['material']; ?>" maxlength="30" class="bdtb" required>
                    <span class="editcolor"></span>
                </td>
                
            </tr>
            <tr class="thetr">
                <th class="tenud">&nbsp&nbsp Stone Size <span class="sao">*</span></th>
                <td>
                    <input type="text" name="stonesize" value="<?php echo $kq2['stone_size']; ?>" maxlength="30" class="bdtb" required>
                    <span class="editcolor"></span>
                </td>
                
            </tr>
            <tr class="thetr">
                <th class="tenud">&nbsp&nbsp Weight <span class="sao">*</span></th>
                <td>
                    <input type="text" name="weight" value="<?php echo $kq2['weight']; ?>" maxlength="30" class="bdtb" required>
                    <span class="editcolor"></span>
                </td>
                
            </tr>
            <tr class="thetr">
                <th class="tenud">&nbsp&nbsp State <span class="sao">*</span></th>
                <td>
                    <select name="state" value="<?php echo $kq2['state']; ?>">
                        <option value="stoking">Stoking</option>
                        <option value="outofstoke">Out of stoke</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th class="tenud">&nbsp&nbsp Description</th>
                <td>
                    <textarea name= "description" rows="9" cols="70" maxlength="500" 
                        placeholder="Enter a short description of the product or article in this area.."
                    ><?php echo $kq2['description']; ?></textarea>
                    <span class="editcolor"></span>
                </td>
            </tr>
            </tr>
            <tr class="thetr">
                <td colspan="3" class="submit"> 
                    <input type="submit" name="submit" value="Save">
                    <button type="button" onclick="exit_hienthisp()">Exit</button>
                </td>
            </tr>
        
        </table>
        <input type="text" name="id" <?php echo "value='".$id."'"; ?>  style='visibility:hidden' required>
    </form>
</body>
</html>
    