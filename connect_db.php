<?php 

//database_connection.php

$connect = new PDO("mysql:host=localhost;dbname=webprojectdb", "root", "");
$servername = "localhost";
$username = "root";
$password = "";
$dbname="webprojectdb";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


?>