
<?php
include("base.php");

session_start();

$email = $_SESSION['email'];
$password = $_SESSION['password'];

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

if(mysqli_query($conn, "SELECT Name as FROM Donor WHERE email ='$email' AND password = '$password'"))
{
 $Name = mysqli_query($conn, "SELECT Name FROM Donor WHERE email ='$email'");
 $_SESSION['login_user']= $Name;
  $expireAfter = 60;
 
    if(isset($_SESSION['last_action'])){
        $secondsInactive = time() - $_SESSION['last_action'];
        $expireAfterSeconds = $expireAfter * 60;
        
        if($secondsInactive >= $expireAfterSeconds){
            session_unset();
            session_destroy();
        }
        
                    

    $_SESSION['last_action'] = time();  
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>LOGIN</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Event Registration Form Widget Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
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
			<h1 class="w3layouts_head">LOGIN</h1>
				<div class="w3layouts_main_grid">
					<form action="#" method="post" class="w3_form_post">
                        
                        <div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">
								<label>Email</label>
								<input type="text" name="email" placeholder="" required="">
							</span>
						</div>
                        
                        <div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">
								<label>Password</label>
								<input type="password" name="password" placeholder="" required="">
							</span>
						</div>
                        
                        
                        
					<div class="content-w3ls">
						<div class="form-w3ls">
						</div>
						
						<div class="clear"></div>
					</div>
					<div class="w3_main_grid">
						<div class="w3_main_grid_right">
							<input type="submit" value="Submit" style="background-color:green">
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
</body>
</html> 