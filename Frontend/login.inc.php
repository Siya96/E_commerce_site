<?php

if (isset($_POST["submit"])) {

    $username = $_POST["uid"];
    
    $pwd = $_POST["pwd"];
    
    
    require_once 'db_handler.php';
    
    require_once 'error_handler.php';
    

    if(emptyInputLogin($username, $pwd) === true) { # In the condition we check to see if the emptyInputSignup method is anything but false, and if it is it means that some input is missing

        header("location: login.php?error=emptyinput"); #we can grab this error in the signup page to throw an error message
        exit();

    }
    
    loginUser($connection, $username, $pwd);
    
}
else {
    
    header("location: login.php"); #redirect to reg_customer.php
    exit();
}