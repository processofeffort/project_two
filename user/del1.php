<?php
 include_once("../conn/conn.php");
 $id=$_GET['id'];
 if($id){
 $sql2="select s_cid from scontent where s_scid='$id'";
 $result2=mysqli_query($conn,$sql2);
 while($myrow2=mysqli_fetch_array($result2)){
	 if($myrow2[0]){
		 $sql1="update comment set review=review-1 where mid='$myrow2[0]'";
 		 $result1=mysqli_query($conn,$sql1);
	 }
 }
 $sql="delete from scontent where s_scid='$id'";
 $result=mysqli_query($conn,$sql);
 if($result){
	 $reback=1;
	 }
	 else{
		 $reback=0;
		 }
		 echo $reback;
 }
?>