<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>regist</title>
</head>
<body>
<?php
  session_start();
function msecdate($time)
{
   $tag='Y-m-d H:i:s';
   $a = substr($time,0,10);
   $b = substr($time,10);
   $date = date($tag,$a);
   return $date;
}
  include("../conn/conn.php");
   if(isset($_POST['submit'])){
	  $name=$_POST['username'];
	  $password=$_POST['password'];
	  $userName=$_POST['userName'];
	  $envelope=$_POST['envelope'];
	  $mibao=$_POST['mibao'];
	  $anwser=$_POST['anwser'];
  	  $ctime=msecdate(time());
$sqlstr="insert into user(name,password,mibao,anwser,username,usermail,status,reportnumber,u_datatime) values('".$name."','".$password."','".$mibao."','".$anwser."','".$userName."','".$envelope."',1,0,'".$ctime."')";
	  $word=mysqli_query($conn,$sqlstr);	
	  if($word){
	    echo "<script>alert('注册成功');location='../login/login.php';</script>";
 	 }else{
	  echo "<script>alert('注册失败，请重新注册');location='../login/register.php';</script>";}
	  } 
?>
</body>
</html>