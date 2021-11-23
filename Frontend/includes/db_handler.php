<?php


$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "sportscar";
$dbName = "sportscar";


$connection = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);


if(!$connection) {
    die("Failed to connect: " . mysqli_connect_error());
}
