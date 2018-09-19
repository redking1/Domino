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

 

      
  <title>Manage User</title>

   
 
    <body>
            
    <?php 
    

If(isset($_GET['id1'])) {
$id = $_GET['id1'];
}

         
                   
                   
    $query = "SELECT * FROM VLE_Game WHERE id = '$id'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
                $title = $row['gameTitle'];
                $desc = $row['gameDesc'];
                $coursetext = $row['Course_text'];
                $pic = $row['imagename'];
                $coursepic = $row['Course_img'];
        }

     ?>


                  <div class='container'>


                <p>Edit <?php echo "$title"; ?></p>

                            <form action='editcoursetitle.php' method='POST' enctype='multipart/form-data'> 

                <label for="name"><b>Title</b></label>
                <input type="text" placeholder="title" name="title" required>
                                <input type="hidden" name="id" value="<?php echo $id; ?>"/>

                                                <input type='submit' value='Change title'/>
                            </form>
                
                <form action='editcoursedesc.php' method='POST' enctype='multipart/form-data'> 

                <label for="name"><b>Description</b></label>
                <input type="text" placeholder="desc" name="desc" required>
                                <input type="hidden" name="id" value="<?php echo $id; ?>"/>

                                                <input type='submit' value='Change description'/>
                            </form>
                
                
                              
                <form action='editcoursedata.php' method='POST' enctype='multipart/form-data'> 

                <label for="name"><b>Course Lesson One</b></label>
               <br><textarea name="text">Enter text here...</textarea>
                                <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                                <br>
                                                <input type='submit' value='Change Course Data'/>
                            </form>
                
                                                <form action='editcoursedata2.php' method='POST' enctype='multipart/form-data'> 

                <label for="name"><b>Course Lesson Two</b></label>
               <br><textarea name="text">Enter text here...</textarea>
                                <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                                <br>
                                                <input type='submit' value='Change Course Data'/>
                            </form>
                
                                <form action='editcoursedata3.php' method='POST' enctype='multipart/form-data'> 

                <label for="name"><b>Course Lesson Three</b></label>
               <br><textarea name="text">Enter text here...</textarea>
                                <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                                <br>
                                                <input type='submit' value='Change Course Data'/>
                            </form>
                                <form action='editcoursedata4.php' method='POST' enctype='multipart/form-data'> 

                <label for="name"><b>Course Lesson Four</b></label>
               <br><textarea name="text">Enter text here...</textarea>
                                <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                                <br>
                                                <input type='submit' value='Change Course Data'/>
                            </form>
                
                           <form action='editcourseforumlink.php' method='POST' enctype='multipart/form-data'> 

                <label for="name"><b>Add Course Forum Discussion Link</b></label>
                <input type="text" placeholder="text" name="text" required>
                                <input type="hidden" name="id" value="<?php echo $id; ?>"/>

                                                <input type='submit' value='Add'/>
                            </form>
                
                                <form action='editcoursedataimage.php' method='POST' enctype='multipart/form-data'> 

                <label for="name"><b>Course Pic</b></label>
                <input type="file" name="pic" required>
                                <input type="hidden" name="id" value="<?php echo $id; ?>"/>

                                                <input type='submit' value='Change img'/>
                            </form>
                
                                       <form action='editcoursedisplayimage.php' method='POST' enctype='multipart/form-data'> 

                <label for="name"><b>Course Display Image</b></label>
                <input type="file" name="file1" required>
                                <input type="hidden" name="id" value="<?php echo $id; ?>"/>

                                                <input type='submit' value='Change Course Data'/>
                            </form>
                
                                                 <form action='editmats.php' method='POST' enctype='multipart/form-data'> 

                <label for="name"><b>Edit/Add Course Materials</b></label>
                <input type="file" name="mats" required>
                                <input type="hidden" name="id" value="<?php echo $id; ?>"/>

                                                <input type='submit' value='Change Course Data'/>
                            </form>
                  
                  
    

                </br>
             <form action='deletecourse.php' method="post">
                <input type="hidden" name="delete" value="<?php echo $id; ?>"/>
      <input type="submit" name="submit" value="Delete Course">
      </form>
                
                  </div>
       <div class="container">
<div class="footer">  
           <img src="images/domino-34387_642.png"style="width:52px;height:32px;border:0;">

</div>
</div>
 </body>
      

</html>

