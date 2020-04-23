<?php
include("../../conn/DBDA.class.php");
$db = new DBDA();
$keyword=$_POST["keyword"];
$result="select * from user inner join report on report.wuser=user.username where username='".$keyword."'";
echo $db->JSONQuery($result);
?>
