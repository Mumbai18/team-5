<?php
session_start();
//include('header1.php');
//include('base.php');


define('DB_SERVER', 'localhost');

define('DB_USERNAME', 'root');

define('DB_PASSWORD', '');
define('DB_DATABASE', 'annadhan');
$db =mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

   if($_SERVER["REQUEST_METHOD"] =="POST") {

      // username and password sent from form

      $Firstname =mysqli_real_escape_string($db,$_POST['Firstname']);

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
         header("location: newreg.php");

      }

else {

         $error = "Your Login Name or Password is invalid";
echo $error ;
      }

   }

?>

<html>
    <head>
        <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Starter</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        
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
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Satisfy' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{% static 'music/style.css' %}"/>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <header class="main-header">
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Annadhan</b></span>
    </a>

    <nav class="navbar navbar-inverse">
    <div class="container-fluid">

        <!--Header-->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#topNavBar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!--Items-->
        <div class="collapse navbar-collapse " id="topNavBar">
            <ul class=" nav navbar-nav">
                <li class="active">
                    <a href="donation.php">
                        <span  class="glyphicon glyphicon-cutlery" aria-hidden="true"></span> Donate
                    </a>
                </li>
                <li class="">
                    <a href="#">
                        <span  class="glyphicon glyphicon-star" aria-hidden="true"></span> Volunteer
                    </a>
                </li>
                 <li class="">
                    <a href="#">
                        <span  class="glyphicon glyphicon-earphone" aria-hidden="true"></span> Contact Us
                    </a>
                </li>
                 <li class="">
                    <a href="newreg.php">
                        <span  class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> New Registrations
                    </a>
                </li>
                 <li class="">
                    <a href="don_requests.php">
                        <span  class="glyphicon glyphicon-leaf" aria-hidden="true"></span> Donation Requests
                    </a>
                </li>
            </ul>
        </div>
        </div>
    </nav>
</header>
        
        
        	<div class="center-container">
		<div class="main">
			<h1 class="w3layouts_head">LOGIN FORM</h1>
				<div class="w3layouts_main_grid">
					<form action="#" method="post" class="w3_form_post">
                        
                        <div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">
								<label>Login ID</label>
								<input type="text" name="Firstname" placeholder="" required="">
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

    </body>
</html>