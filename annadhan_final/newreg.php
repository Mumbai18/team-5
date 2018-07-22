<?php
session_start();
	if(!isset($_SESSION['login_user']))	{
		header("Location: login.php");
	}
//session_start();
//include('header1.php');
//include('base.php');


define('DB_SERVER', 'localhost');

define('DB_USERNAME', 'root');

define('DB_PASSWORD', '');
define('DB_DATABASE', 'annadhan');
$db =mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
//checking connection
//if(!$db)
//die("Connection error:".mysqli_connect_error()."<br>");
//echo "Connection successful";

//ssion_start();


$query = mysqli_query($db,"SELECT * FROM donor where Availability=0") or die(mysqli_error($con));
if(mysqli_num_rows($query) > 0) {
    while($row = mysqli_fetch_array($query)) {
        $_SESSION["ID"] = $row['id'];
        echo '<div class="container"><div class="jumbotron"><span ><tr><td><h4>'.$row['id'].'</h4></td><br><td><h4>'.$row['Name'].'</h4></td><br><td><h4>'.$row['Phone'].'</h4></td><br></span><td><form action="validate_registration.php" method="POST" name="Submit1"><input type="hidden" name="tempId" value="'.$row["id"].'"/><input type="submit" name="submit-btn" value="View/Update Details" /></form></td></tr</div></div>';
        
        /*8echo "<tr><td>".$row['id']."</td><br>";
        echo "<td>".$row['Name']."</td><br>";
        echo "<td>".$row['Phone']."</td><br>";
        
        echo "<td><form action='validate_registration.php' method='POST' name='Submit1'><input type='hidden' name='tempId' value='".$row["id"]."'/><input type='submit' name='submit-btn' value='View/Update Details' /></form></td></tr>";*/
}}
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
    <a href="home.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Annadhan</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Annadhan</b></span>
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
    </body>
</html>
