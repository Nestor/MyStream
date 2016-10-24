<?php session_start(); require("../../core/init.php");
  if (isset($_SESSION['logged_in']) AND $_SESSION['logged_in'] == 1) {
    $fetchRank = $conn->prepare("SELECT * FROM `user` WHERE `email`=:email");
    $fetchRank->bindParam(":email", $_COOKIE['username']); // Yes that cookie ['username'] does contain the email
    $fetchRank->execute();
    while ($fr = $fetchRank->fetch(PDO::FETCH_ASSOC)) {
      if (password_verify($_SESSION['password'], $fr['password'])) {



 ?>
<html>
<title><?php echo WEBSITE_NAME; if (DISPpage == 1) { echo " | New Show"; }; ?></title>
<link rel="stylesheet" type="text/css" href="../../theme/style.css">
<script src="https://code..com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<body>

<div class="header">
	<div class="inner-header">
		<h1><?php echo WEBSITE_NAME; if (DISPpage == 1) { echo " | New Show"; } ?></h1>
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
<h1>Add a New Show</h1> 
<form action="submit.php" method="post" enctype="multipart/form-data"> 
<div class="admin_input"> 
  <input type="big_input" name="name" placeholder="Show Name"> 
  <input type="big_input" name="desc" placeholder="Show Description"> 
  <select name="series"> 
 
  <?php
  $list_show = $conn->prepare("SELECT * FROM `series`");
  $list_show->execute();
  while ($ls = $list_show->fetch(PDO::FETCH_ASSOC)) {
  ?>

  <option value="<?php echo $ls['name']; ?>"><?php echo $ls['name']; ?></option>
  
  <?php } ?>

  </select>
  <input type="big_input" name="link" placeholder="Show Link (e.g. http://yourdomain.tld/videos/video1.mp4)">
  <input type="big_input" name="type" placeholder="If your a smartarse, enable this and edit it then whatever your doing wont work!" value="show" style="display:none;">
    <input type="file" name="img" id="img">
  <input type="submit" value="Submit">
</div>
</form>

</div>




</body>
</html>

<?php } } } ?>