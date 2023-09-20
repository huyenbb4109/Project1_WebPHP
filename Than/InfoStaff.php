<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="cssthan.css">
    <title>Quản lý nhân viên</title>
<!-- <?php
session_start();
include_once 'Phan_Quyen_Nhan_Vien.php'
?> -->
</head>
<body>
<!-- <?php
    // include_once 'Connect.php';
    // include_once 'menu.php';
?> -->
    <!-- <div class="container" style="margin-left:20%;padding:1px 16px;height:1000px; width:auto">
      <div class="row"> -->
<h2 style="margin-left: 450px"> Staff Infomation</h2><br>
<div style="width: 450px; float:right; margin-right:150px">
  <form action="" method="get">
    <table>
      <tr>
        <td>
          <input type="hidden" name = "option" value="Staff">
          <input type="text" name="search">
        </td>
        <td>
          &nbsp;&nbsp; <input type="submit" value="search">&nbsp;&nbsp;
          <input type="button" value="All" onclick="window.location.href='../than/index.php?option=Staff'">
        </td> 
      </tr>
    </table>
</form>
</div>


        <table class="table" style="width: 1130px; margin-left: 50px;">
            <thead>
            <tr>
              <th>STT</th>
              <th>Id staff</th>
              <th>Full Name</th>
              <th>Email</th>
              <th>Phone number</th>
              <th>Group</th>
              <th>Status</th>
              <th>Action</td>
            </tr>
          </thead>
          <tbody>
          <?php         
          if(ISSET($_GET['search'])&&!empty($_GET['search'])){
            $key = addslashes($_GET['search']);
            $sql = "SELECT * FROM chitietnguoidung where `IdNhom` <> 1 and (`Hoten` LIKE '%$key%' OR `email` LIKE '%$key%' OR `SoDienThoai` LIKE '%$key%' OR `TinhTrang` LIKE '%$key%' OR `TenNhom` LIKE '%$key%')";
          } else {$sql = "SELECT * FROM chitietnguoidung where `IdNhom` <> 1";}          
            $query = mysqli_query($connect,$sql);
            $stt = 1 ;
            while ($data = mysqli_fetch_array($query)) {
          ?>
            <tr>
              <th scope="row"><?php echo $stt++ ?></th>
              <td><?php echo $data["id"]; ?></td>
              <td><?php echo $data["Hoten"]; ?></td>
              <td><?php echo $data["email"]; ?></td>
              <td><?php echo $data["SoDienThoai"]; ?></td>
              <td><?php echo $data["TenNhom"];?></td>
              <td><?php echo $data["TinhTrang"];?></td>
              <td>
                  <a href="?option=updateStaff&id=<?php echo $data["id"]; ?>"><button type="button" style="color: white">Update</button> </a>
                  <!-- <a href="xoa-thanh-vien.php?id=<?php echo $data["id"]; ?>"><button type="button" onclick="return confirm('Bạn thực sự muốn xóa người dùng này?');">Xóa</button></a> -->
              </td>
            </tr>
          <?php
            }
          // }
          ?>
          </tbody>
        </table>
      </div>
    <!-- </div>
    </div> -->
</body>
</html>