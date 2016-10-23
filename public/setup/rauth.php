<?php
/* Dont  mess with this! */
require("../../core/init.php");
			$username = $_POST['username'];
			$email = $_POST['email'];
			$password = $_POST['password'];

						/* Hash password (bcrypt) */
			$settings = [ 
				'cost' => $hash_cost,	
			];
			$market_name = WEBSITE_NAME . "_";
			$password = password_hash($password, PASSWORD_DEFAULT, $settings);
			$authid = uniqid($market_name, true);


/* SQL - done in PDO - files called from init.php */
/* Prepare statement */
$register_user = $conn->prepare("INSERT INTO user (username, password, email, emailauthverify, verified, rank) VALUES (:username, :password, :email, :auid, 1, 1)");
$register_user->bindParam(":username", $username);
$register_user->bindParam(":password", $password);
$register_user->bindParam(":email", $email);
$register_user->bindParam(":auid", $authid);
$register_user->execute();

/* SuccessMsg */
echo "The setup process is now complete! <br><h1>Please delete the setup file!!! Or anyone can become an admin and therefore ruin your whole site.</h1>";



?>