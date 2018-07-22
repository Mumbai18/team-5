<?php
session_start();

include('header.php');
define('DB_SERVER', 'localhost');

define('DB_USERNAME', 'root');

define('DB_PASSWORD', '');
define('DB_DATABASE', 'annadhan');
$db =mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
//checking connection
/*if(!$db)
die("Connection error:".mysqli_connect_error()."<br>");
echo "Connection succesful";*/

if($_SERVER['REQUEST_METHOD'] == "POST"){
   // $name = mysqli_real_escape_string($db,$_POST['fname']);
    $id = $_SESSION["ID"];
    //$id = mysqli_real_escape_string($db,$_GET['id']);
    //echo $_POST["id"];
    
   // $query = mysqli_query($db,"UPDATE donor SET Availability=1 WHERE id='$id'") or die(mysqli_error($con));
    $query = "UPDATE donor SET Availability='1' WHERE id=$id";
    if(mysqli_query($db,$query)){
        echo '<div class="container"><div class="jumbotron"><h3>Updated</h3></div></div>';
    }
    else
        echo '<div class="container"><div class="jumbotron"><h3>Failed</h3></div></div>';


}

?>