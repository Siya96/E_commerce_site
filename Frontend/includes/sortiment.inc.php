<?php

require_once 'db_handler.php';


//session_start();

if(isset($_POST["AddToCart"])){
    session_start();
    $car_type = $_POST["AddToCart"];
    $sql = "SELECT amount FROM items WHERE items.car_type = '$car_type';";
    $amount = mysqli_query($connection, $sql);
    if($amount["car_inv"] = 0){
        header("location: ../sortiment.php?error=OutOfOrder");
        exit();
    }
    
    echo $car_type;
    $uid = $_SESSION['userID']; 
    

    $sql2 = "INSERT INTO `basket`(`basket_id`, `usersID`, `car_type`) VALUES ('',$uid,'$car_type');";
    $testo = mysqli_query($connection, $sql2);
    //header("location: ../sortiment.php");
    //exit();

}

function fetchAllRows($connection) {

    $sql = "SELECT * FROM items;";

    

    $result = mysqli_query($connection, $sql);

    

    $array = array();

    

    $index = 0;

    while ($row = mysqli_fetch_array($result)) {

        $array[$index] = $row;
        $index++;

    }

    return $array;

}

