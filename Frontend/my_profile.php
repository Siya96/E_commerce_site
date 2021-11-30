<?php
  include_once 'header.php';
  include_once 'print_comments.php';
  include_once 'includes/db_handler.php';
  include_once 'includes/error_handler.php';
  $uid = $_SESSION["userID"];
  $conn = $connection;
  $name=$_SESSION["userUID"]; 
  $table = 'reviews';
  $table2 = 'orderhistory';
?>



<div class="profile">
	<h2>Hello <?php echo $name; ?></h2>
	
  <div class="comments">
		<h3>Order history</h3>
		
		<?php 
		$orderHistoryArray = fetchAllRowsSpecifiedAttribute($conn, $table2, $uid);
		printAllOrderHistory($conn, $orderHistoryArray);
		?>
		
	</div>

	<div class="comments">
		<h3>Old comments</h3>
		
		<?php 
		$commentArray = fetchAllRowsSpecifiedAttribute($conn, $table, $uid);
		printAllComments($conn, $commentArray);
		?>
		
	</div>
	
</div>



<?php
  include_once 'footer.php';
?>