<?php require("../core/init.php"); ?>
<html>
<title><?php echo WEBSITE_NAME; if (DISPpage == 1) { echo " | Browse"; }; ?></title>
<link rel="stylesheet" type="text/css" href="../theme/style.css">
<script src="https://code..com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<body>

<div class="header">
	<div class="inner-header">
		<h1><?php echo WEBSITE_NAME; if (DISPpage == 1) { echo " | Browse"; } ?></h1>
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
<?php if (!isset($_GET['category'])) { ?>

<?php
	$getOddCards = $conn->prepare("SELECT * FROM `category` WHERE (`id` % 2) = 1 ORDER BY id+0 DESC LIMIT 5");
	$getOddCards->execute();

	while ($goc = $getOddCards->fetch(PDO::FETCH_ASSOC)) {
?>

<div class="card">
<a href="<?php echo 'browse.php?category=' . $goc['name']; ?>" style="text-decoration:none;">
<div class="title-row">
<h1><?php echo $goc['name']; ?></h1>
</div>
<img src="<?php echo $goc['thumb']; ?>" />
</a>
</div>

<?php 
 }
?>

</div>

<div class="right">

<?php
	$getEvenCards = $conn->prepare("SELECT * FROM `category` WHERE (`id` % 2) = 0 ORDER BY id+0 DESC LIMIT 5");
	$getEvenCards->execute();

	while ($gec = $getEvenCards->fetch(PDO::FETCH_ASSOC)) {
?>

<div class="card">
<a href="<?php echo 'browse.php?category=' . $gec['name']; ?>" style="text-decoration:none;">
<div class="title-row">
<h1><?php echo $gec['name']; ?></h1>
</div>
<img src="<?php echo $gec['thumb']; ?>" />
</a>
</div>

<?php 
 }
?>

<?php } if (isset($_GET['category']) AND !isset($_GET['series'])) { ?>

<?php
	$category = $_GET['category'];
	$getOddCards = $conn->prepare("SELECT * FROM `series` WHERE (`id` % 2) = 1 AND category=:category ORDER BY id+0 DESC LIMIT 5");
	$getOddCards->bindParam(":category", $category);
	$getOddCards->execute();

	while ($goc = $getOddCards->fetch(PDO::FETCH_ASSOC)) {
?>

<div class="card">
<a href="<?php echo 'browse.php?category=' . $category . "&series=" . $goc['name']; ?>" style="text-decoration:none;">
<div class="title-row">
<h1><?php echo $goc['name']; ?></h1>
</div>
<img src="<?php echo $goc['thumb']; ?>" />
</a>
</div>

<?php 
 }
?>

</div>

<div class="right">

<?php
	$getEvenCards = $conn->prepare("SELECT * FROM `series` WHERE (`id` % 2) = 0 AND category=:category ORDER BY id+0 DESC LIMIT 5");
	$getEvenCards->bindParam(":category", $category);
	$getEvenCards->execute();

	while ($gec = $getEvenCards->fetch(PDO::FETCH_ASSOC)) {
?>

<div class="card">
<a href="<?php echo 'browse.php?category=' . $category . "&series=" . $gec['name']; ?>" style="text-decoration:none;">
<div class="title-row">
<h1><?php echo $gec['name']; ?></h1>
</div>
<img src="<?php echo $gec['thumb']; ?>" />
</a>
</div>

<?php 
 }
?>



</div>

<?php } if (isset($_GET['series'])) { ?>

<?php
	$series = $_GET['series'];
	$getOddCards = $conn->prepare("SELECT * FROM `show` WHERE series=:series AND (`id` % 2) = 1 ORDER BY id+0 DESC LIMIT 9999");
	$getOddCards->bindParam(":series", $series);
	$getOddCards->execute();

	while ($goc = $getOddCards->fetch(PDO::FETCH_ASSOC)) {
?>

<div class="card">
<a href="<?php echo 'player.php?video=' . $goc['title'] . '&series=' . $goc['series']; ?>" style="text-decoration:none;">
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
	$getEvenCards = $conn->prepare("SELECT * FROM `show` WHERE series=:series AND (`id` % 2) = 0 ORDER BY id+0 DESC LIMIT 9999");
	$getEvenCards->bindParam(":series", $series);
	$getEvenCards->execute();

	while ($gec = $getEvenCards->fetch(PDO::FETCH_ASSOC)) {
?>

<div class="card">
<a href="<?php echo 'player.php?video=' . $gec['title'] . '&series=' . $gec['series']; ?>" style="text-decoration:none;">
<div class="title-row">
<h1><?php echo $gec['title']; ?></h1>
</div>
<img src="<?php echo $gec['thumb_url']; ?>" />
</a>
</div>

<?php 
 }
?>

<?php } ?>


</body>
</html>
