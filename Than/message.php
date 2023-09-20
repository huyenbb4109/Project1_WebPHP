<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <title>Document</title>
    <?php
    include_once 'Phan_Quyen_Nhan_Vien.php';
    include_once 'Connect.php';
    ?>
    
</head>
<body>
    <h2 style="margin-left: 450px">Message Customer</h2><br>
    <table class="table" style="width:1000px;margin-left: 100px">
            <thead>
            <tr>
              <th>STT</th>
              <th >Full Name</th>
              <th>Email</th>
              <th>Phone number</th>
              <th>Message</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $sql = "SELECT * FROM message";
            $query = mysqli_query($connect,$sql);
            while ($data = mysqli_fetch_array($query)) {
          ?>
            <tr>
              <td><?php echo $data["idM"]; ?></td>
              <td><?php echo $data["name"]; ?></td>
              <td><?php echo $data["email"]; ?></td>
              <td><?php echo $data["phone"]; ?></td>
              <td><?php echo $data["message"];?></td>
            </tr>
          <?php
            }
          ?>
          </tbody>
        </table>
</body>
</html>