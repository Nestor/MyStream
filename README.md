# 

<h1>MyStream</h1>
An open source streaming backend (along with its own theme), for you to host your own streaming website, or even your own portfolio website to show off your videos!




















<h2>Important!</h2>
 | THIS SCRIPT IS STILL IN BETA! |

I've spent so much time working on this, please if you notice anything DO NOT hesitate
to report it. If you want more features, just request them, this script is going to be
fully supported by me. (as of 24th Oct 16 - 00:48)	

I'd love if you used this/parts of this in your work, but please give me the appropriate
credit, as it'd break my heart if you didn't!

Also if you need any help, just ask me!

<h2>Installation Instructions</h2>
 1) Create a database and a user account to go with it, or you could use a master account.<br><br>
 2) Edit the MySQL information in the config/configuration.php file to match.<br>
 	-> $serverip = "localhost";<br>
	   $username = "root";<br>
	   $password = "root";<br>
	   $dbname = "mystream";<br><br>
 3) Edit the configuration file and put in the rest of the required values.
 4) Edit core/init.php AND ONLY CHANGE THE LINE:
    -> define(ROOT, $_SERVER["DOCUMENT_ROOT"] . "/Stream"); // Edit the /stream part, if you place the file in no folder, then get rid of /stream, if you placed it in a folder then do /foldername DO NOT LEAVE A / AT THE END!
    -> Only edit the part /Stream !!!!
 
# <h5><i>Version 2.3</i></h5>
