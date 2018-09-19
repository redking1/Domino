<?php

include('conn.php');

session_start();

$email = $_SESSION['usersEmail'];
$acctype = $_SESSION['usersRole'];


$gametitledata = mysqli_real_escape_string($conn, $_POST["title"]);
$gamedescdata =  mysqli_real_escape_string($conn, $_POST["desc"]);

$coursedata = mysqli_real_escape_string($conn, $_POST["info"]);

$filesentname1 = $_FILES['img']['name'];
$filelocation1 = $_FILES['img']['tmp_name'];

move_uploaded_file($filelocation1,'uploadedfiles/'.$filesentname1);


$filesentname = $_FILES['localimage']['name'];
$filelocation = $_FILES['localimage']['tmp_name'];

move_uploaded_file($filelocation,'uploadedfiles/'.$filesentname);

$filesentname2 = $_FILES['materials']['name'];
$filelocation2 = $_FILES['materials']['tmp_name'];

move_uploaded_file($filelocation2,'uploadedfiles/'.$filesentname2);


$insertquery = "INSERT INTO VLE_Game (gameTitle, gameDesc, imagename, author, Course_text, Course_img, Course_mats) VALUES ('$gametitledata', '$gamedescdata', '$filesentname', '$email', '$coursedata', '$filesentname1', '$filesentname2')";
$result  = mysqli_query($conn, $insertquery) or die(mysqli_error($conn));

header('Location:landing.php?updatesuccess');
?>


