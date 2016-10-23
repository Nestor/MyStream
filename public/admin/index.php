<?php session_start(); require("../../core/init.php");
	if (isset($_SESSION['logged_in']) AND $_SESSION['logged_in'] == 1) {
		$fetchRank = $conn->prepare("SELECT * FROM `user` WHERE `email`=:email");
		$fetchRank->bindParam(":email", $_COOKIE['username']); // Yes that cookie ['username'] does contain the email
		$fetchRank->execute();
		while ($fr = $fetchRank->fetch(PDO::FETCH_ASSOC)) {
			if (password_verify($_COOKIE['password'], $fr['password'])) {
				echo "SUCCESS!";
			}

 ?>
<html>
<title><?php echo WEBSITE_NAME; if (DISPpage == 1) { echo " | Adminisration"; }; ?></title>
<link rel="stylesheet" type="text/css" href="../../theme/style.css">
<script src="https://code..com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<body>

<div class="header">
	<div class="inner-header">
		<h1><?php echo WEBSITE_NAME; if (DISPpage == 1) { echo " | Home"; } ?></h1>
	</div>
</div>
<div class="menu">
<a href="../index.php">Home</a>
<a href="../browse.php">Browse</a>
<a href="../search.php">Search</a>
<a href="../about.php">About</a>
</div>
<br><br><br><br><br><br>

<a href="new_category.php">
<div class="header">
	<div class="inner-header">
		<h1>Add New Category</h1>
	</div>
</div>
</a>


<a href="new_series.php">
<div class="header">
	<div class="inner-header">
		<h1>Add New Series</h1>
	</div>
</div>
</a>

<br><br>

<a href="new_show.php">
<div class="header">
	<div class="inner-header">
		<h1>Add New Show</h1>
	</div>
</div>
</a>

<div class="header">
	<div class="inner-header">
		<h1>View Users</h1>
	</div>
</div>



</body>
</html>

<?php } } ?>