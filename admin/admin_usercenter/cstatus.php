<?php
include("../../conn/conn.php");
header('content-type:application/json;charset=utf8');
$key=$_POST["key"];
$result1="select * from user where username='".$key."'";
$result_query1=mysqli_query($conn,$result1);
while($myrow2=mysqli_fetch_array($result_query1)){
	if($myrow2['status']==1){
		$result="update user set status=0 where username='".$key."'";
		$result_query=mysqli_query($conn,$result);
		echo 1;
	}else{
		$result3="update user set status=1 where username='".$key."'";
		$result_query3=mysqli_query($conn,$result3);
		echo 0;
	}
}
?>