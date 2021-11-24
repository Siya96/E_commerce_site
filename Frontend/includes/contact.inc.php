<?php
	require_once 'db_handler.php';
    require_once 'error_handler.php';
	
	if(isset($_POST["submit"])){
		if(empty($_POST["name"]) or empty($_POST["message"])){
			header("location: ../contact.php?Error=InputNotFilled");
			exit();
		}elseif(invalidEmail($_POST["email"]) !== false){
			header("location: ../contact.php?Error=InvalidEmail");
			exit();
		}else{
			header("location: ../contact.php?MessageSuccessfullySent");
			exit();
		}
	}

?>