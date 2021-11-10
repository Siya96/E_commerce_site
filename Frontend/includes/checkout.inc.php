<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'db_handler.php';
require_once 'error_handler.php';
//session_start();

if(isset($_SESSION["userID"])){
    $userid = $_SESSION["userID"];
    $sql = "SELECT basket.car_type from basket where basket.usersID = $userid;";
    $itemsInBasket = mysqli_query($connection, $sql);
    $totalAmount = 0;
    ?> <div class="checkProducts"> <?php
    
    while($row = $itemsInBasket->fetch_assoc()){
        $cartype = $row['car_type'];
        $sql2 = "SELECT items.price FROM items WHERE items.car_type = '$cartype';";
        $price = mysqli_query($connection, $sql2);
        
        $car_price = $price->fetch_assoc();
        $totalAmount = $totalAmount + $car_price['price'];
        ?><h2>Product: <?php echo $row['car_type']; ?></h2>
        <h2>Price: <?php echo $car_price['price']; ?></h2><hr> 
        <?php
        //echo "Cartype:".$row['car_type']."Price:".$car_price['price'];
    }
    echo "<h2>TOTAL PRICE:".$totalAmount. "</h2></div>";
}
else
{
    echo "Not logged in";
}
?>