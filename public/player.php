<?php require("../core/init.php"); ?>
<html>
<title><?php echo WEBSITE_NAME; if (DISPpage == 1) { echo " | Play"; }; ?></title>
<link rel="stylesheet" type="text/css" href="../theme/style.css">
<script src="https://code..com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<body>

<div class="header">
	<div class="inner-header">
		<h1><?php echo WEBSITE_NAME; if (DISPpage == 1) { echo " | Play"; } ?></h1>
	</div>
</div>
<div class="menu">
<a href="index.php">Home</a>
<a href="browse.php">Browse</a>
<a href="search.php">Search</a>
<a href="about.php">About</a>
</div>
<br><br><br><br><br><br>
<?php

if (isset($_GET['video']) and isset($_GET['series'])) {

$title = $_GET['video'];
$series = $_GET['series'];

$findVideo = $conn->prepare("SELECT * FROM `show` WHERE title=:title AND series=:series");
$findVideo->bindParam(":title", $title);
$findVideo->bindParam(":series", $series);
$findVideo->execute();

while ($fv = $findVideo->fetch(PDO::FETCH_ASSOC)) {
	$videolink = $fv['file_link'];

?>
<div class="centered">
<h1>Now Playing <?php echo $title; ?></h1>
<video width="1000" controls>
  <source src="<?php echo $videolink; ?>">
  <h2>Your browser doesn't support HTML5 Video.</h2>
</video>

</div>
<?php } } else { ?>

<div class="centered">
	<h1>Please select a video! <a href="browse.php" style="color:white;">Browse</a></h1>
</div>

<?php	} ?>
</body>
</html>
