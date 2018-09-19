<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$webserver="localhost";
$user="jhiggins10";
$password="mt2mdtnsx6mnn412";
$database="jhiggins10";
$conn = mysqli_connect($webserver, $user, $password, $database);

if(!$conn){
 die("Connection failed: " . mysqli_connect_error() );
}
?>