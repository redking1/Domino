<?php

include("conn.php");

session_start();



$email = $_SESSION['usersEmail'];
$acctype = $_SESSION['usersRole'];
if (!isset($email)) {
    header('Location:login.php');
}

$id = $_POST['delete'];

$query = "DELETE FROM VLE_User_Login
WHERE emailadd='$id';";

    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    header('Location:landing.php');

?>
