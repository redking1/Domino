<?php

include('conn.php');

session_start();

$email = $_SESSION['usersEmail'];
$acctype = $_SESSION['usersRole'];


$postTitle = mysqli_real_escape_string($conn, $_POST["post"]);
$postContent =  mysqli_real_escape_string($conn, $_POST["cont"]);
$id = $_POST["id"];
$user=$_POST["user"];





$insertquery = "INSERT INTO VLE_post (post_title, post_content, cat_id, user) VALUES ('$postTitle', '$postContent', '$id', '$user')";
$result  = mysqli_query($conn, $insertquery) or die(mysqli_error($conn));

    header("Location:postviewer.php?cat=$id");
?>

