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


$id = $_POST['profilepic1'];

$query = "SELECT * FROM VLE_User_Login WHERE emailadd = '$id'";
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
        

$filesentname = $_FILES['profilepic']['name'];
$filelocation = $_FILES['profilepic']['tmp_name'];

move_uploaded_file($filelocation,'uploadedfiles/'.$filesentname);

        $query="UPDATE VLE_User_Login SET profilepic='$filesentname' WHERE emailadd='$id'";



$userresult = mysqli_query($conn, $query) or die(mysqli_error($conn));


header('Location:landing.php?updatesuccess');


mysqli_close($conn);

?>



