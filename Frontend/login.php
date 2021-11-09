<?php

  include_once 'header.php';

?>


<section class="signup-form">
  <h2>Log in</h2>
  <div class="signup-form-form">  
    <form action="includes/login.inc.php" method="post">
      <input type="text" name="uid" placeholder="Username/Email...">
      <input type="password" name="pwd" placeholder="Password...">
      <button type="submit" name="submit" id="vidare_login">Log in</button>
    </form>
  </div>

  <?php

    if (isset($_GET["error"])) {

      if ($_GET["error"] == "emptyinput") {

        echo "<p>Please fill in all fields!</p>";

      }
      else if($_GET["error"] == "invalidLogin") {

        echo "<p>Invalid login!</p>";

      }

    }

  ?>

</section>



<?php

  include_once 'footer.php';
  
?>

