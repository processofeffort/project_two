<?php
include("../../conn/DBDA.class.php");
$db = new DBDA();
$page = $_POST["page"];
$key = $_POST["key"];
$num = 10;
$tiao = ($page-1)*$num;
$sql = "select *from scontent inner join comment on comment.mid=scontent.s_cid and scontent.s_own!=1 where scontent.s_tid like N'%{$key}%' limit {$tiao},{$num}";
echo $db->JSONQuery($sql);
?>
