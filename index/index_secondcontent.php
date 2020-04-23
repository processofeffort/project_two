<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>二级回复功能</title>
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
		$cid=$_POST['cid'];
		$cruser=$_POST['cruser'];
		$cuser= $_POST['cuser'];
		$ssite= $_POST['ssite'];
		$csecondtxt= $_POST['csecondtxt'];
		$userid= $_POST['rtext'];
		$contentid= $_POST['rtxt'];
		$wtitle=$_POST['rtitle'];
  		$ctext=$_POST['ctxt'];
  		$wdatatime=msecdate($_SESSION['time']);
  		$sqlstr1="insert into scontent(s_ccid,s_tid,s_cid,s_ruser,s_reuser,s_own,s_ocontent,s_content,s_datatime,s_call,s_cup,s_cdown,s_cclasses,s_cif) values('".$cid."','".$userid."','".$contentid."','".$cuser."','".$cruser."',2,'".$csecondtxt."','".$ctext."','".$wdatatime."',0,0,0,'".$ssite."',1)";
		$sqlstr2="update content set c_all=c_all+1 where c_cid='".$cid."'";
		$sqlstr3="update scontent set s_call=s_call+1 where s_ccid='".$cid."'";
		$word3=mysqli_query($conn,$sqlstr3);
		$word2=mysqli_query($conn,$sqlstr2);		
		$word=mysqli_query($conn,$sqlstr1);				
		if (!$word) {
				printf("Error: %s\n", mysqli_error($conn));
			exit();
			}
			if($word>0){
			echo "<script>alert('回复成功');location='../comment/information.php?title=".$wtitle."&&mid=".$contentid."&&belong=".$ssite."'</script>";
			}
		
	}
	?>
</body>
</html>