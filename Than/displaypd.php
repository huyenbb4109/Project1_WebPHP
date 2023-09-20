<?php
    require_once("conndb.php");
    require_once('../Than/Phan_Quyen_Nhan_Vien.php');
        $conn= conn();
        if($conn!= false){
            $sql= "select ROW_NUMBER() OVER (ORDER BY p.pd_code) as stt,
            c.name_category, g.name_pd_group,p.id_product, p.pd_code, p.name, p.img, p.state, p.date 
            from product_detail p, category c, product_group g 
            WHERE p.id_category= c.id_category and p.id_pd_group= g.id_pd_group";
            $kq= $conn->query($sql);  
        } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title> 
    <script src="../giaodien/js/khong_dau.js"></script>
    <script src="js/displaypd.js"></script>
    
    <style>
        table{
                text-align: center;  
                table-layout: fixed;          
            }
        table td, table th{
            border:none;
        }
        table th{
            padding-bottom:15px;
            border-bottom:1px solid #ABABAB;
        }
        table td{
            padding-top:10px;
        }
        table tr:nth-child(odd){
            background-color:rgba(0,0,0,0.09);
        }
        .table_title{
            position: relative;
            z-index:2;
            background-color:white;
            width: 100%;
            
        }
        .list{
            position:absolute;
            z-index:1;
            bottom:0px;
            left:0px;height:calc(100% - 120px);
            width:100%;
            text-align:center;
            overflow:scroll;
        }
        .formsearchct{
            margin-bottom: 10px;
            
        }
        .search_text{
            height: 25px;
            border: solid 1px #C0BFBF
        }
    </style>
    
</head>
    <body>
            
            <form class="formsearchct">
                
                <input type="text" class="search_text" size="30" placeholder="Search...">
                <div id="livesearch"></div>
            </form>
    
    <table cellspacing= "0" class="table_title">            
        <tr>
            <th style="width: 80px;font-family: cursive;">STT</th>
            <th style= "width: 110px;font-family: cursive;">Category</th>
            <th style= "width: 120px;font-family: cursive;">Product Group</th>
            <th style="width: 150px;font-family: cursive;">Product Code</th>
            <th style="width: 150px;font-family: cursive;">Product Name</th>
            <th style= "width: 100px;font-family: cursive;">Image</th>
            <th style= "width: 120px;font-family: cursive;">State</th>
            <th style= "width: 120px;font-family: cursive;">Time</th>
            <th style= "width: 150px;text-align: center;font-family: cursive;">Task Manager</th>
        </tr>
    </table>
    <div class="list" >
        <table cellspacing= "0" style="width: 100%;">
            <?php 
                if($kq->num_rows>0){
                    
                    while($row= $kq->fetch_assoc()){
                        $stt= $row['stt'];
                        $a= $row['img'];
                        
                        echo "<tr class='list_item' data-name='{$row['name']}' data-code='{$row['pd_code']}'>";
                        echo "<td style='width: 80px;'>$stt</td>";
                        echo "<td style= 'width: 110px;'> {$row['name_category']} </td>";
                        echo "<td style= 'width: 120px'>  {$row['name_pd_group']} </td>";
                        echo "<td style= 'width: 150px'>  {$row['pd_code']} </td>";
                        echo "<td style= 'width: 150px'>{$row['name']}</td>";
                        echo" <td style= 'width: 100px'><img src='uploads/$a' width= '100px' height= 'auto'></td>";
                        echo "<td style= 'width: 120px'> {$row['state']}</td>";
                        echo "<td style= 'width: 120px'>{$row['date']}</td>";
                        echo "<td style= 'width: 150px'>
                        &nbsp&nbsp&nbsp&nbsp<a href='index.php?option=fix&id=".$row['id_product']."'>Fix </a>&nbsp
                                <a href= 'delete_pd.php?id= ".$row['id_product']." ' onclick='return ConfirmDelete();'> Delete </a>
                            </td>";
            
                        echo "</tr>";
                        
                    }
                }else{
                    echo "no data yet <br>";
                }
                
            ?>

        </table>
    </div>
       
</body>
</html>

<!-- //     if($kq->num_rows>0){
        //         $count= $kq->num_rows;
        //         while($row= $kq->fetch_assoc()){
        //             $a= $row['img'];
        //             $mt= htmlspecialchars_decode($row['mota'], ENT_QUOTES);
        //             echo "
        //             Mãsp: {$row['MaSp']} 
        //             Tênsp: {$row['TenSP']}
        //             Hình ảnh: <img src='uploads/$a' width= '100px' height= 'auto'>
        //             Màu: {$row['MauSac']} 
        //             Đá chính: {$row['DaChinh']}
        //             Chất liệu: {$row['ChatLieu']}
        //             Kích Thước Đá: {$row['KichThuocDa']}
        //             Trọng Lượng: {$row['TrongLuong']}
        //             Tình Trạng: {$row['TinhTrang']}
        //             Mô tả: $mt
        //             <br>"; 
                   
        //         }
        //     }else{
        //         echo "chưa có dữ liệu <br>";
        //     }
        // }else{
        //     echo "kết nối thất bại! <br>". $connect_error;
        // } -->

