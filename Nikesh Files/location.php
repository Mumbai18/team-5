<?php  
require_once("connect.php")
$query = "SELECT Latitude,Longitude from donor";
    $result = mysqli_query($db, $query);

    //JavaScript Latitude and Longitude
//    var latitude = [];
//    var longitude = [];
//    var coordinates = [];

    $coords = array();
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            
            $coords[] = $row;

        }
		$lat = $_GET["Lat"];
		$longi = $_GET["Long"];
		$min = 10000000;
		$index = 0;
		for($i=0; $i<4; $i++){
			
        	$x = $coords[$i]["Latitude"];
			$y = $coords[$i]["Longitude"];
			$dis = sqrt(pow(($lat-$x),2)+pow(($longi-$y),2));
			if($dis<$min)
			{
				$min = $dis;
				$index = $i;
			}
		}
		print $coords[$index]["Latitude"];
		print $coords[$index]["Longitude"];
		
    } else {
        echo "Jhol hain";
    }


    mysqli_close($db);
?>