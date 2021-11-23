<?php

require_once 'db_handler.php';
require_once 'error_handler.php';



function getReviews($connection, $car_type) {

    $sql = "SELECT reviews.review_string, reviews.review_int FROM reviews WHERE car_type = '$car_type';";
    
    $sql_result = mysqli_query($connection, $sql);

    if (!$sql_result) {

        header("location: ../review.php?error=UnknownError");
        exit();

    }

    $array = array();

    $index = 0;
    while ($row = mysqli_fetch_assoc($sql_result)) {

        $array[$index] = $row;
        $index++;

    }
    
    return $array;

}


function getUsersUID($connection, $car_type) {

    $sql = "SELECT reviews.userID FROM reviews WHERE car_type = '$car_type';";
    $sql_result = mysqli_query($connection, $sql);
    
    $array = array();

    $index = 0;

    while ($row = mysqli_fetch_assoc($sql_result)) {

        $uid = $row["userID"];
        $sql_2 = "SELECT users.usersUID FROM users where users.usersID = $uid;";
        $sql_result_2 = mysqli_query($connection, $sql_2);


        if (!$sql_result_2) {

            header("location: ../review.php?error=UnknownError2");
            exit();
    
        }

        $row2 = mysqli_fetch_assoc($sql_result_2);

        $array[$index] = $row2["usersUID"];
        $index++;
    
    }


    return $array;

}

