<?php
include("../../conn/conn.php");
header('content-type:application/json;charset=utf8');
$id=$_POST["id"];
$result="update report set wstatus='处理成功' where rid='".$id."'";
$result1="update report set wend='举报失败' where rid='".$id."'";
$result_query=mysqli_query($conn,$result);
$result_query1=mysqli_query($conn,$result1);
echo 1;
?>