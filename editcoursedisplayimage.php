
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


$id = $_POST['id'];

$query = "SELECT * FROM VLE_Game WHERE id = '$id'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
       
        }
        

$filesentname = $_FILES['file1']['name'];
$filelocation = $_FILES['file1']['tmp_name'];

move_uploaded_file($filelocation,'uploadedfiles/'.$filesentname);

        $query="UPDATE VLE_Game SET imagename='$filesentname' WHERE id='$id'";



$userresult = mysqli_query($conn, $query) or die(mysqli_error($conn));


header('Location:landing.php?updatesuccess');


mysqli_close($conn);

?>



