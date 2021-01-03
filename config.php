<?php

$servername = "localhost";
$username = "root";
$password="";
$dbname="ceylongig";

// create connection

$conn = mysqli_connect($servername, $username, $password, $dbname);

//$conn = mysqli_connect ($servername, $username, $password, $dbname);


//check connection
/*
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";


if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
*/

?>