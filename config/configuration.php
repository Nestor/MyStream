<?php
/* 
*****************************************************************************************
Version 2.2b

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
							THIS SCRIPT IS STILL IN BETA

 	I've spent so much time working on this, please if you notice anything DO NOT hesitate
 	to report it. If you want more features, just request them, this script is going to be
 	fully supported by me. (as of 24th Oct 16 - 00:48)	
	
	Do not hesitate to edit this file, I made it to be edited!
	I'd love if you used this/parts of this in your work, but please give me the appropriate
	credit, as it'd break my heart if you didn't.
	I could've gone to sleep but I've been determained on getting this finished!
 	Thank you for downloading this, enjoy! :)	
	My shoulder is killing me, so yeah, I am not going to write any more now...



*****************************************************************************************
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
$website_root_user = "localhost:1111/MyStream"; // Dont leave / at the end

/* The directory for where images are stored, just leave this how it is, unless you want to change it (there is no reason to to be honest), the default directory where images are stored is public/images/ if you want to store it in a folder before public you need to write ../imagepath
Also dont add a / to the end */
$image_dir = "images";

/* This is just to avoid spam bots, as registration should be private as its for people awaiting a rank */
/* Give this to anyone who you want to register - its to access the register page */
$registration_password = "12345";

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