<?php
   
    require_once('conndb.php');  
    require_once('../Than/Phan_Quyen_Nhan_Vien.php');
    

    if(isset($_POST['codepd'])){
        $codepd= $_POST['codepd'];
    }
    if(isset($_POST['percent'])){
        $percent= $_POST['percent'];
    }
    if(isset($_POST['start'])){
        $start= $_POST['start'];
    }else{
        $start= "";
    }
    if(isset($_POST['end'])){
        $end= $_POST['end'];
    }else{
        $end= "";
    }

?>
<script src="js/jquery.js"></script>
<script src="js/promotion.js"></script>
<script src="../giaodien/js/khong_dau.js"></script>
<link href="csshuyen/promotion.css">

<style>
    .sao{
        color: red;
    }
    .check_error{
        color: red;
        font-size: 14px;
        text-align:center;
    }
    .chiiu{
    font-family: cursive;
    text-align: left;
    }
    .divpro{
        border: 2px dotted #9C9FA0;
        width: 600px;
        display: inline-block;
        margin-left: 300px;
        
    }
    .codepd{
        font-size: 25px;
    }
    .inp{
        text-align: left;
    }
  
    
</style>



<br><br>
<div style="margin-left: 100px;">
    <?php
         if(isset($codepd)&&isset($percent)){
            $kq= insert_pm($codepd, $percent, $start, $end);
            if($kq!=false){
                echo "<span style='color: red;'>$codepd</span>products have been successfully reduced by
                <span style='color: red;'>$percent%</span><br>";
            }else{
                echo "Add failed discount product.<br>";
            }
        }
    ?>
</div>
<span style="font-family: cursive; font-size:25px;margin-left: 530px;font-weight: 100;">Promotion(%)</span>
<div class="divpro" ><br><br>
<form method="post" name="formpromotion">

    
    
    <p class="inp">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <span class="chiiu" style="font-weight: 400;">Product Code<span class="sao">*</span></span>          
        <input type="text" id="cpd" class="text_code" name="codepd" maxlength="50" width="400px" required>
        <span class="maxlengthpm"></span><br>
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <span id="checkcodepd_pm" class="check_error" style="text-align: center;"></span>
    </p>

    <p class="inp">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <span class="chiiu" style="font-weight: 400;">Percent(%)<span class="sao">*</span> </span>
        <input type="text" id="percent" class="text_percent" name="percent" pattern="[0-9]+" 
        title="Only numbers are allowed!" maxlength="3" required>
        <span class="maxlengthpm"></span><br>
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <span id="check_percent" class="check_error" style="text-align: center;"></span>          
    </p>

    <p style="text-align: left">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <span class="chiiu" style="font-weight: 400px;">Time application</span><br><br>      
        <span style="font-size:14px;">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp From</span>
        <input type="date" name="start" required> 
        <span style="font-size:14px;">to</span>
        <input type="date" name="end" required>
    </p><br>

    <p>
        <input type="submit" style="font-family: cursive;" name="submit" value="Save">
        <button type="button" style="font-family: cursive;" onclick="exit_home()">Exit</button>
    </p>    
</form>
</div><br><br>
<?php
    include_once('display_pm.php');
?>