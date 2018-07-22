<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php

define('DB_SERVER', 'localhost');
//
define('DB_USERNAME', 'root');

define('DB_PASSWORD', '');
define('DB_DATABASE', 'annadhan');
$db =mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
//checking connection
if(!$db)
die("Connection error:".mysqli_connect_error()."<br>");
//echo "Connection succesful";




include("base.php");
//require_once("connect.php");
session_start();
//echo $_POST["dummy"];


?>





<!DOCTYPE html>
<html lang="en">
<head>
<title>Donation Form</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Event Registration Form Widget Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<!-- //custom-theme -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<!--<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>-->
<!-- //js -->
<!-- font-awesome-icons -->
<!-- //font-awesome-icons -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
	<script>
var a=[],b,c=1;
		function abc(){
									$("#dummy").val(5);
									retlatlong();
									setTimeout(function(){$("#form1").submit() }, 1000);
									
								}
		function retlatlong(){
	
	console.log("hiii");
//$.getJSON("http://ipinfo.io", function (response) {
//	console.log(response)
//    b=response.loc;
//    a=b.split(',');
$.getJSON("http://apis.mapmyindia.com/advancedmaps/v1/t1s3ureuiu3dq27pm3aiq21g7bhlx574/rev_geocode?lat="+a[0]+"&lng="+a[1]).done(function(res){
    //console.log(a+" , "+b);
    var build=res.results[0].houseName;
    var street=res.results[0].street;
    var sublocality=res.results[0].subLocality;
    var locality=res.results[0].locality;
    var city=res.results[0].city;
    var arr=[build,street,sublocality,locality,city];
    var text=document.getElementById('address_locate');
    console.log(build+","+street+","+sublocality+","+locality+","+city);
	$("#lat").val(a[0]);
	$("#long").val(a[1]);
//    $('#address_locate').val(build+","+street+","+sublocality+","+locality+","+city);
    for(var i=0;i<=4;i++){
        if(arr[i]!="" && c>0){
//            $('#address_locate').val(arr[i]+",");
              if(i!=4){
                text.value+=arr[i]+",";
            }
            if(i==4){
                text.value+=arr[i];
            }
        }
    }
    c--;
});
//});
}
$(document).ready(function(){
    getLocation();
function getLocation() {
    if (navigator.geolocation) {
		console.log("Getting info");
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}
function showPosition(position) {
//	console.log("Pos", position);
    a[0]=position.coords.latitude;  
    a[1]=position.coords.longitude; 
    console.log(a[0]+","+a[1]);
}

});    
</script>
</head>
<body>
<?php

	if($_SERVER['REQUEST_METHOD']=="POST"){
	$name = mysqli_real_escape_string($db,$_POST['donor_name']);
        $location = mysqli_real_escape_string($db,$_POST['address_locate']);
        $quantity = mysqli_real_escape_string($db,$_POST['qty']);
        $long = mysqli_real_escape_string($db,$_POST['long']);
        $lat = mysqli_real_escape_string($db,$_POST['lat']);
        $qty = mysqli_real_escape_string($db,$_POST['qty']);
		$fresh=1;
//        $phone = mysqli_real_escape_string($db,$_POST['pname']);
//        $gen = mysqli_real_escape_string($db,$_POST['gen']);
//        $course = mysqli_real_escape_string($db,$_POST['course']);
        $sql="INSERT INTO live(donor_name,Latitude,Longitude,Quantity,Fresh) VALUES('$name','$lat','$long','$qty','$fresh')";
        
		
//		$result = mysqli_query($db,$sql);
//		if($result){
//			echo "Successful";
//		}
//		else
//			echo "Failure";
}
	
?>
<!-- banner -->
	<div class="center-container">
		<div class="main">
			<h1 class="w3layouts_head">Donation Form</h1>
				<div class="w3layouts_main_grid">
					<form action="donation.php" method="post" class="w3_form_post" id="form1">
						<div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">
								<label>Your Name</label>
								<input type="text" name="donor_name" placeholder="Your Name" required="" id="donor_name">
								<span style="margin-top:5px"></span>
								<label>Your Location</label>
								<input type="text" name="address_locate" id="address_locate">
								<span style="margin-top:5px"></span>
								<label>Total Servings</label>
								<input type="text" name="qty" placeholder="1" required="" id="qty">
								<input type="hidden" id="lat" name="lat">
								<input type="hidden" id="long" name="long">
							</span>
						</div>
					<div class="content-w3ls">
						<div class="form-w3ls">
							<div class="content-wthree2">
								<div class="grid-w3layouts1">
									<div class="w3-agile1">
										<label>When was the food cooked?</label>
										<ul>
											<li>
												<input type="radio" id="a-option" name="time" value="Morning">
												<label for="a-option">Morning </label>
												<div class="check"></div>
											</li>
											<li>
												<input type="radio" id="b-option" name="time" value="Afternoon">
												<label for="b-option">Afternoon </label>
												<div class="check"></div>
											</li>
                                            <li>
												<input type="radio" id="c-option" name="time" value="Evening">
												<label for="c-option">Evening </label>
												<div class="check"></div>
											</li>
                                            <li>
												<input type="radio" id="d-option" name="time" value="Last Night">
												<label for="d-option">Last Night</label>
												<div class="check"></div>
											</li>
										</ul>
									</div>	
								</div>
								<div class="clear"></div>
							</div>
						</div>
						<div class="form-w3ls-1">
							<div class="grid-w3layouts1">
								<div class="w3-agile1">
									<label>Condition of thr food:</label>
										<ul>
											<li>
												<input type="radio" id="f-option" name="condition" value="Frozen">
												<label for="f-option">Frozen</label>
												<div class="check"></div>
											</li>
											<li>
												<input type="radio" id="e-option" name="condition" value="Room Temperature">
												<label for="e-option">Room Temperature</label>
												<div class="check"><div class="inside"></div></div>
											</li>
										</ul>
								</div>	
							</div>		
						</div>
						<div class="clear"></div>
					</div>
					<div class="w3_main_grid">
						<div class="w3_main_grid_right">
<!--							<input type="submit" value="Submit" class="submit-btn" name="submit-set" class="detect">-->
							<input type="hidden" id="dummy" name="dummy">
							<script>
								
							</script>
								<button type="button" class=" btn btn-primary detect" style="background-color:green;border:none;" name="submit_ans" id="submit_ans" onclick="abc();">Submit</button>
						</div>
					</div>
				</form>
			</div>
		<!-- Calendar -->
			<link rel="stylesheet" href="css/jquery-ui.css" />
				<script src="js/jquery-ui.js"></script>
					<script>
						$(function() {
							$( "#datepicker" ).datepicker();
						});
					</script>
		<!-- //Calendar -->
		</div>
	</div>
<!-- //footer -->
	
<!--<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>-->

</body>
</html>