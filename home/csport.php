<?php
include("../conn/DBDA.class.php");
$db = new DBDA();
$key = $_POST["key"];
$key1 = $_POST["key1"];
$page = $_POST["page"];
$num = 10;
$tiao = ($page-1)*$num;
if($key1==0){
if(preg_match('/^[\x{4e00}-\x{9fa5}]+$/u',$key)>0){
	$sql = "select * from comment where title like '%{$key}%' limit {$tiao},{$num}";
}else if($key==0){
	$sql = "select * from comment limit {$tiao},{$num}";
}
else{
	$sql = "select * from comment where title like '%{$key}%' limit {$tiao},{$num}";
}	
}else{
if(preg_match('/^[\x{4e00}-\x{9fa5}]+$/u',$key)>0){
	$sql = "select * from comment where title='".$key."' limit {$tiao},{$num}";
}else{
	$sql = "select * from comment where title='".$key."' limit {$tiao},{$num}";
}	
}
echo $db->JSONQuery($sql);
?>
