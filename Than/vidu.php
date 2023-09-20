<?php
    require_once('home.php');
    require_once('conndb.php');
    require_once('khong_dau.php');

    //Phải kiểm tra mã sản phẩm đã tồn tại chưa ở đây này!!!! nghe t nói ko!? á nồ!!!!!!!
    $file_error = 0;
    if(count($_FILES)!=0) {        
        $name = $_FILES['img']['name'];
        $file_array = explode('.',$name);
        $current_name = current($file_array);
        $extension = end($file_array);
        $name = str_replace(",","",khong_dau($current_name)).strtotime(date("Y-m-d h:i:s")).".".$extension;

        $target_dir = "uploads/";
        $target_file = $target_dir . $name;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

         
        // Check if file already exists
        if (file_exists($target_file)) {
            $file_error = "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["img"]["size"] > 2000000) {
            $file_error = "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $file_error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

            // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $file_error = "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {

            if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                $img = $name;
            } else {
                $file_error = "Sorry, there was an error uploading your file.";
            }
        }
    }else{
        $img = "";
    }

    if(isset($_POST['chondm'])){
        $danhmuc= $_POST['chondm'];
    }
    if(isset($_POST['chonNhomSp'])){
        $nhomsp= $_POST['chonNhomSp'];
    }
    if(isset($_POST['masp'])){
        $masp= $_POST['masp'];
    }
    if(isset($_POST['tensp'])){
        $tensp= $_POST['tensp'];
    }
    if(isset($_POST['mausac'])){
        $mausac= $_POST['mausac'];
    }
    if(isset($_POST['dachinh'])){
        $dachinh= $_POST['dachinh'];
    }
    if(isset($_POST['chatlieu'])){
        $chatlieu= $_POST['chatlieu'];
    }
    if(isset($_POST['kichthuocda'])){
        $kichthuocda= $_POST['kichthuocda'];
    }
    if(isset($_POST['trongluong'])){
        $trongluong= $_POST['trongluong'];
    }
    if(isset($_POST['mota'])){
        $mota= $_POST['mota'];
    }
    if(isset($_POST['tinhtrang'])){
        $tinhtrang= $_POST['tinhtrang'];
    }
    
    if(isset($img)&&isset($danhmuc)&&isset($nhomsp)&&isset($masp)&&isset($tensp)
    &&isset($mausac)&&isset($dachinh)&&isset($chatlieu)&&isset($kichthuocda)
    &&isset($trongluong)&&isset($tinhtrang)&&isset($mota)){
        $kq= insertsp($masp, $tensp, $img, $mausac, $dachinh, $chatlieu, $kichthuocda,
        $trongluong, $tinhtrang, $danhmuc, $nhomsp, $mota);
        if($kq!=false){
            echo "insert thành công";
        }else{
            echo "insert không thành công";
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
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.0.min.js"></script>
    <script>
        window.addEventListener('load', function() {
            document.querySelector('input[type="file"]').addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    var img = document.querySelector('img');
                    img.onload = () => {
                        URL.revokeObjectURL(img.src);  // no longer needed, free memory
                    }

                    img.src = URL.createObjectURL(this.files[0]); // set src to blob url
                }
            });
        });
    </script>
    <style>
        th{
            
            width: 200px;
            text-align: left;
            font-size: 14px;
            color: #333399;
        }
        .headtb{
            height: 20px;
            font-size: 15px;
            color: black;
        }
        .bdtb{
            width:350px;
            height: 23px;
        }
        .thetr{
            height: 40px;
        }
        table{
            background-color: #f5f5f5;
            border: none #ffffff;
        }
        select{
            width:360px;
            height: 25px;
        }
        
    </style>
</head>
<body>
    <form method= "POST" name= "formchitietsp" enctype="multipart/form-data">
        <table border="1" cellspacing= "0">
            <tr>
                <th colspan= "2" class="headtb">Thông tin chung</th>
            </tr>
            <tr height="100px">
                <th>Hình ảnh:</th>
                <td><img id= "myImg" src="" height="100px" width="auto"></td>
                <?php if($file_error!=0){echo $file_error;}?>
            </tr>
            <tr>
                <th>Tải ảnh:</th>
                <td>
                    <input type="file" name="img" id="img" required>
                </td>
            </tr>
            <tr class="thetr">
                <th>Danh Mục:</th>
                <td>
                    <?php require_once('htdanhmuc.php') ?>
                </td>
            </tr>
            <tr class="thetr">
                <th>Nhóm Sản Phẩm:</th>
                <td>
                    <?php require_once('htnhomsp.php') ?>
                </td>
            </tr>
            <tr class="thetr">
                <th>Mã Sản Phẩm:</th>
                <td>
                    <input type="text" name="masp" maxlength="50" class="bdtb" required>
                </td>
            </tr>
            <tr class="thetr">
                <th>Tên Sản Phẩm:</th>
                <td>
                    <input type="text" name="tensp" maxlength="60" class="bdtb" required>
                </td>
            </tr>
            
            <tr class="thetr">
                <th>Màu Sắc:</th>
                <td>
                    <input type="text" name="mausac" maxlength="30" class="bdtb" required>
                </td>
            </tr>
            <tr class="thetr">
                <th>Đá Chính:</th>
                <td>
                    <input type="text" name="dachinh" maxlength="30" class="bdtb" required>
                </td>
            </tr>
            <tr class="thetr">
                <th>Chất Liệu:</th>
                <td>
                    <input type="text" name="chatlieu" maxlength="30" class="bdtb" required>
                </td>
            </tr>
            <tr class="thetr">
                <th>Kích Thước Đá:</th>
                <td>
                    <input type="text" name="kichthuocda" maxlength="30" class="bdtb" required>
                </td>
            </tr>
            <tr class="thetr">
                <th>Trọng Lượng:</th>
                <td>
                    <input type="text" name="trongluong" maxlength="30" class="bdtb" required>
                </td>
            </tr>
            <tr class="thetr">
                <th>Tình Trạng:</th>
                <td>
                    <select name="tinhtrang">
                        <option value="Còn hàng">Còn hàng</option>
                        <option value="Hết hàng">Hết hàng</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Mô tả:</th>
                <td>
                    <textarea name= "mota" rows="9" cols="70" placeholder="Nhập dòng mô tả ngắn sản phẩm, bài viết tại khu vực này.."></textarea>
                </td>
            </tr>
            <tr class="thetr" align= "center">
                <td colspan="2">
                    <input type="submit" name="submit" value="Lưu">
                    <button type="button" onclick="exit_home()">thoát</button>
                </td>
            </tr>
            
        
        </table>
    </form>

    <script>
        function exit_home(){
            location.assign('home.php');
        }
    </script>
</body>
</html>

<?php

?>



    
