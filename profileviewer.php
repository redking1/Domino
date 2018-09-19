

<?php



include("conn.php");

session_start();


$email = $_SESSION['usersEmail'];

$acctype = $_SESSION['usersRole'];


if (!isset($email)) {
    
    header('Location:login.php');
}


if (isset($_GET['emailadd'])) {
        $user = $_GET['emailadd'];
    } else {
        header("Location:landing.php");
    }
    
    $query = "SELECT * FROM VLE_User_Login WHERE emailadd='$user'";


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

<title>Profile</title>


</head>

<body>

				<?php


                echo "<div class='container'>";

	
	//make sure there is data in the returned object
	if (mysqli_num_rows($result) > 0) {
                
		
		 while($row = mysqli_fetch_assoc($result)) {
                     
                     
                     $name = $row["name"];
                     $subject = $row["Subject"];
                     $level = $row["Level"];
                     $pic = $row["profilepic"];
                     $emailpro=$row["emailadd"];
                     $about=$row["About_Me"];
                     

              echo "<table><tr><th>Profile</th><th>";



                         echo"<br>";

echo  "<tr><td>$name<br><img src='uploadedfiles/$pic' height='180' width='180'</td><td>$level $subject</td></tr><tr><td>$about</tr></td><tr><td>$emailpro</tr></td>";

                 }
    echo "</table>";

	}else{
		
	 echo "no data";
         
         		    echo "</div>";

	 
	}
	

?>
            

    


</body>

<div class="container">
<div class="footer">  
           <img src="images/domino-34387_642.png"style="width:52px;height:32px;border:0;">

</div>
</div>


</html>
