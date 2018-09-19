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


If(isset($_GET['adminedit'])) {
$email = $_GET['adminedit'];
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

$newname = $_POST['name'];

$emailchange = $_POST['email'];


if(!isset($_POST["level"])) {
    $newlevel = $level;
} else {
    $newlevel = $_POST["level"];
}

if(!isset($_POST["subject"])) {
    $newsubject = $subject;
} else {
    $newsubject = $_POST["subject"];
}

if(!isset($_FILES["profilepic"]['name'])) {
    $filesentname = $pic;
} else {
    $filesentname = $_FILES["profilepic"]['name'];
    $filelocation = $_FILES['profilepic']['tmp_name'];
    move_uploaded_file($filelocation,'uploadedfiles/'.$filesentname);
}



$query="UPDATE VLE_User_Login SET name='$newname', emailadd='$emailchange', Subject='$newsubject', Level='$newlevel', profilepic='$filesentname' WHERE
emailadd='$email'";



$userresult = mysqli_query($conn, $query) or die(mysqli_error($conn));


header('Location:landing.php?updatesuccess');


mysqli_close($conn);

?>

