<?php
session_start();
include('header.php');
//include('base.php');


define('DB_SERVER', 'localhost');

define('DB_USERNAME', 'root');

define('DB_PASSWORD', '');
define('DB_DATABASE', 'annadhan');
$db =mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
//checking connection
//if(!$db)
//die("Connection error:".mysqli_connect_error()."<br>");
//echo "Connection successful";

//ssion_start();


$query = mysqli_query($db,"SELECT * FROM donor where Availability=0") or die(mysqli_error($con));
if(mysqli_num_rows($query) > 0) {
    while($row = mysqli_fetch_array($query)) {
        $_SESSION["ID"] = $row['id'];
        echo '<div class="container"><div class="jumbotron"><span ><tr><td><h4>'.$row['id'].'</h4></td><br><td><h4>'.$row['Name'].'</h4></td><br><td><h4>'.$row['Phone'].'</h4></td><br></span><td><form action="validate_registration.php" method="POST" name="Submit1"><input type="hidden" name="tempId" value="'.$row["id"].'"/><input type="submit" name="submit-btn" value="View/Update Details" /></form></td></tr</div></div>';
        
        /*8echo "<tr><td>".$row['id']."</td><br>";
        echo "<td>".$row['Name']."</td><br>";
        echo "<td>".$row['Phone']."</td><br>";
        
        echo "<td><form action='validate_registration.php' method='POST' name='Submit1'><input type='hidden' name='tempId' value='".$row["id"]."'/><input type='submit' name='submit-btn' value='View/Update Details' /></form></td></tr>";*/
}}
?> 