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

	<?php
        
        
        
                                        echo "<div class='container'>";

$query3 = "SELECT * FROM VLE_post WHERE '$id' = post_id";
         $result = mysqli_query($conn, $query3) or die(mysqli_error($conn));


		if (mysqli_num_rows($result) > 0) {
            
            
            		 while($row = mysqli_fetch_assoc($result)) {
                             
                             
                             
                     $postTitle = $row["post_title"];
                     $postid = $row["post_id"];
                                          $postContent=$row["post_content"];
                                          $author=$row["user"];

                     

                     
                }

                         }

                                                                                      echo "<h4>$postContent</h4><br><a href='profileviewer.php?emailadd=$author'> $author</a><br>";


$query1 = "SELECT VLE_post.*, VLE_reply.* FROM VLE_post INNER JOIN VLE_reply ON VLE_post.post_id = VLE_reply.post_id";
         $result = mysqli_query($conn, $query1) or die(mysqli_error($conn));


		if (mysqli_num_rows($result) > 0) {
            
            
            		 while($row = mysqli_fetch_assoc($result)) {
                             
                             
                             
                     $postTitle = $row["post_title"];
                     $postid = $row["post_id"];
                     $postContent=$row["post_content"];
                                          $author=$row["author"];
                     $replies=$row["comment"];

                     
                             
                         }
                         
                }
                                                  
                                                                     echo "</br><form action='postreply.php' method='POST' enctype='multipart/form-data'> 
                <input type='hidden' name='cat_id' value='$id'/>                
                                    <input type='hidden' name='user' value='$email'>                
                                    <input type='hidden' name='id' value='$id'>                


                <label for='Reply' Reply</label>
                <input type='text' placeholder='reply' name='reply'/>

                                <input type='submit' value='Reply'/>

            </form>";



        $query2 = "SELECT VLE_post.*, VLE_reply.* FROM VLE_post INNER JOIN VLE_reply ON VLE_post.post_id WHERE (VLE_post.post_id = $id) and (VLE_reply.post_id = $id)";
         $result = mysqli_query($conn, $query2) or die(mysqli_error($conn));


		if (mysqli_num_rows($result) > 0) {
            
            
            		 while($row = mysqli_fetch_assoc($result)) {
                             
                             
                             
                     $postTitle = $row["post_title"];
                     $postid = $row["post_id"];
                     
                     $replies=$row["comment"];
                     $time=$row["date"];
                     $author=$row["author"];
                            
                     
                       echo '<table>'
                   ;          
                    echo '<tr>';
                        echo '<td class="leftpart">';
                            echo "$replies";
                        echo '</td>';
                        echo '<td class="rightpart">';
                            echo "<a href='profileviewer.php?emailadd=$author'> $author</a>";
                        echo '</td>';
                    echo '</tr>';
                                        echo '</table>';

                         }
                         
                }
                                        echo '</div>';

 

?>

  
            
<div class="container">
<div class="footer">  
           <img src="images/domino-34387_642.png"style="width:52px;height:32px;border:0;">

</div>
</div>
            
    </body>


</html>


