<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>举报功能</title>
</head>
<body>
<?php
session_start();
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
		$wid=$_POST['wid'];
		$wtitle=$_POST['wtitle'];
		$wuser=$_POST['wuser'];
  		$wtext=$_POST['wtext'];
		$rbelong=$_POST['reportbelong'];
		$wcontact= $_POST['wcontact'];
  		$wsuser=$_POST['wsuser'];
  		$wdatatime=msecdate($_SESSION['time']);
  		$sqlstr1="insert into report(wid,wuser,wtext,wresult,wsuser,wdatatime,wstatus,wend) values('".$wid."','".$wuser."','".$wtext."','".$wcontact."','".$wsuser."','".$wdatatime."','审核中',0)";
		$word=mysqli_query($conn,$sqlstr1);
		if (!$word) {
				printf("Error: %s\n", mysqli_error($conn));
			exit();
			}
			if($word>0){
			echo "<script>alert('举报成功');location='../comment/information.php?title=".$wtitle."&&mid=".$wid."&&belong=".$rbelong."'</script>";
			}
		
	}
	?>
</body>
</html>