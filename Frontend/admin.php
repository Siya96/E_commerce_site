<?php
    include_once 'header.php';
    

?>





<section class="changeCar">
    <form action="includes/admin.inc.php" method="post">
        <input type="text" name="carTypeInput">
        <input type="number" name="carAmountInput">
        <button type="submit" name="buttonAdd">Add</button>
        <button type ="submit" name="buttonRemove">Remove</button>
    </form>
    <section class="changeCar">
    <form action="includes/admin.inc.php" method="post">
        <input type="number" name="userID_admin">
        <button type="submit" name="addAdmin">Add Admin</button>
        
    </form>

    <?php
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

