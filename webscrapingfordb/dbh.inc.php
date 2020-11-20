<?php

$dbServename = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "db_pokemon";

$conn = mysqli_connect($dbServename, $dbUsername, $dbPassword, $dbName);
if(mysqli_connect_errno()){
    echo "Failed to connect!";
    exit();
}
