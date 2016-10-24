<?php
ob_start();
session_start();

require("../../../../core/init.php");

setcookie('username',$_SESSION['username'],time()+$_SESSION['int'], '/');
//setcookie('password',$_SESSION['password'],time()+$_SESSION['int'], '/'); Not used until better security for it
	echo "Complete! <br>";
	
	$redirect = WEBSITE_DOMAIN . "/admin/";
	echo "Loading...";

 	echo '<script>window.location.href = "' . $redirect . '";</script>';   

ob_end_flush();
?>