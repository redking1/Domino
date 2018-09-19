<?php

include("conn.php");

session_start();

$email = $_SESSION['usersEmail'];
$acctype = $_SESSION['usersRole'];

$filesentname = $_FILES['profilepic']['name'];
$filelocation = $_FILES['profilepic']['tmp_name'];

move_uploaded_file($filelocation,'uploadedfiles/'.$filesentname);


$query="UPDATE VLE_User_Login SET profilepic='$filesentname' WHERE emailadd='$email'";

$userresult = mysqli_query($conn, $query) or die(mysqli_error($conn));

header('Location:landing.php?updatesuccess');

mysqli_close($conn);

?>