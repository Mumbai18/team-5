
<?php
/*include("base.php");

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
*/

   define('DB_SERVER', 'localhost');

define('DB_USERNAME', 'root');

define('DB_PASSWORD', '');
define('DB_DATABASE', 'Student');
$db =mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

   session_start();
   if($_SERVER["REQUEST_METHOD"] =="POST") {

      // username and password sent from form

      $Firstname =mysqli_real_escape_string($db,$_POST['username']);

      $password =mysqli_real_escape_string($db,$_POST['password']);
      $sql = "SELECT Firstname FROM SData WHERE Firstname = '$Firstname' and Password = '$password'";
 
      $result = mysqli_query($db,$sql);
      $row =mysqli_fetch_array($result,MYSQLI_ASSOC);

      //$active = $row['active'];
      $count = mysqli_num_rows($result);
      // If result matched $username and $password, table row must be 1 row
      if($count == 1) {

      //   session_register("Firstname");

         $_SESSION['login_user'] =$Firstname;
         header("location: option.php");

      }

else {

         $error = "Your Login Name or Password is invalid";
echo $error ;
      }

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
					<form action="login.php" method="post" class="w3_form_post">
                        
                        <div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">
								<label>User ID</label>
								<input type="text" name="username" placeholder="" required="">
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