<?php
include("../../conn/conn.php");
header('content-type:application/json;charset=utf8');
$key=$_POST["key"];
$result="update user set password=123456 where username='".$key."'";
$result_query=mysqli_query($conn,$result);
echo 1;
?>