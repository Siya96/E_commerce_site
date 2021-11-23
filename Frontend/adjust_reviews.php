<?php


function displayReview($review, $usersUID) {

  $review_text = $review['review_string'];
  $rating = $review['review_int'];
  $username = $usersUID;
  
  

?>

  <div class="col_review">


      
          
      <div class="username">
        

          <?php echo $username;?> 


      </div>
      <p>

        <?php echo $review_text; ?>

      </p>

      <p>

          <span class="symbole"><?php echo ($username . " rated: " . $rating ) ?></span>

      </p>

  
  </div>

<?php

}
?>



<?php


function adjustReviewsToRow ($connection, $reviewArray, $usersUID_array) {
  
?>
<div class="item_container">

  <div class="row_review">

  <?php

  $max_item_on_row = 5;
  $item_num = 1;
  
  for ($item = 0; $item < sizeof($reviewArray); $item++) {
      
      displayReview($reviewArray[$item], $usersUID_array[$item]);
      

      if ($item_num % $max_item_on_row == 0) {

          ?>
              </div>
          </div>
          <div class="item_container">
              <div class="row_review">

          <?php
      }
      $item_num++;

  }
  ?>
  </div>

</div>
<?php

}


?>