<?php

    function displayItem($item) {

        $imgUrl = $item['media'];
        $price = $item['price'];
        $carType = $item['car_type'];
        


    ?>

        <div class="col">

             

               <img src=" <?php echo $imgUrl; ?> " id="adjust" alt="Image"/>

            
                
            <div class="name">

                <?php echo $item['car_type']; ?>

            </div>

            <p>

                <span class="symbole">$</span><span><strong><?php echo $price; ?></strong></span>

            </p>

            <div class="buttons">

                <form action="includes/sortiment.inc.php" method="post">
                    <button class="btn btn-primary" value="<?php echo $carType;?>" name="AddToCart">Add To Cart</button>
                    
                </form>
                <form action="review.php" method = "post">
                    <button class ="btn btn-primary" value="<?php echo $carType;?>" name="SeeReviews">See reviews</button>
                </form>

            </div>
        
        </div>
    
    <?php

    }
    ?>



<?php


    function adjustItemsToRow ($connection, $itemArray) {
        
    ?>
    <div class="item_container">

        <div class="row">

        <?php

        $max_item_on_row = 4;
        $item_num = 1;
        
        for ($item = 0; $item < sizeof($itemArray); $item++) {
            
            displayItem($itemArray[$item]);

            if ($item_num % $max_item_on_row == 0) {

                ?>
                    </div>
                </div>
                <div class="item_container">
                    <div class="row">

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