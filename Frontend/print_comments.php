<?php

	function displayComment($item) {

        $carType = $item['car_type'];
        $text = $item['review_string'];
        $rating = $item['review_int'];
?>	
	<div class="see_comment">
				<p>About: <?php echo $carType?></p>
				<p>Comment: <?php echo $text?></p>
				<p>Rating: <?php echo $rating?></p>
			</div>
			
			 <?php

    }
    ?>
    <?php

function displayOrderHistory($item) {

$carType = $item['car_type'];
$price = $item['price'];
?>	
<div class="see_comment">
        <p>Car type: <?php echo $carType?></p>
        <p>Price: $<?php echo $price?></p>
    </div>
    
     <?php

}
?>
	
	<?php


    function printAllComments($connection, $commentArray) {
        
        
        for ($item = 0; $item < sizeof($commentArray); $item++) {
            
            displayComment($commentArray[$item]);

    }
    }
    function printAllOrderHistory($connection, $orderHistoryArray) {
        
        
        for ($item = 0; $item < sizeof($orderHistoryArray); $item++) {
            
            displayOrderHistory($orderHistoryArray[$item]);

    }
}


?>
