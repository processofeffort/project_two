<?php
include("../conn/DBDA.class.php");
$db = new DBDA();
$page1 = $_POST["page1"];
$key = $_POST["key"];
$num = 10;
$tiao = ($page1-1)*$num;
$sql = "select * from user inner join scontent on user.id=scontent.s_tid and s_ccid='".$key."' limit {$tiao},{$num}";
echo $db->JSONQuery($sql);
?>
