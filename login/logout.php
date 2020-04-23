<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>退出登录</title>
</head>
<body>
<?php
session_start();
session_unset();
session_destroy();
$href=$_GET['login'];
if(strpos($href,"%")!==false){
$href1=str_replace("%","&&",$href);
echo "<script>alert('您已退出登录！');location.href='$href1';</script>";
}else{
echo "<script>alert('您已退出登录！');location.href='$href';</script>";
}
?>
</body>
</html>