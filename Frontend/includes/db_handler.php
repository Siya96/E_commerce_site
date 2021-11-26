<?php


$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "sportscar";


$connection = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);


if(!$connection) {
    die("Failed to connect: " . mysqli_connect_error());
}
