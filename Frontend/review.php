<?php

  include_once 'header.php';
  $car_type = $_POST["SeeReviews"];
    
?>


<div class="review-form-form">
  <h2>Review</h2>
    
    <form action="includes/review.inc.php" method="post">
      <textarea name="review_string" rows="4" cols = "70"></textarea><br>
      <input type="number" name="review_int">
      <button type="submit" value="<?php echo $car_type;?>" name="submit" id="review_submit">Submit review</button>
    </form>
  </div>





<?php

  include_once 'footer.php';
  
?>
