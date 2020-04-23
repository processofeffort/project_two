<?php
 include_once("../conn/conn.php");
 $id=$_GET['id'];
 $name=$_GET['name'];
 $sql="delete from collect where c_user='$name' and c_mid='$id'";
 $result=mysqli_query($conn,$sql);
 if($result){
	 $reback=1;
	 }
	 else{
		 $reback=0;
		 }
		 echo $reback;
?>