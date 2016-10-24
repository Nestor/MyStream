<?php
/* Dont  mess with this! */
require("../../../../core/init.php");

  /* Check to see if the key is correct - prevents form variable manipulation */
  if (isset($_POST['blacklist_key'])) {
  $blacklist_key = $_POST['blacklist_key'];	
  $fetchkey = array();
  $grabkeys = $conn->prepare("SELECT `emailauthverify` FROM `user`");
  $grabkeys->execute();

    while ($gk = $grabkeys->fetch(PDO::FETCH_ASSOC)) {
    	$fetchkey[] = $gk['emailauthverify'];
    }

    	if (in_array($blacklist_key, $fetchkey) AND $blacklist_key != "0/1 Keys Remaining") {
    		/* Get variables from the register page */
			$username = $_POST['username'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$market_name = WEBSITE_NAME . "_";

			$website_domain = WEBSITE_DOMAIN;
			$hash_cost = PASS_HASH_COST;


			$checkRank = $conn->prepare("SELECT * FROM `user` WHERE emailauthverify=:blacklist_key");
		    $checkRank->bindParam(":blacklist_key", $blacklist_key);
			$checkRank->execute();

			  	while ($cr = $checkRank->fetch(PDO::FETCH_ASSOC)) {
			  		if ($cr['rank'] == 1) {
			  			/* Checks if your a superuser (created through the setup or by editing the table setting your rank to rank 1 | can create unlimited keys). */
			  			$unlimid = uniqid($market_name, true);
			  			$resetid = $conn->prepare("UPDATE `user` SET `emailauthverify`=:unlimid WHERE rank=1");
			  			$resetid->bindParam(":unlimid", $unlimid);
			  			$resetid->execute();

			  		} else {
						$destroy_key = $conn->prepare("UPDATE `user` SET `emailauthverify`='0/1 Keys Remaining' WHERE `emailauthverify`=:blacklist_key");
						$destroy_key->bindParam(":blacklist_key", $blacklist_key);
					    $destroy_key->execute();
			  		}
			  	}






/* Check for empty results */
if ( !empty($username) or !empty($email) or !empty($password) ) {

/* Hash password (bcrypt) */
$settings = [ 
	'cost' => $hash_cost,	
];
$password = password_hash($password, PASSWORD_DEFAULT, $settings);
$authid = uniqid($market_name, true);

/* SQL - done in PDO - files called from init.php */
/* Prepare statement */
$register_user = $conn->prepare("INSERT INTO user (username, password, email, emailauthverify, verified, rank) VALUES (:username, :password, :email, :auid, 1, 2)");
$register_user->bindParam(":username", $username);
$register_user->bindParam(":password", $password);
$register_user->bindParam(":email", $email);
$register_user->bindParam(":auid", $authid);
$register_user->execute();

/* Authentication Message to email 
$message = "Hello " . $username . ",\n Thank you for registering with " . $market_name . " to take full advantage of our service, please prove that you are the owner of this account by clicking on this link: \n" . $website_domain . "/verification/verify.php?auth=" . $authid . "&username=" . $username;
*/
/* Non-Authentication Message to email - I think the authentication system works, but there is no need */
	$message = "Hello " . $username . ",\n Thank you for registering with " . $market_name . ". Please wait whilst the site owner gives you your rank";

/* Limits words to lines */
$message = wordwrap($message, 100);

/* Sends email */
mail($email, "Account verification", $message);


/* SuccessMsg */
echo "Successfully registered<br>";


/* Redirect */

$redirect = WEBSITE_DOMAIN . "/admin/";
echo "Loading...";

	
 echo '<script>window.location.href = "' . $redirect . '";</script>';   


} else {
	/* FailMsg - Blank Field */
	echo "Sorry! You have left either one or more fields blank, please try again!";
}

/* You might want to change these */

} else { echo "Form Manipulation.... Success!!! JK FAILED! <br> Or if you didn't try to manipulate the form then you might have clicked submit twice or enter twice or more times, if you did and you had a valid key then your account should be created, but you might need to wait a minute for the hashing algorithm to hash your password."; } 
} else { echo "You could've at least tried to do something fancy, like the guy who manipulated a form."; }


?>