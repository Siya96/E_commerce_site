<?php

if(isset($_POST["submit"])) {

    $username = $_POST["username"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $pwd_repeat = $_POST["pwd_repeat"];



    require_once 'db_handler.php'; #Check to see that this file has been required, and if it has then it should not be included again

    require_once 'error_handler.php';

    

    if(emptyInputSignup($username, $email, $pwd, $pwd_repeat) !== false) { # In the condition we check to see if the emptyInputSignup method is anything but false, and if it is it means that some input is missing
       
        header("location: reg_customer.php?error=emptyinput"); #we can grab this error in the signup page to throw an error message
        exit();

    }

    if(invalidUsername($username) !== false) { # In the condition we check to see if the emptyInputSignup method is anything but false, and if it is it means that some input is missing
        
        header("location: reg_customer.php?error=invalidUID"); #we can grab this error in the signup page to throw an error message
        exit();

    }

    if(invalidEmail($email) !== false) { # In the condition we check to see if the emptyInputSignup method is anything but false, and if it is it means that some input is missing
        
        header("location: reg_customer.php?error=invalidEmail"); #we can grab this error in the signup page to throw an error message
        exit();

    }

    if(pwd_not_mathcing($pwd, $pwd_repeat) !== false) { # In the condition we check to see if the emptyInputSignup method is anything but false, and if it is it means that some input is missing
        
        header("location: reg_customer.php?error=pwd_match_error"); #we can grab this error in the signup page to throw an error message
        exit();

    }

    if(userNameExists($connection, $username, $email) !== false) { # In the condition we check to see if the emptyInputSignup method is anything but false, and if it is it means that some input is missing
        
        header("location: reg_customer.php?error=UsernameAlreadyExists"); #we can grab this error in the signup page to throw an error message
        exit();

    }

    createNewUser($connection, $username, $email, $pwd);
    

}

else {
    
    header("location: reg_customer.php"); #redirect to reg_customer.php
    exit();
}