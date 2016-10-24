<?php
	session_start();
	/* Don't Mess With This File! */
	require("../../../../core/init.php");

	/* Default variables for your email and password */
	$email = $_POST['email'];
	$password = $_POST['password'];
	$plaintext_store = $_POST['password'];
	$int = USER_LOGOUT_TIME;
	$_SESSION['int'] = $int;
	$hash_cost = PASS_HASH_COST;
	$settings = [ 
	'cost' => $hash_cost,	
	];


	/* Verify email prepared statement (password has verification comes in an if statement later) */
	$verifyEP = $conn->prepare("SELECT * FROM user WHERE email=:email");
	$verifyEP->bindParam(":email", $email);
	$verifyEP->execute();

	while ($vep = $verifyEP->fetch(PDO::FETCH_BOTH)) {
		/* Verify password hashes */
		if (password_verify($password, $vep['password'])) {
			$_SESSION['username'] = $vep['email'];
			$_SESSION['password'] = $plaintext_store;
			$_SESSION['logged_in'] = 1;			

			$redirect = WEBSITE_DOMAIN . "/libraries/modules/auth/set.php";
			echo "Loading...";

 			echo '<script>window.location.href = "' . $redirect . '";</script>';   

		} else {
			/* FailMsg */
    		echo 'Invalid Email or Password';
		}
	}
?>