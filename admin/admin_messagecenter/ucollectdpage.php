<?php
include("../../conn/DBDA.class.php");
$db = new DBDA(); 
$num = 10;
$sql = "select count(*) from ucollectd";
$zts = $db->StrQuery($sql); 
echo ceil($zts/$num);
?>