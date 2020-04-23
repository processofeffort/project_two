<?php
include("../conn/DBDA.class.php");
$db = new DBDA(); 
$num = 2;
$sql = "select count(*) from scontent";
$zts = $db->StrQuery($sql); 
echo ceil($zts/$num);
?>