<?php 

$host_name = "localhost";
$user_name = "root";
$password = "";
$db_name = "BE18_CR4_DraganStoyanovski_BigLibrary";

$conn = mysqli_connect($host_name, $user_name, $password, $db_name);

if(!$conn){
    die("Connected failed" . mysqli_connect_error());
}