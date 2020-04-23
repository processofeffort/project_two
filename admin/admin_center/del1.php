<?php
 include_once("../../conn/conn.php");
 $id=$_GET['id'];
 if($id){
 $sql="delete from advertisement where id='$id'";
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