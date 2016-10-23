<?php 
	require("../../core/init.php");
	/* Required GET Variables */
	$verifyuser = $_GET["username"];
	$authkey = $_GET["auth"];

	/* Prepared Statement to fetch data from the users table to be used to verify */
	$fetchauthdata = $conn->prepare("SELECT * FROM us WHERE username=:username");
	$fetchauthdata->bindParam(":username", $verifyuser);
	$fetchauthdata->execute();

	while($fad = $fetchauthdata->fetch(PDO::FETCH_BOTH)) {
		/* Checks if the user is already verified */
		if ($fad['verified'] != 1) {
			/* Checks if the auth key in the table and the authkey the user has supplied through GET matches */
			if ($authkey == $fad['emailauthverify']) {
				$setverifyuser = $conn->prepare("UPDATE us SET verified=1");
				$setverifyuser->execute();
				/* SuccessMsg */
				echo "Thank you for registering with us, your account has now been verified.";
				/* Redirect */
				$redirect = ROOT . "/public/index.php";
				header("Refresh:0; url=$redirect");
			} else {
				/* FailMsg - Auth Codes don't match */
				echo "Sorry! Your auth code was incorrect, please resend it and try again!";
			}
		} else {
			/* FailMsg - Account already verified */
			echo "Your account has already been verified!";
			header("Refresh:0; url=$redirect");
		}
	}
?>