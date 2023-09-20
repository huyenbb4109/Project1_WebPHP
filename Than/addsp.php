<?php
    require_once('conndb.php');
    require_once('khong_dau.php');
    require_once('Phan_Quyen_Nhan_Vien.php');
    
    $file_error = 0;
    $uploadOk= 1;
    if(count($_FILES)!=0) {        
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
    }else{
        $img = "";
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

    if(isset($img) && isset($category) && isset($grouppd) && isset($codepd) && isset($namepd)
    && isset($color) &&isset ($mainstone) &&isset ($material) && isset($stonesize)
    && isset($weight) && isset($state) && isset($description)){
        $result= insertpd($codepd, $namepd, $img, $color, $mainstone, $material, $stonesize,
        $weight, $state, $category, $grouppd, $description);
        
        if($result!=false){
            echo "<div style='margin-left: 100px;'>successfully added product code <span style='color: red;'>$codepd</span></div>";
        }else{
            echo "failed add product";
        }
    }

    
?>


<script src="js/jquery.js"></script>
<script src="js/addsp.js"></script>
<link rel="stylesheet" href="csshuyen/addsp.css">

<form method= "POST" name= "formpddetail" enctype="multipart/form-data" class="formpd">
    <table style="border: 2px dotted #9D9FA0;table-layout: fixed;" cellspacing= "0" rules="rows">
        <tr>
            <th colspan= "3" class="headtb">&nbsp&nbsp General information</th>
        </tr>
        <tr height="100px">
            <th class="tentb">&nbsp&nbsp Image</th>
            <td class="image_show" margin-bottom="25px">
                <img id= "myImg" src="" height="100px" width="auto">
            </td>
            
        </tr>
        <tr>
            <th class="tentb">&nbsp&nbsp Upload Image <span class="sao">*</span></th>
            <td>
                <input type="file" name="img" id="img" required>
                <div class="check_error">
                    <?php  
                        if($uploadOk==0){
                            echo $file_error;
                        }
                    ?>
                </div>
            </td>
            
        </tr>
        <tr class="thetr">
            <th class="tentb">&nbsp&nbsp Category <span class="sao">*</span></th>
            <td>
                <?php 
                    require_once('dpcat.php');
                    if($kq->num_rows>0){
                        echo "<select name= 'selectcat'>";
                            while($row= $kq->fetch_assoc()){
                                
                                echo "<option value='".$row['id_category']."'> ".$row['name_category']." </option>";
                            }
                        echo "</select>";                        
                    } 
                ?>
            </td>
            
        </tr>
        <tr class="thetr">
            <th class="tentb">&nbsp&nbsp Product Group <span class="sao">*</span></th>
            <td>
                <?php 
                    require_once('dpgrouppd.php');
                    if($kq->num_rows>0){
                        echo "<select name= 'selectgrouppd'>";
                            while($row= $kq->fetch_assoc()){
                                
                                echo "<option value='".$row['id_pd_group']."'> ".$row['name_pd_group']." </option>";
                            }
                        echo "</select>";
                        
                    } 
                ?>
            </td>
            
        </tr>
        <tr class="thetr">
            <th class="tentb">&nbsp&nbsp Product Code <span class="sao">*</span></th>
            <td>
                <input type="text" name="codepd" id="cpd" maxlength="50" class="bdtb" required>
                <span class="editcolor"></span>
                <div class="check_error" id="checkcodepd"></div>
            </td>
            
        </tr>
        <tr class="thetr">
            <th class="tentb">&nbsp&nbsp Product Name <span class="sao">*</span></th>
            <td>
                <input type="text" name="namepd" maxlength="60" class="bdtb" required>
                <span class="editcolor"></span>
            </td>
            
        </tr>
        
        <tr class="thetr">
            <th class="tentb">&nbsp&nbsp Color <span class="sao">*</span></th>
            <td>
                <input type="text" name="color" maxlength="30" class="bdtb" required >
                <span class="editcolor"></span>
            </td>
            
        </tr>
        <tr class="thetr">
            <th class="tentb">&nbsp&nbsp Main Stone <span class="sao">*</span></th>
            <td>
                <input type="text" name="mainstone" maxlength="30" class="bdtb" required>
                <span class="editcolor"></span>
            </td>
            
        </tr>
        <tr class="thetr">
            <th class="tentb">&nbsp&nbsp Material <span class="sao">*</span></th>
            <td>
                <input type="text" name="material" maxlength="30" class="bdtb" required>
                <span class="editcolor"></span>
            </td>
            
        </tr>
        <tr class="thetr">
            <th class="tentb">&nbsp&nbsp Stone Size <span class="sao">*</span></th>
            <td>
                <input type="text" name="stonesize" maxlength="30" class="bdtb" required>
                <span class="editcolor"></span>
            </td>
            
        </tr>
        <tr class="thetr">
            <th class="tentb">&nbsp&nbsp Weight <span class="sao">*</span></th>
            <td>
                <input type="text" name="weight" maxlength="30" class="bdtb" required>
                <span class="editcolor"></span>
            </td>
            
        </tr>
        <tr class="thetr">
            <th class="tentb">&nbsp&nbsp State <span class="sao">*</span></th>
            <td>
                <select name="state">
                    <option value="stocking">Stocking</option>
                    <option value="outofstoke">Out of stock</option>
                </select>
            </td>
        </tr>
        <tr>
            <th class="tentb">&nbsp&nbsp Description</th>
            <td>
                <textarea name= "description" rows="9" cols="70" maxlength="500" 
                    placeholder="Enter a short description of the product or article in this area.."
                ></textarea>
                <span class="editcolor"></span>
            </td>
        </tr>
        <tr class="thetr">
            <td colspan="3" class="submit">&nbsp&nbsp 
                <input type="submit" name="submit" style="font-family: cursive; margin-left: 50px" value="Save">
                <button type="button" style="font-family: cursive;" onclick="exit_home()">Exit</button>
            </td>
        </tr>
        
    
    </table>
</form>






    
