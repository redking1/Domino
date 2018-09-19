<?php

include("conn.php");

session_start();

$email = $_SESSION['usersEmail'];

$acctype = $_SESSION['usersRole'];


if (!isset($email)) {
    header('Location:login.php');
}




$query = "SELECT * FROM VLE_User_Login WHERE emailadd = '$email'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
                $role = $row['type'];
                $name = $row['name'];
                $subject = $row['Subject'];
                $level = $row['Level'];
                $pic = $row['profilepic'];
                $emailadd = $row['emailadd'];
        }

$newemail = $_POST['email'];





$query="UPDATE VLE_User_Login SET emailadd='$newemail' WHERE
emailadd='$email'";



$userresult = mysqli_query($conn, $query) or die(mysqli_error($conn));


header('Location:landing.php?updatesuccess');


mysqli_close($conn);

?>


