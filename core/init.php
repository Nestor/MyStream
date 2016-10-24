<?php
/* 
* This file shouldn't be used for anything but declaration and definitions 
* This file should NOT be modified 
* You HAVE been warned!
*/

define(ROOT, $_SERVER["DOCUMENT_ROOT"] . "/Stream"); // Edit the /stream part, if you place the file in no folder, then get rid of /stream, if you placed it in a folder then do /foldername DO NOT LEAVE A / AT THE END!

////////////////////////////////////////////

require(ROOT . "/config/configuration.php");

/* Website Name */
define(WEBSITE_NAME, $website_name);

/* Display Page Name With Website Name */
define(DISPpage, $dispPageName);

/* MySQL Information */
define(SQL_SERVER_IP, $serverip);
define(SQL_USERNAME, $username);
define(SQL_PASSWORD, $password);
define(SQL_DB_NAME, $dbname);

/* Developer Mode - Displays all errors -> Boolean (1/0) */
define(DEVELOPMENT, $devmode);

/* Website Root - Where the default files start from */
$website_root = $website_root_user . "/public"; 
define(WEBSITE_DOMAIN, $website_root); 

/* Default images folder */
define(IMAGE_DIR, $image_dir);

/* Registration Password */
define(REGISTER_PASS, $registration_password);

/* User auto login expiration - Where it stays logged in for x amount of time */
$user_timeout = $user_timeout * 60;
define(USER_LOGOUT_TIME, $user_timeout);

/* Hash Cost */
define(PASS_HASH_COST, $hash_cost);

require(ROOT . "/public/libraries/modules/connect/pdo_connect.php");


?>
