<?php require("../core/init.php"); ?>
<html>
<title><?php echo WEBSITE_NAME; if (DISPpage == 1) { echo " | Home"; }; ?></title>
<link rel="stylesheet" type="text/css" href="../theme/style.css">
<script src="https://code..com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<body>

<div class="header">
	<div class="inner-header">
		<h1><?php echo WEBSITE_NAME; if (DISPpage == 1) { echo " | Home"; } ?></h1>
	</div>
</div>
<div class="menu">
<a href="index.php">Home</a>
<a href="browse.php">Browse</a>
<a href="search.php">Search</a>
<a href="about.php">About</a>
</div>
<br><br><br><br><br><br>

<div class="left">

<?php
	$getOddCards = $conn->prepare("SELECT * FROM `show` WHERE (`id` % 2) = 1 ORDER BY id+0 DESC LIMIT 5");
	$getOddCards->execute();

	while ($goc = $getOddCards->fetch(PDO::FETCH_ASSOC)) {
?>

<div class="card">
<a href="<?php echo 'player.php?video=' . $goc['title'] . '&category=' . $goc['category'] . '&series=' . $goc['series']; ?>" style="text-decoration:none;">
<div class="title-row">
<h1><?php echo $goc['title']; ?></h1>
</div>
<img src="<?php echo $goc['thumb_url']; ?>" />
</a>
</div>

<?php 
 }
?>

</div>

<div class="right">

<?php
	$getEvenCards = $conn->prepare("SELECT * FROM `show` WHERE (`id` % 2) = 0 ORDER BY id+0 DESC LIMIT 5");
	$getEvenCards->execute();

	while ($gec = $getEvenCards->fetch(PDO::FETCH_ASSOC)) {
?>

<div class="card">
<a href="<?php echo 'player.php?video=' . $gec['title'] . '&category=' . $gec['category'] . '&series=' . $gec['series']; ?>" style="text-decoration:none;">
<div class="title-row">
<h1><?php echo $gec['title']; ?></h1>
</div>
<img src="<?php echo $gec['thumb_url']; ?>" />
</a>
</div>

<?php 
 }
?>

</div>



</body>
</html>
