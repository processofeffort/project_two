<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
</head>
<body>
<?php
$id=$_GET['id'];
$name=$_GET['name'];
if($id)
{
	include("../conn/conn.php");
	$sql = "select * from user where name='$name'";
	$result = mysqli_query($conn,$sql);
	 if (!$result) {
		printf("Error: %s\n", mysqli_error($conn));
		exit();
}
	//这里的echo输出的内容便是将要返回给之前byphp()这个函数的值
	while($myrow=mysqli_fetch_array($result)){
		if($myrow['anwser']==$id){
			echo "<span id='sp12' style='color:green'>";
			echo "密保正确";
			echo "</span>";
		}else{
			echo "<span id='sp12' style='color:red'>";
			echo "密保错误";
			echo "</span>";			
		}
	}
}
?>
<?php /*?><?php
$userName=$_GET['username'];
if($userName)
{
	include("../conn/conn.php");
	$sql2 = "select * from tb_visitor where username='$userName'";
	$result2 = mysqli_query($conn,$sql2);
	 if (!$result2) {
		printf("Error: %s\n", mysqli_error($conn));
		exit();
}
	//这里的echo输出的内容便是将要返回给之前byphp()这个函数的值
	if(is_array(mysqli_fetch_row($result2)))
	{
		echo "<span style='color:red'>";
		echo "用户昵称已经存在！";
		echo "</span>";
	}
	else
	{
		echo "<span style='color:green'>";
		echo "用户昵称符合要求";
		echo "</span>";
	}
}
?><?php */?>
</body>
</html>