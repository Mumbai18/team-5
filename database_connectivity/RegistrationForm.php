<!DOCTYPE html>
<!--
HTML basic layout of the registration form for project ONLINE TUTORIALS
Authors- Prashmika Jaiswal, Anushka Kanal, Sanjeet Jain 
COMPS C-13 T.E TSEC
-->
<?php
include("connect.php");

   session_start();

  

   if($_SERVER["REQUEST_METHOD"] =="POST") {

      // username and password sent from form
		
	$id =1;
		$fname = mysqli_real_escape_string($db,$_POST['fname']);
        $lname = mysqli_real_escape_string($db,$_POST['lname']);
        $email = mysqli_real_escape_string($db,$_POST['ename']);
        $dob = mysqli_real_escape_string($db,$_POST['dob']);
        $password = mysqli_real_escape_string($db,$_POST['pass']);
        $add = mysqli_real_escape_string($db,$_POST['add']);
        $phone = mysqli_real_escape_string($db,$_POST['pname']);
        $gen = mysqli_real_escape_string($db,$_POST['gen']);
        $course = mysqli_real_escape_string($db,$_POST['course']);
        $sql="INSERT INTO SData(Firstname,Lastname,Dob,Address,Phone,Email,Password,Gender,Course) VALUES('$fname','$lname','$dob','$add','$phone','$email','$password','$gen','$course')";
        
		
		$result = mysqli_query($db,$sql);

		$sql = "SELECT Firstname FROM SData WHERE Firstname = '$fname' and Password = '$password'";

		$result = mysqli_query($db,$sql);

		$row =mysqli_fetch_array($result,MYSQLI_ASSOC);

//      $active = $row['active'];

		$count = mysqli_num_rows($result);                      

		if($count == 1) {

       //  session_register("myusername");

         $_SESSION['login_user'] =$myusername;

         header("location: login.php");

        }
       else 
       {

         $error = "Username Already Exists";
           echo $error ;

      }



      }

?>

<html>
    <head>
        <title>Online Tutorial Registration</title>
        <link rel="stylesheet" type="text/css" href="../resources/formpage.css">
<script type="text/javascript">
function validateForms()
{
    var validl=/^[A-Za-z]+$/;
    var valide=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
   // var phoneno=/^[0-9]{10}+$/;  
    
    
    var x = document.forms["myForm"]["fname"].value;
    if (x == null || x == ""|| !x.match(validl))
       {
       	 alert("Name must be filled out");
        		return false;
        }
        
    var y = document.forms["myForm"]["lname"].value;
    if (y == null || y == ""|| !y.match(validl))
       { 	alert("Name must be filled out");
       	 return false;
        }
    
     var e= document.forms["myForm"]["ename"].value;
      if( e = null || e == ""|| !e.match(valide) )
         {
            alert( "Please provide your valid Email!" );
           document.myForm.ename.focus() ;
            return false;
         }
 
	var a = document.forms["myForm"]["add"].value;
	if(a==" " )
	{
		alert("please Enter the address");
		return false;
	}
	if((a.length < 20) || (a.length > 100))
	{
		alert(" Your textarea must be 20 to 100 characters");
		return false;
	}
	
	var p = document.forms["myForm"]["pass"].value;
	var rep = document.forms["myForm"]["re-pass"].value;
	if(p != rep)    {
	        alert("The password must be same");
	        return false;
	 }

    
}
</script>

    </head>
    <body>
      
      <header >
    <ul id="logo" class="bars">        
         <li><img alt="logo" src="resources/tutorial_logo.png" ></li>
		<li id="signup"><a href="RegistrationForm.php">SIGN UP</a></li>
           <li id="login">
		   <?php if(isset($_SESSION['login_user']))	{
		echo '<a href="logout.php">LOGOUT</a>';
		}
		else 	{
   echo '<a href="login.php">LOGIN</a>';
   }
   ?>
		</ul>         
<ul id="menu" class="bars">
  <li><a class="active" href="../index.php">Home</a></li>
  <li><a href="../studentsportal.php">Student Library</a></li>
  <li><a href="../video.php">Videos</a></li>
  <li><a href="../store2.php">Book Store</a></li>
</ul>
    </header>
	

        <table>
            <tr>
                <td id="index"></td>
                <td id="middle">

<form name="myForm" onsubmit="return validateForms()" method="post" action="">
<table>
<center><tr>
   <td><h1 align="center">Registration Form  </h1></td>
</tr><center>


<table border='0' width='200px' cellpadding='0' cellspacing='2' align='center'>
<tr>
    <td align='center'>FirstName:</td>
    <td><input type='text' name='fname'></td>
</tr>

<tr>
    <td align='center'>Last Name:</td>
    <td><input type='text' name='lname'></td>
</tr>

<tr>
    <td align='center'>Date Of Birth:</td>
    <td><input type='date' name='dob'></td>
</tr>

<tr>
    <td align='center'>Address:</td>
    <td>
    <textarea name="add" cols="24" rows="2"> </textarea></td>
</tr>

<tr>
    <td align='center'>Phone:</td>
    <td><input type='tel' name='pname'></td>
</tr>

<tr>
    <td align='center'>Email:</td>
    <td><input type='email' name='ename'></td>
</tr>

<tr>
    <td align='center'>Password:</td>
    <td><input type='password' name='pass'></td>
</tr>
<tr>
    <td align='center'>Re-Type Password:</td>
    <td><input type='password' name='re-pass'></td>
</tr>

<tr>
    <td align='center'>Gender:</td>
    <td><input type="radio" name='gen' value="Male">Male<br>
        <input type="radio" name='gen' value="Female">Female</td>
</tr>
<tr>
    <td align='center'>Course:</td>
    <td><select name='course'>
    <option value="10th">10th</option>
      <option value="12th">12th</option>
    </td>
</tr>
    
     
<table border='0' cellpadding='0' cellspacing='2' width='200px' align='center'>
<tr>
    <td align='center'><input type='submit' name='REGISTER' value="submit"></td>
</tr>

</table>
</table>

</table>

    
</form>

         <td id="right"> 
                  
                </td>
            </tr>
        </table>

        <br />  
        <footer>
            <table>
                <tr> 
                    <th><a href="">Quick Links</a></th> 
                    <th><a href="">Contact us</a></th>  
                    <th><a href=""> APP links</a></th> 
                    <th><a href=""> tool links </a></th> 
                </tr>
            </table>    
            XYZ TUTORIALS @2007 all copyrights reserved
        </footer>
    </body>
</html>
