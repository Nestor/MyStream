<?php require("../core/init.php"); ?>
<html>
<title><?php echo WEBSITE_NAME; if (DISPpage == 1) { echo " | Search"; }; ?></title>
<link rel="stylesheet" type="text/css" href="../theme/style.css">
<script src="https://code..com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<body>

<div class="header">
	<div class="inner-header">
		<h1><?php echo WEBSITE_NAME; if (DISPpage == 1) { echo " | Search"; } ?></h1>
	</div>
</div>
<div class="menu">
<a href="index.php">Home</a>
<a href="browse.php">Browse</a>
<a href="search.php">Search</a>
<a href="about.php">About</a>
</div>
<br><br><br><br><br><br>

<form method="post" action="search.php">
<div class="search_input">
  <input type="big_input" name="search" placeholder="Search">  
  <input type="submit" value="Submit" hidden>
</div>
</form>

<br><br><br><br><br><br>


<?php

if (isset($_POST['search'])) {
	$search = '%' . $_POST['search'] . '%';
?>

<div class="left">

<?php
	$getOddCards = $conn->prepare("SELECT * FROM series WHERE name LIKE :search AND (`id` % 2) = 1 ORDER BY 'id' ASC LIMIT 10");
	$getOddCards->bindParam(":search", $search);
	$getOddCards->execute();

	while ($goc = $getOddCards->fetch(PDO::FETCH_ASSOC)) {
?>

<div class="card">
<a href="<?php echo 'player.php?video=' . $goc['name'] . '&category=' . $goc['category']; ?>" style="text-decoration:none;">
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
	$getEvenCards = $conn->prepare("SELECT * FROM series WHERE name LIKE :search AND (`id` % 2) = 0 ORDER BY 'id' ASC LIMIT 10");
	$getEvenCards->bindParam(":search", $search);
	$getEvenCards->execute();

	while ($gec = $getEvenCards->fetch(PDO::FETCH_ASSOC)) {
?>

<div class="card">
<a href="<?php echo 'player.php?video=' . $gec['name'] . '&category=' . $gec['category']; ?>" style="text-decoration:none;">
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



<?php } ?>

</body>
</html>
