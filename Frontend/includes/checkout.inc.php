<?php


require_once 'db_handler.php';
require_once 'error_handler.php';


if(isset($_SESSION["userID"])){
    $userid = $_SESSION["userID"];
    $sql = "SELECT basket.car_type, basket.basket_id from basket where basket.usersID = $userid;";
    $itemsInBasket = mysqli_query($connection, $sql);
    $totalAmount = 0;
    echo '<div class="checkProducts">';
	
	if ($itemsInBasket->num_rows == 0){
		echo "<h2>Empty basket.</h2>";
	}else{
    
		while($row = $itemsInBasket->fetch_assoc()){
		
			$cartype = $row['car_type'];
			$sql2 = "SELECT items.price FROM items WHERE items.car_type = '$cartype';";
			$price = mysqli_query($connection, $sql2);
        
			$car_price = $price->fetch_assoc();
			$totalAmount = $totalAmount + $car_price["price"];
			echo '<h2>Product: '.$row["car_type"].'</h2>';
			echo '<h2>Price: '.$car_price["price"].'</h2>';
			echo '<form method="post">'; //NO action = submits to same page
			echo '<input type="hidden" value="'.$row["basket_id"].'" name="basketID">';
			echo '<button type="submit" name="removeFromBasket">Remove from basket</button>';
			echo '</form><hr>';
			//echo "Cartype:".$row['car_type']."Price:".$car_price['price'];
		}
		
		echo '<h2>TOTAL PRICE:'.$totalAmount. '</h2><form method="post"><button type="submit" name="purchase_button"> Purchase items </button> </form> </div>';
	}
}else{
    echo "Not logged in";
}

if(isset($_POST['purchase_button'])){
    
	mysqli_query($connection, "START TRANSACTION");

    purchased($connection);


}

if(isset($_POST["removeFromBasket"])){
	removeFromBasket($connection);
}

function removeFromBasket($connection){
    
	$basketID = $_POST["basketID"];
	$sql = "DELETE FROM basket WHERE basket.basket_id=$basketID;";
    $result = mysqli_query($connection, $sql);
	header("location: checkout.php");
	exit();
}
function purchased($connection){
	$savePointSQL = "SAVEPOINT restart;";
	mysqli_query($connection, $savePointSQL);
    $uid = $_SESSION['userID']; 
    $sql = "SELECT car_type FROM basket WHERE basket.usersID = $uid;";

	

    $newTable = mysqli_query($connection,$sql);

	if(!$newTable){

		mysqli_query($connection, "ROLLBACK");
	}

    $removeFromBasketSQL = "DELETE from basket where basket.usersID = $uid;";
	
    $rowRemovedFromBasket = mysqli_query($connection,$removeFromBasketSQL);
	if(!$rowRemovedFromBasket){
		mysqli_query($connection, "ROLLBACK");
	}


	$restartSQL = "ROLLBACK TO restart;";
	$car_type_error = 0;
    while($row = $newTable->fetch_assoc()){
		
        $current_car_type = $row['car_type'];
        $totAmountOfCarsInRowSQL = "SELECT items.car_inv, price FROM items WHERE items.car_type = '$current_car_type';";
		
        $totAmountOfCarsInRow = mysqli_query($connection,$totAmountOfCarsInRowSQL);
		if(!$totAmountOfCarsInRow){
			mysqli_query($connection, "ROLLBACK");
		}
        $getINT = $totAmountOfCarsInRow->fetch_assoc();
		if($getINT['car_inv'] - 1 < 0){
			$car_type_error = -1;
		}
        $reducedAmount = $getINT['car_inv'] - 1;
        $updateAmountSQL = "UPDATE items SET items.car_inv = $reducedAmount WHERE items.car_type = '$current_car_type';";
		
        $amountUpdated = mysqli_query($connection, $updateAmountSQL);
		if(!$amountUpdated){
			mysqli_query($connection, "ROLLBACK");
		}

		$price_current_car_type = $getINT['price'];
		$addToOrderHistorySQL = "INSERT INTO `orderhistory`(`userID`, `car_type`, `price`) VALUES ($uid,'$current_car_type',$price_current_car_type);";
		$addToOrderHistory = mysqli_query($connection, $addToOrderHistorySQL);
		if(!$addToOrderHistory){
			mysqli_query($connection, "ROLLBACK");
		}
    }
	if($car_type_error == -1){
		mysqli_query($connection, "ROLLBACK");
		header("location: checkout.php?NoStock");
		exit();
	}

	mysqli_query($connection, "COMMIT");

    header("location: checkout.php?sucess");
	exit();
    
    
}
?>