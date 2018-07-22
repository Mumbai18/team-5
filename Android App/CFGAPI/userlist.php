<?php
include 'connect.php';
$sql = "SELECT id,foodname,user_id,quantity,fresh,latitude,longitude,photoid,phone,donar_name FROM live WHERE collected=0";
$results=mysqli_query($conn,$sql);
$rows = array();
while($r = mysqli_fetch_assoc($results)) {
    $rows[] = $r;
  }
  print json_encode($rows);
?>
