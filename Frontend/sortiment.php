<?php

    include_once 'header.php';
    include_once 'includes/db_handler.php';
    include_once 'includes/sortiment.inc.php';

?>



<div class="row">

    <?php

        $conn = $connection;
        $itemArray = fetchAllRows($conn);

        foreach($itemArray as $product)
            {
                $imgUrl = $product['media'];
                $price = $product['price'];
                $carType = $product['car_type'];
        
    ?>

        <div class="col-sm-4">
            <img src=" <?php echo $imgUrl; ?> " id="adjust" width="300" height="250" alt="Image"/>
                
                <div class="product-hover">

                    <div class="product-bio">

                        <div class="prodcut-cat">

                            <a href="#"><?php echo $carType ?></a>

                        </div>

                        <div class="product-price">

                            <span class="symbole">$</span><span><strong><?php echo $price ?></strong></span>

                        </div>

                    </div>

                    <form action="includes/sortiment.inc.php" method="post">
                        <button class="btn btn-primary" name="AddFromCart">Add To Cart</button>
                        <button class="btn btn-primary" name="RemoveFromCart">Remove From Cart</button>
                    </form>

                </div>
        
        </div>
    
    <?php
        }
    ?>
    
</div>



<?php

    include_once 'footer.php';

?>




