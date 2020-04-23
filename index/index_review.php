<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>发帖功能</title>
</head>
<body>
<?php
  session_start();
  if(!isset($_SESSION['time'])){
	   echo "<script>alert('您无权限发帖,请先登录！');location='../login/login.php';</script>";
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
		$contentid=$_POST['uid'];
		$contentTitle=$_POST['opt'];
  		$usertitle=$_POST['tit'];
  		$username=$_POST['rname'];;
  		$userreview= $_POST['txt'];
  		$usertime=msecdate($_SESSION['time']);
		$userbelong=$_POST['ubelong'];
		$usersite=$_POST['usite'];
  		$sqlstr1="insert into comment(iid,belong,title,author,txt,datime,presentime,classes) values('".$contentid."','".$contentTitle."','".$usertitle."',N'".$username."','".$userreview."','".$usertime."','".$usertime."','".$userbelong."')";
		$word=mysqli_query($conn,$sqlstr1);
		$sqlstr2="select *from comment where title=N'".$usertitle."'";
		$result2=mysqli_query($conn,$sqlstr2);
		$myrow2=mysqli_fetch_array($result2);
		$sqlstr="insert into content(tid,cid,reuser,own,content,datatime,c_classes) values('".$contentid."','".$myrow2['mid']."',N'".$username."','1','".$userreview."','".$usertime."','".$userbelong."')";
		$word1=mysqli_query($conn,$sqlstr);
		$sqlstr10="select *from content where content=N'".$userreview."'";
		$result10=mysqli_query($conn,$sqlstr10);
		$myrow10=mysqli_fetch_array($result10);
		$sqlstr5="insert into scontent(s_ccid,s_tid,s_cid,s_reuser,s_own,s_content,s_datatime,s_call,s_cup,s_cdown,s_cclasses,s_cif) values('".$myrow10['c_cid']."','".$contentid."','".$myrow10['cid']."',N'".$username."',1,'".$userreview."','".$usertime."',0,0,0,'".$userbelong."',0)";
		$word5=mysqli_query($conn,$sqlstr5);						
		if (!$word5) {
				printf("Error: %s\n", mysqli_error($conn));
			exit();
			}
			if($word5>0){
			echo "<script>alert('发帖成功');location='../comment/".$usersite."';</script>";
			}
	}
	?>
<?php
 }else{
	 $adminsite=$_POST['asite'];
	 echo "<script>alert('登录超时，请重新登录！');location='../login/".$adminsite."';</script>";
	 }
?>
</body>
</html>