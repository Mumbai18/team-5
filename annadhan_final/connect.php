<?php

define('DB_SERVER', 'localhost');

define('DB_USERNAME', 'root');

define('DB_PASSWORD', '');
define('DB_DATABASE', 'annadhan');
$db =mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
//checking connection
if(!$db)
die("Connection error:".mysqli_connect_error()."<br>");
//echo "Connection succesful";


?>