<?php
    include("../conn/conn.php");
	$key3=$_POST["key3"];
	$key4=$_POST["key4"];
	$sqlstr2="insert into collect(c_user,c_mid,c_own) values(N'".$key4."','".$key3."','1')";
	$result1=mysqli_query($conn,$sqlstr2);
	echo 1;
?>