<?php



include("conn.php");

session_start();


$email = $_SESSION['usersEmail'];

$acctype = $_SESSION['usersRole'];


if (!isset($email)) {
    
    header('Location:login.php');
}


if (isset($_GET['cat'])) {
        $id = $_GET['cat'];
    } else {
        header("Location:landing.php");
    }
    
    $query = "SELECT * FROM VLE_post WHERE cat_id='$id'";


	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));



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
				<?php


        
		if (mysqli_num_rows($result) > 0) {
            
            
            		 while($row = mysqli_fetch_assoc($result)) {
                             
                     $postTitle = $row["post_title"];
                     $postid = $row["post_id"];
                     $author=$row["user"];
                            
                                                  echo "<div class='container'>";


            echo '<table><tr>';
    echo '<td class="leftpart">';
        echo "<h3><a href='postview.php?cat=$postid'>$postTitle</a></h3><br>";
    echo '</td>';
    echo '<td class="rightpart">';                
    echo '</td>';
echo '</tr></table>';
echo '</div>';

           }
                }
                                                  echo "<div class='container'>";

echo "  <form action='postcreate.php' method='POST' enctype='multipart/form-data'> 
                <input type='hidden' name='id' value='$id'>     
                                    <input type='hidden' name='user' value='$email'>    
                                        



                <p>Create Post</p>

                <label for='post'><b>Title</b></label>
                <input type='text' placeholder='post' name='post'/>
                
                <label for='post'><b>post</b></label>
                <input type='text' placeholder='Content' name='cont'/>
                                <input type='submit' value='Post'/>
            </form>
            ";

echo '</div>';
              
?>
            
            
            
            


</body>

<div class="container">
<div class="footer">  
           <img src="images/domino-34387_642.png"style="width:52px;height:32px;border:0;">

</div>
</div>

</html>

