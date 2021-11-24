<?php
  include_once 'header.php';
?>



<div class="contact">
	<h2>Contact us</h2>
	<form class="contact-form" action="includes/contact.inc.php" method="POST">
		<input type="text" name="name" placeholder="Name"><br>
		<input type="text" name="email" placeholder="Email"><br>
		<textarea name="message" rows="4" cols = "70" placeholder="Write message here"></textarea><br>
		<button type="submit" name="submit" id="vidare_contact">Submit message</button>
	</form>
</div>



<?php
  include_once 'footer.php';
?>