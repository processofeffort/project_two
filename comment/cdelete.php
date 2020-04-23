<?php
    include("../conn/conn.php");
	$key10=$_POST["key12"];
	$key11=$_POST["key13"];
	$sqlstr2="update content set c_up=c_up-1 where c_cid='".$key10."'";
	$sqlstr5="update scontent set s_cup=s_cup-1 where s_ccid='".$key10."'";
	$sqlstr3="delete from glike where g_cid='".$key10."' and g_user='".$key11."' and g_own=2";
	$sqlstr = "select * from content where c_cid='".$key10."'";
	$result2=mysqli_query($conn,$sqlstr2);
	$result5=mysqli_query($conn,$sqlstr5);
	$result3=mysqli_query($conn,$sqlstr3);
	$result1=mysqli_query($conn,$sqlstr);
	$result10= array();
	while($row=mysqli_fetch_assoc($result1)){    
       $result10=$row;
        }           
        echo json_encode($result10);
?>