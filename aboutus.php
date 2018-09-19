<?php

include("conn.php");

session_start();


$email = $_SESSION['usersEmail'];

$acctype = $_SESSION['usersRole'];







?>

<html>
<head>
   <div class="container">
    <nav>
        
        <ul>
            <li> <a href="home.php"><img src="images/domino-34387_644.png"style="width:52px;height:32px;border:0;"></a> </li>
  <li>  <a href="landing.php" class="sublink-1">Landing</a></li>
 <li>   <a href="displaygames.php" class="sublink-1">All Courses</a></li>
  <li> <a href="profileviewer.php?emailadd=<?php echo $email ?>">My Profile</a></li>
  <li>   <a href="forumview.php" class="sublink-1">Forum</a></li>

  <li><a href="aboutus.php">About Us</a></li>
 <li> <a href="logout.php">LOG OUT</a></li>
          <?php 

    echo "<p style='font-size:14px; color:#538b01; font-weight:bold; font-style:italic'>$email";
  echo  "<br>Account Type: $acctype";
  ?>

  

</nav>

</ul>
<meta name="viewport" content="width=device-width, initial-scale=1">

 
  <link rel="stylesheet" href="skeleton/skeleton.css">
    <link rel="stylesheet" href="skeleton/new.css">


  </div>
</head>

    
    <body>
        <div class='container'>
        <h3>About Us</h3>
        
        Domino is a lightweight virtual learning environment. Tutor's upload whatever they wish to teach, one lesson at a time. 
        Want to request a course? No problem, just request one in the forum. Learn at your own pace and let the dominoes fall into place.
                   <img src="images/fall.jpeg"style="width:300px;height:250px;border:0;">

        </div>
        
        
<div class="container">
<div class="footer">  
           <img src="images/domino-34387_642.png"style="width:52px;height:32px;border:0;">
           <br>

</div>
</div>
            
    </body>

    
    </html>