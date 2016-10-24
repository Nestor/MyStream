<?php session_start(); require("../../core/init.php");
  if (isset($_SESSION['logged_in']) AND $_SESSION['logged_in'] == 1) {
    $fetchRank = $conn->prepare("SELECT * FROM `user` WHERE `email`=:email");
    $fetchRank->bindParam(":email", $_COOKIE['username']); // Yes that cookie ['username'] does contain the email
    $fetchRank->execute();
    while ($fr = $fetchRank->fetch(PDO::FETCH_ASSOC)) {
      if (password_verify($_SESSION['password'], $fr['password'])) {


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

<a href="delete.php">
<div class="header">
	<div class="inner-header">
		<h1>Delete</h1>
	</div>
</div>
</a>

<br><br><br>

<div class="f-header">
	<div class="inner-header">
		<h1>Invitation Key: 
		<?php 
			$fetchKey = $conn->prepare("SELECT * FROM `user` WHERE email=:email");
			$fetchKey->bindParam(":email", $_COOKIE['username']); // Yes that cookie is the email despite the name username
			$fetchKey->execute();
			while ($fk = $fetchKey->fetch(PDO::FETCH_ASSOC)) {
				echo $fk['emailauthverify'] . "<br>";
				if ($fk['rank'] == 1) {
					?>
					<h2><a href="register.php" style="color:white;">Register (You need the invitation key)</a></h2><br>
					<h2>You have already registered, if you want pass your invitation key over to a trusted friend if you want them to help out with this site.<br>
					You have unlimited keys!</h2>
					<?php
				} else {
					?>
					<h2><a href="register.php" style="color:white;">Register (You need the invitation key)</a></h2><br>
					<h2>You have already registered, if you want pass your invitation key over to a trusted friend if you want them to help out with this site. <br>You only have 1 key, so use it wisely!</h2>
					<?php
				}
			}
		?>
		</h1>
		<br><br>

	</div>
</div>



</body>
</html>

<?php } } } ?>