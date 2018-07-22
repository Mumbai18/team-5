<? php
    
session_start();

$lat = $_SESSION['lat'];
$longi = $_SESSION['long'];
$nop = $_POST['noofpeople'];
    
$servername = "localhost";
$username = "root";
$password_root = "";
$dbname = "annadhan";
// Create connection
$conn = mysqli_connect($servername, $username, $password_root, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}




$sql = "INSERT INTO crowd (Latitude, Longitude,Hungry)
VALUES ('".$lat."', '".$longi."','"1"')";

if (mysqli_query($conn, $sql)) {
    
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);


?>


?>