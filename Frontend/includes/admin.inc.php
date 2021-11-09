<?php

   require_once 'db_handler.php';
   require_once 'error_handler.php';

   $sqlQuery = "SELECT car_type, car_inv FROM items;";
      

   $val = mysqli_query($connection, $sqlQuery);

   if(!$val) {
       die('Could not retrieve data'.mysqli_error($connection));

   }
  ?>
  <div class="itemTable"> 
      <table><tr><td>Car type</td><td>In stock</td></tr>
       <?php
           while($row = $val->fetch_assoc()) {

       ?>
                   <tr>
                   <td>
                   <?php
                   echo $row["car_type"]; 
                   ?></td>
                   <td>
                   <?php
                   echo $row["car_inv"]; 
                   ?>
                   </td>
                   </tr>

           <?php

            }

   ?>
       </table>
   </div> 
   <?php


   if(isset($_POST['buttonAdd'])) {

       $car_choice = strval($_POST['carTypeInput']);
       $car = $_POST['carAmountInput'];

      
       $sql = "SELECT * FROM items WHERE car_type = ?;";

       $sql_stmt = mysqli_stmt_init($connection);

       if (!mysqli_stmt_prepare($sql_stmt, $sql)) {

           header("location: ../admin.php?error=unknownError");
           exit();

       }

       mysqli_stmt_bind_param($sql_stmt, "s", $car_choice);

       mysqli_stmt_execute($sql_stmt);

       $data = mysqli_stmt_get_result($sql_stmt);

       $row = mysqli_fetch_assoc($data);

       $foundAmount = $row["car_inv"];

       mysqli_stmt_close($sql_stmt);



       $totalCarAmount = $foundAmount + $car;



       $sql2 = "UPDATE items SET car_inv=$totalCarAmount WHERE car_type = '$car_choice';";

       $sql2 = mysqli_query($connection, $sql2);


       header("location: ../admin.php?error=SuccessfullyUpdated");



   }
   

   if(isset($_POST['buttonRemove'])) {

        $car_choice = strval($_POST['carTypeInput']);

        $car = $_POST['carAmountInput'];


        $sql = "SELECT * FROM items WHERE car_type = ?;";

        $sql_stmt = mysqli_stmt_init($connection);

        if (!mysqli_stmt_prepare($sql_stmt, $sql)) {

            header("location: ../admin.php?error=unknownError");
            exit();

        }

        mysqli_stmt_bind_param($sql_stmt, "s", $car_choice);

        mysqli_stmt_execute($sql_stmt);

        $data = mysqli_stmt_get_result($sql_stmt);

        $row = mysqli_fetch_assoc($data);

        $foundAmount = $row["car_inv"];

        mysqli_stmt_close($sql_stmt);

        if ($foundAmount >= $car) {


            $totalCarAmount = $foundAmount - $car;


            $sql2 = "UPDATE items SET car_inv=$totalCarAmount WHERE car_type = '$car_choice';";
        
            $sql2 = mysqli_query($connection, $sql2);
        
        
            header("location: ../admin.php?error=SuccessfullyUpdated");
            exit();


        }
        else {

            header("location: ../admin.php?error=UpdateError");
            exit();


        }


}
function getCarAmount() {

    
}