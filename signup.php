<?php
//connect to the local MySQL database using PHP
include("conn.php");

if (isset($_GET['success'])) {
      $success = $_GET['success'];
} else { $success = ""; }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    


  <title> Domino Sign Up </title>
 <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="skeleton/normalize.css">
  <link rel="stylesheet" href="skeleton/skeleton.css">
  <link rel="stylesheet" href="css/custom.css">

    </head>
    


    <body>
        
        <div class="container">
        <form action='userinsert.php' method='POST'> 
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

        <label for="Name"><b>Name</b></label>
    <input type="text" placeholder="Ripley" name="name" required>
    
    <label for="email"><b>User Name</b></label>
    <input type="text" placeholder="Enter User Name" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw"  minlength="8" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
    
            <label for="About Me"><b>About Me</b></label>
    <input type="text" placeholder="I want to learn about..." name="about">
    

    

    <br>
         



      <button type="button" class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn">Sign Up</button>
      
  </div>

  
</form>
        
    </body>

    
</html>