
<?php

include("conn.php");

session_start();


$email = $_SESSION['usersEmail'];

$acctype = $_SESSION['usersRole'];



if (!isset($email)) {
    
    header('Location:login.php');
}

$query = "SELECT * FROM VLE_Game";

	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));



?>


<!DOCTYPE html>
<html>

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

				<?php


        
	
	//make sure there is data in the returned object
	if (mysqli_num_rows($result) > 0) {
            echo "<div class='container'>";

              echo "<table><tbody><tr><th>Course</th><th>Description</th><th>Posted By</th>";


		
		 while($row = mysqli_fetch_assoc($result)) {
                     
                     
                     $name = $row["gameTitle"];
                     $detailsdata = $row["gameDesc"];
                     $pic = $row["imagename"];
                     $author = $row["author"];
                     $id=$row["id"];


    echo "<tr><td><a href='courseviewer.php?courseid=$id'>$name<br><img src='uploadedfiles/$pic' height='150' width='200'</td><td>$detailsdata</td><td><a href='profileviewer.php?emailadd=$author'>$author</a></td></tr>";

                 }
    echo "</tbody></table>";
    echo "</div>";
		
	}else{
		
	 echo "no data";
	 
	}
	

?>

</body>
<div class="container">
<div class="footer">  
           <img src="images/domino-34387_642.png"style="width:52px;height:32px;border:0;">

</div>
</div>


</html>