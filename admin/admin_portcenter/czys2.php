<?php
include("../../conn/DBDA.class.php");
$db = new DBDA(); 
$key = $_POST["key"];
$num = 10;
$sql = "select count(*) from comment where author like N'%{$key}%'";
$zts = $db->StrQuery($sql); 
echo ceil($zts/$num);
?>