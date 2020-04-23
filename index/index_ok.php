<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ok</title>
</head>
<body>
<?php
  session_start();
  include("../conn/conn.php");
  $name=$_POST['username'];
  $pwd=$_POST['password'];
  $selectValue=$_POST['browser'];
  $href=$_POST['lhref'];
  if($selectValue=="1"){
  $sql=mysqli_query($conn,"select *from user where name='".$name."' and password='".$pwd."'");
  }else{
	    $sql=mysqli_query($conn,"select *from admin where adminaccount='".$name."' and adminpassword='".$pwd."'");
	  }
   if (!$sql) {
		printf("Error: %s\n", mysqli_error($conn));
		exit();
}
  if(mysqli_num_rows($sql)>0){
	  $_SESSION['name']=$name;
	  $_SESSION['time']=time();
	  if($selectValue=="1"){
	  echo "<script>alert('登录成功！');location='".$href."';</script>";
	  }else{
		   echo "<script>alert('登录成功！');location='../admin/admin_center/admin_center.php';</script>";
		  }
	  }else{
		    echo "<script>alert('用户名或密码错误！');location='../login/login.php?login=".$href."';</script>";
		  }
?>
</body>
</html>