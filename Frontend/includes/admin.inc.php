<?php

   require_once 'db_handler.php';
   require_once 'error_handler.php';

   


    if(isset($_POST["buttonAdd"])) {
        
        $carTypeInput = $_POST["carTypeInput"];

        $carAmountInput = $_POST["carAmountInput"];

        if (emptyInput($carTypeInput, $carAmountInput) === true) {

            header("location: ../admin.php?error=emptyinput"); #we can grab this error in the signup page to throw an error message
            exit();
        }
        buttonAddItem($connection, $carTypeInput, $carAmountInput);
    }


    if(isset($_POST["buttonRemove"])) {

        $carTypeInput = $_POST["carTypeInput"];

        $carAmountInput = $_POST["carAmountInput"];

        if (emptyInput($carTypeInput, $carAmountInput) === true) {

            header("location: ../admin.php?error=emptyinput"); #we can grab this error in the signup page to throw an error message
            exit();
        }

        buttonRemoveItem($connection, $carTypeInput, $carAmountInput);

    }
    if(isset($_POST["addAdmin"])){
        $uid = $_POST["userID_admin"];
        $sql_check = "SELECT * FROM users WHERE users.usersUID = '$uid';";
        $check_result = mysqli_query($connection, $sql_check);
        $boolean = $check_result->fetch_assoc();
        $new_id = $boolean['usersID'];
        if($boolean){
            $sql_insert_admin = "INSERT INTO `admin`(`usersID`) VALUES ($new_id);";
            mysqli_query($connection, $sql_insert_admin);
            header("location: ../admin.php?sucess");
            exit();
        }else{
            header("location: ../admin.php?error=NoUserFound");
            exit();
        }
    }

    if(isset($_POST["buttonAddNewItem"])) {

        $carType2 = $_POST["carTypeInput"];
        $carAmount2 = $_POST["carAmountInput"];
        $carPrice2 = $_POST["carPriceInput"];
        $img = $_POST["img"];

        if($carType2 <= 0 || $carAmount2 < 0) {
            header("location: ../admin.php?error=invalidPrice");
            exit();

        }


        $sql = "INSERT INTO `items`(`car_type`, `car_inv`, `price`, `media`) VALUES ('$carType2', $carAmount2, $carPrice2, 'img/$img');";

        $result = mysqli_query($connection, $sql);

        if(!$result) {

            header("location: ../admin.php?error=unknownError");
            exit();

        }
        header("location: ../admin.php?error=SuccessfullyAddedNewItem");
        exit();

    }






function buttonAddItem($connection, $car_type_input, $car_amount_input) {


    $foundAmount = getItemAmount($connection, $car_type_input);

    $totalCarAmount = ($foundAmount + $car_amount_input);

    $sql2 = "UPDATE items SET car_inv=$totalCarAmount WHERE car_type = '$car_type_input';";

    mysqli_query($connection, $sql2);

    header("location: ../admin.php?error=SuccessfullyUpdated_add");
    exit();

}



function buttonRemoveItem($connection, $car_type_input, $car_amount_input) {


    $foundAmount = getItemAmount($connection, $car_type_input);

    if ($foundAmount >= $car_amount_input) {

        $totalCarAmount = $foundAmount - $car_amount_input;

        $sql2 = "UPDATE items SET car_inv=$totalCarAmount WHERE car_type = '$car_type_input';";

        mysqli_query($connection, $sql2);


        header("location: ../admin.php?error=SuccessfullyUpdated_remove");
        exit();

    }
    else {

        header("location: ../admin.php?error=UpdateError_remove");
        exit();

    }

}


function getItemAmount($connection, $car_choice) {


    $sql = "SELECT * FROM items WHERE car_type = ?;";

    $sql_stmt = mysqli_stmt_init($connection);


    if (!mysqli_stmt_prepare($sql_stmt, $sql)) {

        header("location: ../admin.php?error=unknownError");
        exit();
    }


    mysqli_stmt_bind_param($sql_stmt, "s", $car_choice);
    mysqli_stmt_execute($sql_stmt);

    $data = mysqli_stmt_get_result($sql_stmt);
    $row = mysqli_fetch_assoc($data);

    $foundAmount = $row["car_inv"];

    mysqli_stmt_close($sql_stmt);

    return $foundAmount;

}

/*function fetchAllRows($connection) {

    $sql = "SELECT * FROM items;";

    $result = mysqli_query($connection, $sql);

    $num_rows = mysqli_num_row($result);

    $array = array();

    if ($num_rows > 0) {

        $index = 0;

        while ($row = mysqli_fetch_assoc($result)) {

            $array[$index] = $row;
            $index++;

        }
    }
    return $array;

}*/


function emptyInput($carType, $carAmount) {

    $result;

    if (empty($carType) || empty($carAmount)) {

        $result = true;

    }
    else {

        $result = false;

    }

    return $result;

}