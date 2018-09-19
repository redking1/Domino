<?php

include("conn.php");

session_start();


$username = $_POST["uname"];

$pass = $_POST["psw"];

$checkuser="SELECT * FROM VLE_User_Login WHERE emailadd='$username' and passw=md5('$pass')";

$userresult = mysqli_query($conn, $checkuser) or die(mysqli_error($conn));


if (mysqli_num_rows($userresult) > 0) {
	while ($row = mysqli_fetch_assoc($userresult)) {
		$_SESSION['usersEmail'] = $row['emailadd'];
		$_SESSION['usersRole'] = $row['type'];
		header("Location: landing.php");
		}
	}else{
	header("Location: login.php?loginerror=true");


        }
        
        mysqli_close($conn);

        
        
        ?>


