<?php
    include("../conn/conn.php");
	$key10=$_POST["key10"];
	$key11=$_POST["key11"];
	$sqlstr2="insert into glike(g_cid,g_user,g_own,g_if) values('".$key10."',N'".$key11."','1','1')";
	$sqlstr3="update content set c_down=c_down+1 where c_cid='".$key10."'";
	$sqlstr5="update scontent set s_cdown=s_cdown+1 where s_ccid='".$key10."'";
	$sqlstr = "select * from content where c_cid='".$key10."'";
	$result2=mysqli_query($conn,$sqlstr2);
	$result3=mysqli_query($conn,$sqlstr3);
	$result5=mysqli_query($conn,$sqlstr5);
	$result1=mysqli_query($conn,$sqlstr);
	$result10= array();
	while($row=mysqli_fetch_assoc($result1)){    
       $result10=$row;
        }           
        echo json_encode($result10);
?>