<!doctype html>

<?php

#require ('connect.inc.php');

?>

<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="reg_customer.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="icon" href="logga.gif" type="image/gif" sizes="15x15">
</head>

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
      <div class="dropdown"><a class="dropbtn cart" href="#"></a>
          <div class="dropdown-content cartDown">
          <div class="tom"><p>You have no current order</p></div>
          <div class="result">
		  <p><b>Total cost:<b id="p3">0.0kr</b></b></p>
		  </div></div>
      </div>
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
      <li><a href="login.php" id="active">Login</a></li>
    </ul>
	
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown"><a class="dropbtn cart2" href="shoppingBag.html" id="menu"></a>
          <div class="dropdown-content cartDown">
          <div class="tom"><p>You have no current order!</p></div>
          <div class="result">
		  <p><b>Total cost:<b id="p3">0.0kr</b></b></p>
		  </div>
      </div></li>
    </ul>
  </div></div>
</nav></div>

<div class="center">
<b>Registrering</b>

<form action="reg2.php" method="POST">
<input type="text" name="fornamn" placeholder="Förnamn" required>
<input type="text" name="efternamn" placeholder="Efternamn" required><br>
<input type="email" name="epost" placeholder="E-post" required>
<input type="email" name="bek_epost" placeholder="Bekräfta e-post" required><br>
<input type="password" name="pwd" placeholder="Lösenord" required>
<input type="password" name="bek_pwd" placeholder="Bekräfta lösenord" required><br>
<input type="tel" name="tel" placeholder="Telefonnummer" required><br>
<button type="submit" id="vidare" name="signup-submit">Registrera</button>

</form>
</div>

<footer>
    <img src="logga.gif" alt:"Logo: Sportscar" class="logo_gif">
</footer>


</body>

</html>