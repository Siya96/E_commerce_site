<?php
    include_once 'header.php';
    require_once 'includes/db_handler.php';
        

    $uid = $_SESSION["userID"];
    $sql = "SELECT * FROM admin WHERE admin.usersID = $uid;";
    $boolean = mysqli_query($connection, $sql);
    $check = $boolean->fetch_assoc();
    if($check){
       
     
    }else{
        echo "No admin rights";
        header("location: index.php");
        exit();
    }


?>



<section class="changeCar">
    <form action="includes/admin.inc.php" method="post">
        <h3>Add/Remove amount</h3>
        <input type="text" name="carTypeInput" placeholder="Car type">
        <input type="number" name="carAmountInput" placeholder="Amount">
        <button type="submit" name="buttonAdd">Add</button>
        <button type ="submit" name="buttonRemove">Remove</button>
    </form><br>
    <section class="changeCar">
    <form action="includes/admin.inc.php" method="post">
        <h3>Add admin</h3>
        <input type="text" name="userID_admin" placeholder="Username">
        <button type="submit" name="addAdmin">Add Admin</button>
        
    </form><br>
    <form action="includes/admin.inc.php" method="post">
        <h3>Add product</h3>
        <input type="text" name="carTypeInput" placeholder="Car type">
        <input type="number" name="carAmountInput" placeholder="Amount">
        <input type="number" name="carPriceInput" placeholder="Price"><br>
        <label for="img">Select image:</label>
        <input type="file" id="img" name="img" accept="image/*">
        <button type="submit" name="buttonAddNewItem">Add new item to sortiment</button>
        
    </form><br>

    <form action="includes/admin.inc.php" method="post">
        <h3>Remove item</h3>
        <input type="text" name="remove_car_type" placeholder="Item to be removed">
        <button type="submit" name="removeCar">Remove item</button>
        
    </form><br>


    <?php


        if (isset($_GET["error"])) {

            if ($_GET["error"] == "emptyinput") {

                echo "<p>Please fill in all fields!</p>";

            }
            else if($_GET["error"] == "SuccessfullyUpdated_add") {

                echo "<p>Items succesfully added!</p>";

            }
            else if($_GET["error"] == "SuccessfullyUpdated_remove") {

                echo "<p>Items succesfully removed!</p>";

            }
            else if($_GET["error"] == "UpdateError_remove") {

                echo "<p>Items could not be removed, amount exceeds inventory capacity!</p>";

            }

        }

    ?>
</div>



 
<?php

    include_once 'footer.php';

    
    
?>