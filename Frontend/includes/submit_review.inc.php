<?php


require_once 'db_handler.php';



if (isset($_POST["submit"])) {

    session_start();

    $uid = $_SESSION["userID"];
    $review_string = $_POST["review_string"];
    $car_type = $_POST["submit"];
    $review_int = $_POST["review_int"];

    if (!checkRating($review_int)) {

        header("location: ../review.php?error=InvalidRating");
        exit();

    }
    
    addReviewToDatabase($connection, $uid, $review_string, $review_int, $car_type);


}


function addReviewToDatabase($connection,$uid, $review_string, $review_int, $car_type){

    $sql = "INSERT INTO reviews(userID, review_string, review_int, car_type) VALUES (?, ?, ?, ?);";

    $sql_stmt = mysqli_stmt_init($connection); 
                                               
                                               
    if (!mysqli_stmt_prepare($sql_stmt, $sql)) {

        header("location: ../review.php?error=sql_stmt_failed"); 
        exit();

    }
    
    mysqli_stmt_bind_param($sql_stmt, "isis", $uid, $review_string, $review_int, $car_type);
    
    mysqli_stmt_execute($sql_stmt);

    mysqli_stmt_close($sql_stmt);

    header("location: ../sortiment.php");
    exit();
    
}



function checkRating($rating) {

    if ($rating > 0 && $rating < 6) {

        return true;
    }
    return false;
}