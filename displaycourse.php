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
    
    <meta name="viewport" content="width=device-width, initial-scale=1">

 
  <link rel="stylesheet" href="skeleton/normalize.css">
  <link rel="stylesheet" href="skeleton/skeleton.css">
  <link rel="stylesheet" href="styles//custom.css">


    <nav>
        
        <ul>
            <li> <a href="home.php">Home</a> </li>
  <li>  <a href="landing.php" class="sublink-1">Landing</a></li>
 <li>   <a href="displaygames.php" class="sublink-1">All Courses</a></li>
  <li> <a href="profileviewer.php?emailadd=<?php echo $email ?>">My Profile</a></li>

  <li><a href="#">Contact US</a></li>
 <li> <a href="logout.php">LOG OUT</a></li>

  
  <?php 
  echo " <p style='font-size:14px; color:#538b01; font-weight:bold; font-style:italic'>
Logged in as: $email";
  echo "<br/>";
  echo  "Account Type: $acctype";
  ?>
</nav>
</ul>
<title>Profile</title>


</head>

<body>

				<?php


        
	
	//make sure there is data in the returned object
	if (mysqli_num_rows($result) > 0) {
            
              echo "<table><tr><th>Profile</th><th>";


		
		 while($row = mysqli_fetch_assoc($result)) {
                     
                     
                     $name = $row["name"];
                     $subject = $row["Subject"];
                     $level = $row["Level"];
                     $pic = $row["profilepic"];
                     $emailpro=$row["emailadd"];
                     $about=$row["About_Me"];
                     


                         echo"<br>";

echo  "<tr><td>$name<br><img src='uploadedfiles/$pic' height='100' width='100'</td><td>$level $subject</td></tr><tr><td>$about</tr></td><tr><td>$emailpro</tr></td>";

                 }
    echo "</table>";
		
	}else{
		
	 echo "no data";
	 
	}
	

?>
            

    




</body>

</html>

