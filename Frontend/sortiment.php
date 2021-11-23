<?php
    
    include_once 'header.php';
    include_once 'includes/error_handler.php';
    include_once 'adjust_products.php';
    include_once 'includes/db_handler.php';



    $conn = $connection;
    
    $table = 'items';
    $itemArray = fetchAllRows($conn, $table);
    

    adjustItemsToRow($conn, $itemArray);


?>
           

                
<?php

    include_once 'footer.php';

?>




