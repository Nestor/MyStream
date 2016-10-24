<?php session_start(); require("../../core/init.php");
  if (isset($_SESSION['logged_in']) AND $_SESSION['logged_in'] == 1) {
    $fetchRank = $conn->prepare("SELECT * FROM `user` WHERE `email`=:email");
    $fetchRank->bindParam(":email", $_COOKIE['username']); // Yes that cookie ['username'] does contain the email
    $fetchRank->execute();
    while ($fr = $fetchRank->fetch(PDO::FETCH_ASSOC)) {
      if (password_verify($_SESSION['password'], $fr['password'])) {


 ?>
<html>
<title><?php echo WEBSITE_NAME; if (DISPpage == 1) { echo " | New Series"; }; ?></title>
<link rel="stylesheet" type="text/css" href="../../theme/style.css">
<script src="https://code..com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<body>

<div class="header">
	<div class="inner-header">
		<h1><?php echo WEBSITE_NAME; if (DISPpage == 1) { echo " | New Series"; } ?></h1>
	</div>
</div>
<div class="menu">
<a href="../index.php">Home</a>
<a href="../browse.php">Browse</a>
<a href="../search.php">Search</a>
<a href="../about.php">About</a>
</div>
<br><br><br><br><br><br>

<div class="centered">
<h1>Add a New Series</h1>
<form action="submit.php" method="post" enctype="multipart/form-data">
<div class="admin_input">
  <input type="big_input" name="name" placeholder="Series Name">
  <input type="big_input" name="desc" placeholder="Series Description">
  <select name="category">

  <?php
  $list_categories = $conn->prepare("SELECT * FROM `category`");
  $list_categories->execute();
  while ($lc = $list_categories->fetch(PDO::FETCH_ASSOC)) {
  ?>

  <option value="<?php echo $lc['name']; ?>"><?php echo $lc['name']; ?></option>
  
  <?php } ?>

  </select>
  <input type="big_input" name="type" placeholder="If your a smartarse and enable this and edit it then whatever your doing wont work!" value="series" style="display:none;">
    <input type="file" name="img" id="img">
  <input type="submit" value="Submit">
</div>
</form>

</div>




</body>
</html>

<?php } } } ?>
