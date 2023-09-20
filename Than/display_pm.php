<?php
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    require_once("conndb.php");
    require_once('../Than/Phan_Quyen_Nhan_Vien.php');
    $conn= conn();
    if($conn!= false){
        $sql= "select ROW_NUMBER() OVER (ORDER BY p.id_pm) as stt, p.id_pm, p.pd_code_pm, p.percent_pm, 
        p.time_start, p.time_end, pd.img from promotion as p, product_detail as pd where p.pd_code_pm = pd.pd_code";
        $kq= $conn->query($sql);  
    } 
   

    $date_current = date('Y-m-d');
    
?>

<table border= "1" cellspacing= "0" style="text-align:center;width:100%; margin-left: 25px;">
    <tr>
        <th style= "width: 100px">STT</th>
        <th style= "width: 120px">Promotion Code</th>
        <th style= "width: 120px">Product Code</th>
        <th style= "width: 100px">Image</th>
        <th style= "width: 120px">Percent</th>
        <th style="width: 150px">Time Start</th>
        <th style="width: 150px">Time End</th>
        <th style= "width: 150px">State</th>
        <th style= "width: 100px">Task Manager</th>
    </tr>
    <?php 
        if($kq->num_rows>0){
                
            while($row= $kq->fetch_assoc()){
                if($row['time_start']!="0000-00-00" && $row['time_end']!="0000-00-00"){
                    $date_bd = date($row['time_start']);
                    $date_kt = date($row['time_end']);
                    if($date_current <= $date_kt && $date_current >= $date_bd){
                        $state = "Promo code in progress.";
                    }else{
                        if($date_current >= $date_kt){
                            $state = "Promo code has expired.";
                        }else{
                            $state = "Promo code has not started yet.";
                        }
                    }
                    $date_bd = date_create($date_bd);                
                    $date_bd = date_format($date_bd,"d/m/Y");
                    $date_kt = date_create($date_kt); 
                    $date_kt = date_format($date_kt,"d/m/Y");              
                }else{
                    if($row['time_start']=="0000-00-00"  && $row['time_end']!="0000-00-00"){
                        $date_bd = "Invalid start date.";
                        $date_kt = date_create($row['time_end']);
                        $date_kt = date_format($date_kt,"d/m/Y");
                        $state = "Invalid start date.";
                    }else if($row['timebd']!="0000-00-00"  && $row['timekt']=="0000-00-00"){
                        $date_kt = "Invalid end date.";
                        $date_bd = date_create($row['timebd']);
                        $date_bd = date_format($date_bd,"d/m/Y");
                        $state = "Invalid end date.";
                    }else{
                        
                        $state = "Promo code has no start and end date.";
                    }  
                    
                }
                $stt= $row['stt'];
                $a= $row['img'];
                echo "<tr class='list_item2' data-code='{$row['pd_code_pm']}' data-percent='{$row['percent_pm']}'>";
                echo "<td>$stt</td>";
                echo "<td>{$row['id_pm']}</td>";
                echo "<td> {$row['pd_code_pm']} </td>";
                echo" <td><img src='uploads/$a' width= '100px' height= 'auto'></td>";
                echo "<td>  {$row['percent_pm']} </td>";
                echo "<td>  {$row['time_start']} </td>";
                echo "<td>{$row['time_end']}</td>";
                echo "<td>  $state</td>";
                echo "<td>&nbsp&nbsp&nbsp&nbsp&nbsp<a href= 'delete_pm.php?id=".$row['id_pm']." ' onclick='return ConfirmDelete();'>Delete</td>";
                echo "</tr>";
            }
        
        }
    ?>
</table>
<script>
    function ConfirmDelete()
    {
      var x = confirm("Do you really want to delete?");
      if (x)
          return true;
      else
        return false;
    }
</script>    