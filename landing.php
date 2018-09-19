
<?php
include("conn.php");


session_start();


$email = $_SESSION['usersEmail'];

$acctype = $_SESSION['usersRole'];


if (!isset($email)) {
    
    header('Location:login.php');
}


mysqli_close($conn);


?>

<!DOCTYPE html>
<html>

   <head>
<title>vsl</title>
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
        <div class="container">

<?php 
if (isset($_GET['updatesuccess'])) {
    
    echo "Update successful!";
}
?>

    <h3>Editing Pages</h3>

  	

                                               <?php if ($acctype == 'Tutor') { ?>

  
    <a href="addgame.php"><img src="uploadedfiles/editimg.jpeg" style="width:42px;height:42px;border:0;"<p>Add Course</p></a>
      <a href="profile.php"><img src="uploadedfiles/editimg.jpeg" style="width:42px;height:42px;border:0;"<p>Edit Profile</p></a>
      <a href="tutorscourses.php"><img src="uploadedfiles/editimg.jpeg" style="width:42px;height:42px;border:0;"<p>Manage My Courses</p></a>
      <a href="managemyforumposts.php"><img src="uploadedfiles/editimg.jpeg" style="width:42px;height:42px;border:0;"<p>Manage My Forum Posts</p></a>

                                               <?php } ?>
                                                                         <?php if ($acctype == 'Learner') { ?>
                          <a href="profile.php"><img src="uploadedfiles/editimg.jpeg" style="width:42px;height:42px;border:0;"<p>Edit Profile</p></a>
                              <a href="managemyforumposts.php"><img src="uploadedfiles/editimg.jpeg" style="width:42px;height:42px;border:0;"<p>Manage My Forum Posts</p></a>

                 <?php } ?>


                               <?php if ($acctype == 'Admin') { ?>
                          <a href="addgame.php"><img src="uploadedfiles/editimg.jpeg" style="width:42px;height:42px;border:0;"<p>Add Course</p></a>
                          <a href="profile.php"><img src="uploadedfiles/editimg.jpeg" style="width:42px;height:42px;border:0;"<p>Edit Profile</p></a>
                           <a href="manageusers.php"><img src="uploadedfiles/editimg.jpeg" style="width:42px;height:42px;border:0;"<p>Manage Users</p></a>
      <a href="managecourses.php"><img src="uploadedfiles/editimg.jpeg" style="width:42px;height:42px;border:0;"<p>Manage All Courses</p></a>
       <a href="tutorscourses.php"><img src="uploadedfiles/editimg.jpeg" style="width:42px;height:42px;border:0;"<p>Manage My Courses</p></a>
      <a href="forummanager.php"><img src="uploadedfiles/editimg.jpeg" style="width:42px;height:42px;border:0;"<p>Manage Forum Posts</p></a>
      <a href="managemyforumposts.php"><img src="uploadedfiles/editimg.jpeg" style="width:42px;height:42px;border:0;"<p>Manage My Forum Posts</p></a>


                 <?php } ?>

	


    </div>
</body>
<div class="container">
<div class="footer">  
           <img src="images/domino-34387_642.png"style="width:52px;height:32px;border:0;">

</div>
</div>



</html>
