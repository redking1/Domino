<?php

include("conn.php");

session_start();



$email = $_SESSION['usersEmail'];

$acctype = $_SESSION['usersRole'];

if (!isset($email)) {
    header('Location:login.php');
}

if ($acctype == 'Learner')  {
    header("Location: landing.php");
}

$id = mysqli_real_escape_string($conn, $_POST['id']);


$query = "SELECT * FROM VLE_Game WHERE id = '$id'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
                      $newdata = $row["Course_text"];
                    
        }

$newdesc = mysqli_real_escape_string($conn, $_POST['text']);



$query="UPDATE VLE_Game SET  Course_text='$newdesc' WHERE
id='$id'";



$userresult = mysqli_query($conn, $query) or die(mysqli_error($conn));


header('Location:landing.php?updatesuccess');


mysqli_close($conn);

?>

