<?php
include("../conn/conn.php");
$key=$_POST["key"];
$key1=$_POST["key1"];
if($key==1){
	$result="update user set pic_status=1 where name=N'".$key1."'";
}else{
	$result="update user set pic_status=0 where name=N'".$key1."'";	
}
$result_query=mysqli_query($conn,$result);
echo 1;
?>