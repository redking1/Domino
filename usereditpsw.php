<?php

include("conn.php");

session_start();

$email = $_SESSION['usersEmail'];
$acctype = $_SESSION['usersRole'];



$query = "SELECT * FROM VLE_User_Login WHERE emailadd ='$email";

    
$newpass = md5($_POST["psw"]);

		
                     
                     
                     $confirmpw = md5($row["passw"]);





$userresult = mysqli_query($conn, $checkpw) or die(mysqli_error($conn));


            
$query="UPDATE VLE_User_Login SET passw=md5('$newpass') WHERE emailadd='$email'";

header('Location:landing.php?updatesuccess');
        
        mysqli_close($conn);






?>