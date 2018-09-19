<?php

include('conn.php');

session_start();




$email = $_SESSION['usersEmail'];
$acctype = $_SESSION['usersRole'];


$reply =  mysqli_real_escape_string($conn, $_POST["reply"]);
$category = $_POST["cat_id"];

$author = $_POST["user"];

$id = $_POST["id"];





$insertquery = "INSERT INTO VLE_reply (comment, post_id, author) VALUES ('$reply', '$category','$author' )";
$result  = mysqli_query($conn, $insertquery) or die(mysqli_error($conn));

    header("Location:postview.php?cat=$id");
?>


