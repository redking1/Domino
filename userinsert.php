<?php

include("conn.php");



$email = mysqli_real_escape_string($conn, $_POST["email"]);

$password = md5($_POST["psw"]);

$name = mysqli_real_escape_string($conn,$_POST["name"]);

$aboutme = mysqli_real_escape_string($conn,$_POST["about"]);

$acctype = ["Learner"];

$insertquery="INSERT INTO VLE_User_Login (emailadd, passw, name, About_Me, type) VALUES ('$email', '$password', '$name', '$aboutme', 'Learner')";

$result = mysqli_query($conn, $insertquery) or die(mysqli_error($conn));

echo "Registration Sucessful";

header('Location:login.php');





        mysqli_close($conn);

    

?>

