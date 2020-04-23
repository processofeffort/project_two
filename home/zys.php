<?php
include("../conn/DBDA.class.php");
$db = new DBDA(); 
$key = $_POST["key"];
$key1 = $_POST["key1"];
$num = 10;
if($key1==0){
if(preg_match('/^[\x{4e00}-\x{9fa5}]+$/u',$key)>0){
	$sql = "select count(*) from comment where title like N'%{$key}%'";
}else if($key==0){
	$sql = "select count(*) from comment";
}
else{
	$sql = "select count(*) from comment where title like N'%{$key}%'";
}
}else{
if(preg_match('/^[\x{4e00}-\x{9fa5}]+$/u',$key)>0){
	$sql = "select count(*) from comment where title=N'".$key."'";
}else{
	$sql = "select count(*) from comment where title=N'".$key."'";
}
}
$zts = $db->StrQuery($sql); 
echo ceil($zts/$num);
?>