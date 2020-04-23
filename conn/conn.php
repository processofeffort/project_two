<?php
  $host="";
  $userName="";
  $password="";
  $dbName="";
  $conn = mysqli_connect($host,$userName,$password,$dbName);
  mysqli_query($conn,"set names utf8");
?>
