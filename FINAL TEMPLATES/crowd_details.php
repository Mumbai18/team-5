
<?php
include("base.php");
include_once("connect.php");
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){
$lat = $_SESSION['lat'];
$longi = $_SESSION['long'];
$ppl = $_SESSION['noofpeople'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Crowd Details</title>
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
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<!-- font-awesome-icons -->
<!-- //font-awesome-icons -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
</head>
<body>
<!-- banner -->
	<div class="center-container">
		<div class="main">
			<h1 class="w3layouts_head">Crowd Details</h1>
				<div class="w3layouts_main_grid">
					<form action="entercrowd.php" method="post" class="w3_form_post" id="forms">
						<div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">
								<label>Area</label>
								<input type="text" name="area" placeholder="" >
							</span>
						</div>
                        
                        <div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">
								<label>No. of people</label>
								<input type="text" name="noofpeople" placeholder="" required="">
							</span>
						</div>

                        
                        
					<div class="content-w3ls">
						<div class="form-w3ls">
						</div>
						
						<div class="clear"></div>
					</div>
					<div class="w3_main_grid">
						<div class="w3_main_grid_right">
                            <script>
                                function formsubmit(){
                                    
                                    $("#forms").submit();
                                    
                                }
                            </script>
                                
                            <button type="button"  style="background-color:green" class="detect" onclick="formsubmit();">Submit</button>
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
    
<script>
var a=[],b,c=1;
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
	console.log("Pos", position);
    a[0]=position.coords.latitude;  
    a[1]=position.coords.longitude; 
    console.log(a[0]+","+a[1]);
    <p></p>
    <input type="button" name="lat" id="lat">
    <input type="button" name="long" id="long">
}
$('.detect').click(function(){
	
	
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
    var area = build+","+street+","+sublocality+","+locality+","+city;
//    $('#address_locate').val(build+","+street+","+sublocality+","+locality+","+city);
    document.getElementsByName("area").innerHTML = area;
    
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
});
});    
</script>

    
</body>
</html>