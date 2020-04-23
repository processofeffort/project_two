<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>回复功能</title>
</head>
<body>
<?php
  session_start();
  if(!isset($_SESSION['time'])){
	   echo "<script>alert('您无权限回复,请先登录！');location='../login/login.php';</script>";
	  }else if(time()-$_SESSION['time']<6000){
		  $_SESSION['time']=time();  
?>
<?php
//连接数据库
function msecdate($time)
{
   $tag='Y-m-d H:i:s';
   $a = substr($time,0,10);
   $b = substr($time,10);
   $date = date($tag,$a);
   return $date;
}
  $host="127.0.0.1";
  $userName="root";
  $password="root";
  $dbName="db_tribune";
  $conn = mysqli_connect($host,$userName,$password,$dbName);
  mysqli_query($conn,"set names utf8");
    if(isset($_POST['sub'])){
		$userid= $_POST['rtext'];
		$contentid= $_POST['rtxt'];
		$contentitle= $_POST['rtitle'];
		$rname=$_POST['rname'];
		$rbelong=$_POST['rbelong'];
  		$usertxt= $_POST['txt'];
		$usersite= $_POST['usite'];
		$usertime=msecdate($_SESSION['time']);
  		$sqlstr1="insert into content(tid,cid,reuser,own,content,datatime,c_all,c_classes) values('".$userid."','".$contentid."',N'".$rname."','0','".$usertxt."','".$usertime."','0','".$usersite."')";
		$sqlstr2="update comment set review=review+1 where mid='".$contentid."'";
		$sqlstr3="update comment set datime='".$usertime."' where mid='".$contentid."'";
		$word2=mysqli_query($conn,$sqlstr3);
		$word1=mysqli_query($conn,$sqlstr2);	
		$word=mysqli_query($conn,$sqlstr1);	
			if (!$word) {
				printf("Error: %s\n", mysqli_error($conn));
			exit();
			}
			if($word>0){
			echo "<script>alert('回复成功');location='../comment/information.php?title=".$contentitle."&&mid=".$contentid."&&belong=".$rbelong."'</script>";
			}
	}
	?>
<?php
 }else{
	 echo "<script>alert('登录超时，请重新登录！');location='../login/login.php';</script>";
	 }
?>
</body>
</html>