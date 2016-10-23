<?php
ob_start();
session_start();
setcookie('username',$_SESSION['username'],time()+$_SESSION['int'], '/');
setcookie('password',$_SESSION['password'],time()+$_SESSION['int'], '/');
	echo "Complete! <br>";
ob_end_flush();
?>