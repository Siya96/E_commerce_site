<?php

   require_once 'db_handler.php';
   
   $uid = $_SESSION["userID"];
   $sql = "SELECT * FROM admin WHERE admin.usersID = $uid;";
   $boolean = mysqli_query($connection, $sql);
   $check = $boolean->fetch_assoc();
   if($check){
    header("location: admin.php");

       exit();
   }else{
       echo "No admin rights";
       exit();
   }