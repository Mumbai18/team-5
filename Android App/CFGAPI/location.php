<?php  
require_once("connect.php");
$query = "SELECT Latitude,Longitude from crowd";
    $result = mysqli_query($conn, $query);

    //JavaScript Latitude and Longitude
//    var latitude = [];
//    var longitude = [];
//    var coordinates = [];

    $coords = array();
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;	
		}
		print json_encode($rows);
    } else {
        echo "Jhol hain";
    }


    mysqli_close($conn);
?>