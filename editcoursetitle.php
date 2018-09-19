<?php

include("conn.php");

session_start();



$email = $_SESSION['usersEmail'];

$acctype = $_SESSION['usersRole'];

if (!isset($email)) {
    header('Location:login.php');
}

if ($acctype != 'Admin')  {
    header("Location: landing.php");
}

$id = mysqli_real_escape_string($conn, $_POST['id']);

$query = "SELECT * FROM VLE_Game WHERE id = '$id'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
                      $name = $row["gameTitle"];
                     $detailsdata = $row["gameDesc"];
                     $pic = $row["imagename"];
        }

$newname = mysqli_real_escape_string($conn, $_POST['title']);



$query="UPDATE VLE_Game SET  gameTitle='$newname' WHERE
id='$id'";



$userresult = mysqli_query($conn, $query) or die(mysqli_error($conn));

header('Location:landing.php?updatesuccess');


mysqli_close($conn);

?>


