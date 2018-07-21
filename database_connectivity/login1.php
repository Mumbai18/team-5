<!DOCTYPE html>
<!--
HTML basic layout of the registration form for project ONLINE TUTORIALS
Authors- Prashmika Jaiswal, Anushka Kanal, Sanjeet Jain 
COMPS C1-3 T.E TSEC
-->

<?php

   include("connect.php");

   session_start();
   if($_SERVER["REQUEST_METHOD"] =="POST") {

      // username and password sent from form

      $Firstname =mysqli_real_escape_string($db,$_POST['Firstname']);

      $password =mysqli_real_escape_string($db,$_POST['password']);
      $sql = "SELECT Firstname FROM SData WHERE Firstname = '$Firstname' and Password = '$password'";

      $result = mysqli_query($db,$sql);
      $row =mysqli_fetch_array($result,MYSQLI_ASSOC);

      $active = $row['active'];
      $count = mysqli_num_rows($result);
      // If result matched $username and $password, table row must be 1 row
      if($count == 1) {

      //   session_register("Firstname");

         $_SESSION['login_user'] =$Firstname;
         header("location: ../studentsportal.php");

      }

else {

         $error = "Your Login Name or Password is invalid";
echo $error ;
      }

   }

?>

<html>
    <head>
        <title>Online Tutorial Registration</title>
        <link rel="stylesheet" type="text/css" href="../resources/formpage.css">

    </head>
    <body>
        <header>
            <table>
                <tr> 
                    <td><a href="phpwt/index.php">  <img alt="logo" src="resources/tutorial_logo.png" ></a></td>
                </tr>
            </table>
        </header>

        <br />  

        <table>
            <tr id="menu">
                <td> <a href="phpwt/index.php">home</a></td>  
                <td> <a href="phpwt/studentsportal.php">Students Portal</a></td>
                <td> <a href="">About Us</a></td>  
                <td> <a href="phpwt/store2.php">BOOK STORE</a></td>  
                <td> <a href=""> Chat Room </a></td> 
                <td> <a href=""> Videos </a></td> 
                <td><a href=""> Search </a></td>  
            </tr>
        </table>

        <br />

        <table>
            <tr>
                <td id="index">left part of menu/index </td>
                


         <td id="middle"> 
                <form action = "" method = "post" action="login1.php">    
                <table>
                        <tr><th colspan="2">LOGIN FORM</th></tr>
                         <tr>
                            <th>LOGIN ID</th>
                            <td class="inputText"><input type="text" name="Firstname"></td>
                        </tr>
                         <tr>
                            <th>Password</th>
                            <td class="inputPass"><input type="password" name="password"></td>
                        </tr>
                        <tr id="RegButton">
                            <td colspan="2"><button name="register">Login</button></td>
                        </tr>
                    </table>
                </form>
                    
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

