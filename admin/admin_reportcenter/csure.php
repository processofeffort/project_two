<?php
include("../../conn/conn.php");
$id=$_POST["id"];
$name=$_POST["name"];
//set不能使用and，这样会进行运算操作，只使前面成功，后面不成功。and是where后面使用的
$result="update report set wstatus='处理成功' where rid='".$id."'";
$result1="update report set wend='举报成功' where rid='".$id."'";
$result2="update user set reportnumber=reportnumber+1 where username='".$name."'";
$result_query=mysqli_query($conn,$result);
$result_query1=mysqli_query($conn,$result1);
$result_query2=mysqli_query($conn,$result2);
echo 1;
?>