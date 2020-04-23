<?php
include("../conn/conn.php");
header('content-type:application/json;charset=utf8');
$key=$_POST["key"];
$key1=$_POST["key1"];
$result="update user set password='".$key."' where name=N'".$key1."'";
$result_query=mysqli_query($conn,$result);
echo 1;
?>