<?php
include("../conn/conn.php");
header('content-type:application/json;charset=utf8');
$key=$_POST["key"];
$content=$_POST["content"];
$result="select * from user,content where user.id=content.tid and content=N'".$content."' and username='".$key."'";
$result_query=mysqli_query($conn,$result);
$result1= array();
while($row=mysqli_fetch_assoc($result_query)){    
       $result1=$row;
        }           
        echo json_encode($result1);
?>