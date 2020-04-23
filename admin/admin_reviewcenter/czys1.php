<?php
include("../../conn/DBDA.class.php");
$db = new DBDA(); 
$key = $_POST["key"];
$num = 10;
$sql = "select count(*) from content inner join comment on comment.mid=content.cid and content.own!=1 where content.tid like N'%{$key}%'";
$zts = $db->StrQuery($sql); 
echo ceil($zts/$num);
?>