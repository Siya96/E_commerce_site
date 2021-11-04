<?php

    $connection = mysqli_connect("localhost", "grupp2", "sportscar");

    if(!$connection) {
        die('Could not connect'.mysqli_connect_error());
    }
    else {
       mysqli_select_db($connection, "sportscar");
       $sqlQuery = 'SELECT car_type, car_inv FROM items';

       

       $val = mysqli_query($connection, $sqlQuery);

       if(!$val) {
           die('Could not retrieve data'.mysqli_error($connection));

       }
       else{
        ?><div class="itemTable"> <?php
           while($row = $val->fetch_assoc()) {
            
                echo "<br> Type: ".$row["car_type"]. "- Inventory :".$row["car_inv"]. "<br>";
            

           }
          ?></div> <?php


       }
       mysqli_close($connection);



    }

?>


<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="index.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="icon" href="favicon.gif" type="image/gif" sizes="15x15">
  
</head>
<body><div class="border-center"></div>



 
<div class="bannerContainer">
<nav class="navbar navbar-inverse">
  <div class="container">
    <div class="navbar-header">
	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="index.php" id="logo">Sportscar</a>
      
    </div>
	<div class="collapse navbar-collapse" id="myNavbar">
	
	<ul class="nav navbar-nav">
      <li><a href="index.php" id="menu">Home</a></li>
      <li class="dropdown"><a class="dropbtn" href="#" id="menu">Sortiment</a>
          <div class="dropdown-content link">
          <a href="bugatti.php">Bugatti</a>
          <a href="ferrari.php">Ferrari</a>
		  <a href="ford.php">Ford</a>
      </div></li>
	  <li><a href="contact.php" id="menu">Contact us</a></li>
      <li><a href="login.php" id="menu">Login</a></li>
      <li><a href="admin.php" id="active">Admin</a></li>
    </ul>
	

   
  </div></div>
</nav></div>



<div class="jumbotron">

</div><img src="blue_car_01.jpg" alt="A blue sportscar" id="first_pic">



  
 
<footer>
    <img src="logga.gif" alt:"Logo: Sportscar" class="logo_gif">
</footer>


</body>
</html>