<?php
$hostname = "localhost";
$user = "root";
$pass = "";
$db= "project1";

//Tạo kết nối
$connect= new mysqli($hostname,$user,$pass,$db);
//Kiểm tra kết nối
if ($connect->connect_error){
    die ("Connect Error: ".$connect->connect_error);
}

?>