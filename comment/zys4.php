<?php
    include("../conn/conn.php");
	$key1=$_POST["key1"];
	$key2=$_POST["key2"];
	$sqlstr2="delete from collect where c_user='".$key2."' and c_mid='".$key1."'";
	$result2=mysqli_query($conn,$sqlstr2);
	echo 1;
?>