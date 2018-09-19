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


  </div>
</head>

    <body>
            
    <?php 
    

If(isset($_GET['courseid'])) {
$id = $_GET['courseid'];
}

         
                   echo "<div class='container'>";
                   
    $query = "SELECT * FROM VLE_Game WHERE id = '$id'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
                      $name = $row["gameTitle"];
                     $detailsdata = $row["gameDesc"];
                     $pic = $row["imagename"];
                     $author = $row["author"];
                     $courseimg=$row["Course_img"];
                     $coursedata=$row["Course_text"];
                     $coursedata2=$row["Course_text2"];
                     $coursedata3=$row["Course_text3"];
                     $coursedata4=$row["Course_text4"];
                     $homework=$row["Course_homework"];
                     $link=$row["forum_link"];
                     $mats=$row["Course_mats"];


                                          
  
        }
        
        
                             echo "<h2> $name </h2> <table style='width:100%'><td><img src='uploadedfiles/$courseimg' height='400' width='600'</td></table>";
                             echo "<h4>Lesson One</h4>"; 
                             echo "<table style='width:100%'><td>$coursedata</td></table><br>";
                                              if (!empty($coursedata2)) {
            echo "<h4>Lesson Two</h4>"; 
                                              

                             echo "<table style='width:100%'><td>$coursedata2</td></table><br>";
                                              }
                                 if (!empty($coursedata3)) {
            echo "<h4>Lesson Three</h4>"; 

                             echo "<table style='width:100%'><td>$coursedata3</td></table><br>";
                                 }
                          if (!empty($coursedata4)) {
                                          echo "<h4>Lesson Four</h4>"; 

                             echo "<table style='width:100%'><td>$coursedata4</td></table><br>";
                          }
                                                    if (!empty($link)) {
                    echo "<table style='width:100%'><td><a href='$link'>Forum Discussion</a></td></table><br>";

                                                    }

                                if (!empty($mats)) {
                             
                     echo "<a href = 'uploadedfiles/$mats'><button class='btn'>Course Materials</button></a><br>";
                                }
        
                               echo "By - <a href='profileviewer.php?emailadd=$author'>$author</a><br>";
                                
echo "</div>";
     ?>

       
   
 </body>
 
        <div class="container">
<div class="footer">  
           <img src="images/domino-34387_642.png"style="width:52px;height:32px;border:0;">

</div>
</div>
      

</html>
