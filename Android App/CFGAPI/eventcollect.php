<?php
include 'connect.php';
$event=$_POST["event_id"];
$sql = "UPDATE live SET collected=1 WHERE id='".$event."'  ";
if(mysqli_query($conn,$sql))
{
   $arr = array("status" => "1");
   echo json_encode($arr);
}else {
  $arr = array("status" => "0");
  echo json_encode($arr);
}
?>
