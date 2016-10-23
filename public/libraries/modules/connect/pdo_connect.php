<?php
require (ROOT . "/config/configuration.php");

try {
    $conn = new PDO("mysql:host=" . SQL_SERVER_IP . ";dbname=". SQL_DB_NAME, SQL_USERNAME, SQL_PASSWORD);
    // set the PDO error mode to exception
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   if (DEVELOPMENT == 1) {
   error_reporting(E_ALL);
ini_set('display_errors', 1);
}

} 


catch(PDOException $e)
    {
    	if (DEVELOPMENT == 1) {
    		echo $sql . "<br>" . $e->getMessage();
    		error_reporting(E_ALL);
			ini_set('display_errors', 1);
		}

    }
