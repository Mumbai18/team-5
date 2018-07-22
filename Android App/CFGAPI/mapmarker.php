<?php
$lat=$_GET["lat"];
$longi=$_GET["longi"];
?>
<html>
    <head>
        <style>
             #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
        </style>
    </head>
<body>
<div id="map" ></div>
    <script>

      function initMap() {
        var myLatLng = {lat: <?php echo $lat; ?>, lng: <?php echo $longi; ?>};

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 13,
          center: myLatLng
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Hello World!'
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDDchxQv2kePoyr4MskFYSz6kstKxj_QQI&callback=initMap">
    </script>
</body>
