<?php
include("../conn/DBDA.class.php");
$db = new DBDA(); 
$key = $_POST["key"];
$num = 10;
$sql = "select count(*) from content where cid like N'%{$key}%' and own=0";
$zts = $db->StrQuery($sql); 
echo ceil($zts/$num);
?>