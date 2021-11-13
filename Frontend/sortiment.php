<?php

    include_once 'header.php';
    
    include_once 'includes/sortiment.inc.php';
    include_once 'adjust_products.php';




?>

<?php

    $conn = $connection;
    $itemArray = fetchAllRows($conn);

    adjustItemsToRow($conn, $itemArray);


?>
           

                
<?php

    include_once 'footer.php';

?>




