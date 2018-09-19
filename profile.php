<?php
include("conn.php");

session_start();

$email = $_SESSION['usersEmail'];

$acctype = $_SESSION['usersRole'];



if (!isset($email)) {
    header('Location:login.php');
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



            <h1> Manage Profile </h1>

      
  <title> Profile </title>
   </div>
    </head>
 
    <body>
            
    <?php 
    
echo "<div class='container'>";

                   
                   
    $query = "SELECT * FROM VLE_User_Login WHERE emailadd = '$email'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
                $name = $row['name'];
                $subject = $row['Subject'];
                $level = $row['Level'];
                $pic = $row['profilepic'];
                $emailadd = $row['emailadd'];
        }

        if ($acctype == 'Tutor' || $acctype == 'Admin') {?>

            <form action='usernameedit.php' method='POST' enctype='multipart/form-data'> 

                <p>Please fill in this form to create a Profile.</p>

                <label for="name"><b>Name</b></label>
                <input type="text" placeholder="Name" name="name" value="<?php $name ?>" required>

                                <input type='submit' value='Change Name'/>

            </form>
                </br>

                                    <form action='usersubedit.php' method='POST' enctype='multipart/form-data'> 


                <label for="subject"><b>Subject Taught</b></label>
                <input type="text" placeholder="Poker..." name="subject" value="<?php $subject ?>" required>

                <label for="level"><b>Subject Level</b></label> 
                <select name="level" value="<?php $level ?>">
                    <option value="Beginner">Beginner</option>
                    <option value="Intermediate">Intermediate</option>
                    <option value="Advanced">Advanced</option>
                </select>
                
                                <input type='submit' value='insert teaching details'/>

                
                                    </form>
        
        </br>

            
                                            <form action='userpicedit.php' method='POST' enctype='multipart/form-data'> 


                <label for="imgfile">Upload new Profile Picture</label>

                <input type="file" name="profilepic" />
                
                                                <input type='submit' value='Upload' required/>

                
            </form>
            
        <?php } else if ($acctype == 'Learner') { ?>
            
   <form action='usernameedit.php' method='POST' enctype='multipart/form-data'> 

                <p>Please fill in this form to create a Profile.</p>

                <label for="name"><b>Name</b></label>
                <input type="text" placeholder="Name" name="name" value="<?php $name ?>" required>

                                <input type='submit' value='Change Name'/>

            </form>
                </br>

                            <form action='useremailedit.php' method='POST' enctype='multipart/form-data'> 

                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email"  required>
                
                                <input type='submit' value='Change Email'/>

                            </form>
                </br>
                
                                            <form action='userpicedit.php' method='POST' enctype='multipart/form-data'> 


                <label for="imgfile">Upload new Profile Picture</label>

                <input type="file" name="profilepic" required />
                
                                                <input type='submit' value='Upload'/>

                
            </form>
                
        <?php } echo "</div>"; ?>
<div class='container'>

        <h3><p>Change Password</p></h3>
        <br/>
        <form action='usereditpsw.php' method='POST' enctype='multipart/form-data'>
            
            

            
            <label for="psw"><b>Change Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <label for="psw-repeat"><b>Repeat Password</b></label>
            <input type="password" placeholder="Repeat Password" name="psw-repeat" required>

            <input type='submit' value='Update Password'/>
        
        </form>
        
        </div>
                
                
<div class="container">
<div class="footer">  
           <img src="images/domino-34387_642.png"style="width:52px;height:32px;border:0;">

</div>
</div>
 </body>
      

</html>