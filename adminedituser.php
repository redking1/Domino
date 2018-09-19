<?php
include("conn.php");




session_start();

$email = $_SESSION['usersEmail'];

$acctype = $_SESSION['usersRole'];


if (!isset($email)) {
    header('Location:login.php');
}


if ($acctype != 'Admin')  {
    header("Location: landing.php");
}


?>





<!DOCTYPE html>
<html lang="en">

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
            
    <?php 
    

If(isset($_GET['adminedit'])) {
$email = $_GET['adminedit'];
}

         
                   
                   
    $query = "SELECT * FROM VLE_User_Login WHERE emailadd = '$email'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
                $role = $row['type'];
                $name = $row['name'];
                $subject = $row['Subject'];
                $level = $row['Level'];
                $pic = $row['profilepic'];
                $emailadd = $row['emailadd'];
        }

     ?>

                  <div class='container'>



                <p>Edit <?php echo "$emailadd"; ?> 's  Profile</p>

                            <form action='adminnameedit.php' method='POST' enctype='multipart/form-data'> 

                <label for="name"><b>Name</b></label>
                <input type="text" placeholder="Name" name="usersname" value="<?php $name ?>" required>
                <input type="hidden" name="name" value="<?php echo $emailadd; ?>"/>                
                
                                                <input type='submit' value='Change Name'/>
                            </form>
                
                </br>
                
                            <form action='adminemailedit.php' method='POST' enctype='multipart/form-data'> 

                <label for="email"><b>User Name</b></label>
                <input type="hidden" name="emaildata" value="<?php echo $emailadd; ?>"/>
                                <input type="text" placeholder="Ripley" name="email" value="<?php $emailadd ?>" required>

                
                                                                <input type='submit' value='Change Email'/>

                            </form>
                </br>
                
                
                                            <form action='adminsubjectedit.php' method='POST' enctype='multipart/form-data'> 
                                                                                <input type="hidden" name="subedit" value="<?php echo $emailadd; ?>"/>


                <label for="subject"><b>Subject Taught</b></label>
                <input type="text" placeholder="Space Travel" name="subject" value="<?php $emailadd ?>" required>
                
                                                <input type='submit' value='Change Subject'/>

                
                                            </form>
                
                </br>
                
                            <form action='adminsubjectleveledit.php' method='POST' enctype='multipart/form-data'> 

                <label for="level"><b>Subject Level</b></label> 
                                <input type="hidden" name="sublvl" value="<?php echo $emailadd; ?>"/>

                <select name="level" value="<?php $emailadd ?>">
                    <option value="Beginner">Beginner</option>
                    <option value="Intermediate">Intermediate</option>
                    <option value="Advanced">Advanced</option>
                </select>
                                                         <input type='submit' value='Change Subject Level'/>
       
                            </form>
                </br>
                                            <form action='adminpicedit.php' method='POST' enctype='multipart/form-data'> 


                <label for="imgfile">Upload new Profile Picture</label>
                                <input type="hidden" name="profilepic1" value="<?php echo $emailadd; ?>"/>

                <input type="file" name="profilepic" />
                
                                                <input type='submit' value='Upload'/>

                
            </form>
                </br>
        
                     <form action='editusertype.php' method="post">
                <input type="hidden" name="acctype" value="<?php echo $emailadd; ?>"/>
                                <label for="level"><b>Account Type</b></label> 
                <select name="role" value="<?php $role ?>">
                    <option value="Learner">Learner</option>
                    <option value="Tutor">Tutor</option>
                    <option value="Admin">Admin</option>
                </select>
                
                                <input type='submit' value='Change Account Type'/>
                     </form>

                </br>
             <form action='delete.php' method="post">
                <input type="hidden" name="delete" value="<?php echo $emailadd; ?>"/>
      <input type="submit" name="submit" value="Delete User">
      </form>
        
                  </div>
 </body>
       <div class="container">
<div class="footer">  
           <img src="images/domino-34387_642.png"style="width:52px;height:32px;border:0;">

</div>
</div>

</html>
