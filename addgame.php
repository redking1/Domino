<?php

include("conn.php");



session_start();

$acctype = $_SESSION['usersRole'];



$email = $_SESSION['usersEmail'];


if (!isset($email)) {
    
    header('Location:login.php');
}


if ($acctype == 'Learner')  {
    header("Location: landing.php");
}


?>

<!DOCTYPE html>
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
    <h2>Add a Course</h2>
 
    <form action='game.php' method='POST' enctype='multipart/form-data'> 
        <p>Please Add further lessons and forum discussion link in Manage My Course</p>
       <p>
		Course Title: <input type='text' name='title' required/>
	
    </p>
    <p>
                Course Description: <input type='text' name='desc' required/>
        </p>
 
            
            <p>
                Course's Lesson One:<br><textarea name="info">Enter text here...</textarea>


        </p>
                            <p>
                Course Resource Image: <input type='file' name='img' />
        </p>
                
                        <p>
               Course Display Image: <input type='file' name='localimage'/>
 </p>
     
 <p>
        Add Course Materials(PDFs, Images): <input type='file' name='materials'/>

 </p>
	<p>
		<input type='submit' value='Insert'/>
	</p>
        

 </form>
    
    </div>
  
</body>
<div class="container">
<div class="footer">  
           <img src="images/domino-34387_642.png"style="width:52px;height:32px;border:0;">

</div>
</div>

</html>
