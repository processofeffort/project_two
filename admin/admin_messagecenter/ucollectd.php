<?php
include("../../conn/DBDA.class.php");
$db = new DBDA();
$page = $_POST["page"];
$num = 10;
$tiao = ($page-1)*$num;
$sql = "select *from ucollectd limit {$tiao},{$num}";
echo $db->JSONQuery($sql);
?>
