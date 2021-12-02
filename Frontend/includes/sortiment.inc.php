<?php

require_once 'db_handler.php';
require_once 'error_handler.php';

//session_start();

if(isset($_POST["AddToCart"])){

    mysqli_query($connection, "START TRANSACTION;");

    session_start();

    
    $car_type = $_POST["AddToCart"];
    $sql = "SELECT car_inv FROM items WHERE items.car_type = '$car_type';";
    $amount = mysqli_query($connection, $sql); //mysqli_query only returns an mysqli object which with following line below is then extracted into a associative array
                                               //in order to extract specific values from it such as the car_inv value.
    $amount2 = mysqli_fetch_assoc($amount);
    if($amount2["car_inv"] == 0){
        header("location: ../sortiment.php?error=OutOfOrder");
        exit();
    }
    else {
    
    $uid = $_SESSION['userID']; 

    
    $sql2 = "INSERT INTO basket(basket_id, usersID, car_type) VALUES ('',$uid,'$car_type');";
    
    $testo = mysqli_query($connection, $sql2);
    
     if(!$amount or !$testo){
         
         mysqli_query($connection, "ROLLBACK;");
         header("location: ../sortiment.php?rollback");
         exit();
    }
    mysqli_query($connection, "COMMIT;");
    header("location: ../sortiment.php");
    exit();

    }



}


