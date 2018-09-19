<?php
//connect to the local MySQL database using PHP
include("conn.php");



?>

<!DOCTYPE html>
<html lang="en">
<head>
                      <div class='container'>

 
<meta name="viewport" content="width=device-width, initial-scale=1">

 
  <link rel="stylesheet" href="skeleton/skeleton.css">
    <link rel="stylesheet" href="skeleton/new.css">

<title>Domino Learning</title>

    <ul>
 <li><a href="signup.php" title="Sign Up Here" class="here">Sign Up</a></li>
 <li><a href="login.php" title="Login Here">Login</a></li>
 <li><a href="displaygames.php" title="What we teach">Courses</a></li>
  <li><a href="aboutus.php">About Us</a></li>
 </ul>

                      </div>
            <div class="container">

            <h1> Domino Learning </h1>

<meta name="viewport" content="width=device-width, initial-scale=1">

 
  <link rel="stylesheet" href="skeleton/skeleton.css">
    <link rel="stylesheet" href="skeleton/new.css">


    </head>
    <body>
        
        
        <form action="sign.php" method="post">


    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>

  
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
</form>

        <p> New? Sign up here! </p>
        
        <a href="signup.php">Sign up page</a>

            </div>
      </body>
</body>
<div class="container">
<div class="footer">  
           <img src="images/domino-34387_642.png"style="width:52px;height:32px;border:0;">

</div>
</div>


    
</html>