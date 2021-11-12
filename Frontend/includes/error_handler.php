<?php

function emptyInputSignup($userName, $email, $pwd, $pwd_repeat) {

    $result;
    
    if (empty($userName) || empty($email) || empty($pwd) || empty($pwd_repeat)) {

        $result = true;

    }
    else {

        $result = false;

    }

    return $result;

}

function invalidUsername($userName) {

    $result;

    if (!preg_match("/[a-zA-Z0-9]*$/", $userName)) {

        $result = true;

    }
    else {

        $result = false;

    }

    return $result;

}

function invalidEmail($email) {

    $result;

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $result = true;

    }
    else {

        $result = false;

    }

    return $result;

}

function pwd_not_mathcing($pwd, $pwd_repeat) {

    $result;

    if ($pwd !== $pwd_repeat) {

        $result = true;

    }
    else {

        $result = false;

    }

    return $result;

}

function userNameExists($connection, $userName, $email) {
    
    $result;

    $sql = "SELECT * FROM users WHERE usersUID = ? OR usersE = ?;"; #The questionmark is a placeholder
    $sql_stmt = mysqli_stmt_init($connection); #Here we prepare a "prepared statement" to prevent any sql-injection. The user could e.g. write malicous code in one of the output boxes and compromise our database, that's why we use prepared statement.
                                               #The $sql line (sql-statement) is tied to the prepared statement ($sql_stmt) withput any input from the user
                                               #and then later on we add input from the user to run them separately which prevents sql-injection.

    if (!mysqli_stmt_prepare($sql_stmt, $sql)) {

        header("location: ../reg_customer.php?error=sql_stmt_failed"); #we can grab this error in the signup page to throw an error message
        exit();

    }

    #If the prepared statement did not fail, then we we like to pass in data from the user.
    #The second parameter tells that we would like to pass in two strings, if it were three strings the argument would have been "sss"
    mysqli_stmt_bind_param($sql_stmt, "ss", $userName, $email);

    #We can now execute the statement, with mysqli_stmt_execute($sql_stmt); we are grabbing a user from the database to check if it exits
    mysqli_stmt_execute($sql_stmt);

    $data = mysqli_stmt_get_result($sql_stmt);

    #If we do get some data from $data then the user exists and we then throw and error
    if($row = mysqli_fetch_assoc($data)) {

        return $row;

    }
    else {

        $result = false;

        return $result;

    }
    mysqli_stmt_close($sql_stmt);

}


function createNewUser($connection, $userName, $email, $pwd) {

    $sql = "INSERT INTO users (usersUID, usersE, usersPWD, admin) VALUES (?, ?, ?, ?);";

    $adminprivilege = 0;

    $sql_stmt = mysqli_stmt_init($connection); 
                                               
                                               
    if (!mysqli_stmt_prepare($sql_stmt, $sql)) {

        header("location: ../reg_customer.php?error=sql_stmt_failed"); 
        exit();

    }
    $pwd_hashed = password_hash($pwd, PASSWORD_DEFAULT);

    
    mysqli_stmt_bind_param($sql_stmt, "sssi", $userName, $email, $pwd_hashed, $adminprivilege);
    
    mysqli_stmt_execute($sql_stmt);

    mysqli_stmt_close($sql_stmt);

    header("location: ../reg_customer.php?error=UserSuccesfullyCreated");

    exit();

}

function emptyInputLogin($userName, $pwd) {

    $result;
    
    if (empty($userName) || empty($pwd)) {

        $result = true;

    }
    else {

        $result = false;

    }

    return $result;

}

function loginUser($connection, $userName, $pwd) {

    $existing_UID = userNameExists($connection, $userName, $userName);


    if($existing_UID === false) {

        header("location: ../login.php?error=invalidLogin"); #we can grab this error in the signup page to throw an error message
        exit();

    }

    $pwd_hashed = $existing_UID["usersPWD"];

    $pwd_check = password_verify($pwd, $pwd_hashed);

    if ($pwd_check === false) {

        header("location: ../login.php?error=invalidLogin"); 
        exit();

    }
    else if ($pwd_check === true) {

        session_start();

        $_SESSION["userID"] = $existing_UID["usersID"];
        $_SESSION["userUID"] = $existing_UID["usersUID"];

        header("location: ../index.php"); 
        exit();

    }


}