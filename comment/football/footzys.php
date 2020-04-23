<?php
include("../../conn/DBDA.class.php");
$db = new DBDA(); 
$key = $_POST["key"];
$num = 10;
$sql = "select count(*) from comment where belong like N'%{$key}%' and classes=N'足球'";
$zts = $db->StrQuery($sql); 
echo ceil($zts/$num);
?>