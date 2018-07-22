<?php
    session_start();
	if(!isset($_SESSION['login_user']))	{
		header("Location: login.php");
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Satisfy' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<!--    <link rel="stylesheet" type="text/css" href="music/style.css"/>-->

</head>
<body>
    <nav class="navbar navbar-inverse">
    <div class="container-fluid">

        <!--Header-->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#topNavBar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="home.php">Annadhan</a>
        </div>

        <!--Items-->
        <div class="collapse navbar-collapse " id="topNavBar">
            <ul class=" nav navbar-nav">
                <li class="active">
                    <a href="donation.php",  style="color:gray">
                        <span  class="glyphicon glyphicon-cutlery" aria-hidden="true" style="color:white"></span> Donate
                    </a>
                </li>
                <li class="">
                    <a href="#">
                        <span  class="glyphicon glyphicon-star" aria-hidden="true" style="color:white"></span> Volunteer
                    </a>
                </li>
                 <li class="">
                    <a href="#">
                        <span  class="glyphicon glyphicon-asterisk" aria-hidden="true" style="color:white"></span> Contact Us
                    </a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="" id=login>
                    <?php if(isset($_SESSION['login_user']))	{
		echo '<a href="Forms/logout.php">LOGOUT</a>';
		}
		else 	{
   echo '<a href="Forms/login.php">LOGIN</a>';
   }
   ?>
                </li>
            </ul>
            

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="#">
                        <span  class="glyphicon glyphicon-pencil" aria-hidden="true" style="color:white"></span> Register
                    </a>
                </li>

            </ul>

        </div>


    </div>
</nav>
</body>
</html>