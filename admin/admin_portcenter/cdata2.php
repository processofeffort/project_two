<?php
include("../../conn/DBDA.class.php");
$db = new DBDA();
$page = $_POST["page"];
$key = $_POST["key"];
$num = 10;
$tiao = ($page-1)*$num;
$sql = "select *from comment where author like N'%{$key}%' limit {$tiao},{$num}";
echo $db->JSONQuery($sql);
?>
