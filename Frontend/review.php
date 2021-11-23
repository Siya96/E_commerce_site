<?php

  include_once 'header.php';
  
  

  $car_type = $_POST["SeeReviews"];
?>


<div class="review-form-form">
  <h2>Review</h2>
    
    <form action="submit_review.php" method="post">
      <button class= "button_write_review" role="button " type="submit" value="<?php echo $car_type;?>" name="submit">Write review</button>
    </form>
  </div>



<?php

  
  include_once 'includes/review.inc.php';
  include_once 'adjust_reviews.php';
  include_once 'includes/db_handler.php';
  


  $conn = $connection;

  
  $reviewArray = getReviews($conn, $car_type);
  
  $usersUID_array = getUsersUID($conn, $car_type);
  
  
  adjustReviewsToRow($conn, $reviewArray, $usersUID_array);
  
?>




<?php

  

  include_once 'footer.php';
  
?>
