<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogOut</title>
</head>
<body>
    <?php
    if (session_id() === '') session_start();
    session_destroy();
    header('Location: Login_Admin.php');
    ?>
</body>
</html>