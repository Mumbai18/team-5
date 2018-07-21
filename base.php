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
            <a class="navbar-brand" href="{% url 'music:index' %}">Annadhan</a>
        </div>

        <!--Items-->
        <div class="collapse navbar-collapse " id="topNavBar">
            <ul class=" nav navbar-nav">
                <li class="active">
                    <a href="{% url 'music:index' %}">
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
                        <span  class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> Contact Us
                    </a>
                </li>
            </ul>

            

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="#">
                        <span  class="glyphicon glyphicon-off" aria-hidden="true"></span> Logout
                    </a>
                </li>

            </ul>

        </div>


    </div>
</nav>
</body>
</html>