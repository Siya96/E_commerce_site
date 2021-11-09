<?php

  include_once 'header.php';
  
?>


<section class="center_reg_customer">
  <h2>Sign up</h2>
  <div class="signup-form-form">
    <form action="includes/signup.inc.php" method="post">
      <input type="text" name="username" placeholder="Username...">
      <input type="text" name="email" placeholder="Email...">
      <input type="password" name="pwd" placeholder="Password...">
      <input type="password" name="pwd_repeat" placeholder="Repeat password...">
      <button type="submit" id="vidare_reg_customer" name="submit">Sign up</button>
    </form>
  </div>


  <?php

    #When $_POST is used we are checking for data in the URL which we can not see, but when
    #$_GET is used we are checking for data in the URL which we can see
    if (isset($_GET["error"])) {

      if ($_GET["error"] == "emptyinput") {

        echo "<p>Please fill in all fields!</p>";

      }
      else if($_GET["error"] == "invalidUID") {

        echo "<p>Invalid character found in the username!</p>";

      }
      else if($_GET["error"] == "invalidEmail") {

        echo "<p>Invalid email structure!</p>";

      }
      else if($_GET["error"] == "pwd_match_error") {

        echo "<p>Make sure that you repeat the same password!</p>";

      }
      else if($_GET["error"] == "UsernameAlreadyExists") {

        echo "<p>Username already taken, please choose a different one!</p>";

      }
      else if($_GET["error"] == "sql_stmt_failed") {

        echo "<p>An error occured, please try again!</p>";

      }
      else if($_GET["error"] == "UserSuccesfullyCreated") {

        echo "<p>Congratulations, you have signed up!</p>";

      }

    }

?>


</section>




<?php

  include_once 'footer.php';

?>