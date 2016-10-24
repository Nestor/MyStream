<?php
/* 
I've designed the script to be heavily modifyable through this configuration file.


As of the 15th Oct 2016, everything in this configuration is editable!
*/

/* The name you want to call your video streaming site */
$website_name = "MyStream";

/* Display the page name in the header bar with the name
e.g.
0 = YourSiteName
1 = YourSiteName | ThePageName
*/

$dispPageName = 1;

/* MySQL Information */
$serverip = "localhost";
$username = "root";
$password = "root";
$dbname = "mystream";

$devmode = 1;

/* The folder that this is stored in, if its in the main directory where you land when you goto your domain, then just set this to your domain name! */
$website_root_user = "http://localhost:1111/Stream"; // Dont leave / at the end

/* The directory for where images are stored, just leave this how it is, unless you want to change it (there is no reason to to be honest), the default directory where images are stored is public/images/ if you want to store it in a folder before public you need to write ../imagepath
Also dont add a / to the end */
$image_dir = "images";

/* This is just to avoid spam bots, as registration should be private as its for people awaiting a rank */
/* Give this to anyone who you want to register - its to access the register page */
$registration_password = "12345";

/* 
*****************************************************************************************

	                  ____   _______   ____   _______  ____         _______
	|    /\    /\    |    | |	    | |    |     |    |    | |\   |    |
	|   /  \  /  \   |____| |		| |____|     |    |____| | \  |    |
	|  /    \/    \  |	    |	    | |   \      |    |    | |  \ |    |
	| /            \ |      |_______| |    \     |    |    | |   \|    |   (Wow it took a while making this "Important" sign)

										|
										|
										|
									   \ /
                                        .
 										
Underneath are a few configuration values for a feature that is coming soon!
Even if they say they are editable, they do NOTHING!
Touching these wont do anything until the feature is implemented.
If you haven't guessed its a login system. 
By the way, the files for this have already been implemented, and the tables will automatically be setup in the main setup so you don't have any hassle when it comes to installing the new update with the login system in.
If you want to review it in any way, just goto
-> libraries/modules/auth/lauth.php or rauth.php (lauth = login auth | rauth = register auth)
and
-> public/verification/verify.php (this is the file that you goto when verifying your email address)

All thats missing is the HTML files to allow people to make proper use of it, the reason they haven't been included is because they are pointless without the V2.1 Update which isn't ready yet!

*****************************************************************************************
*/

/* User timeout in minutes */
$user_timeout = 30; 

/* 
This is editable, but I wouldn't recommend it.
Defining of the resource cost of LOW, MID or HIGH for use underneath 
- The higher, the more resources it uses
	- The more resources it uses, the longer the user will have to wait for it to load:
*/
define(LOW, 10);
define(MID, 15);
define(HIGH, 20);

/* 
	You can edit this
	Resource Load for Password Hashing | LOW = Not as secure but fast | MID = Adds a bit of extra time | HIGH = Adds a lot of extra time
   the time it takes is variable on the server you have - powerful server = less time - slow server = more time.
 */
$hash_cost = MID;
?>