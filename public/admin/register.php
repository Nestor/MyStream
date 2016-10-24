<?php require("../../core/init.php"); ?>

<html>
<title><?php echo WEBSITE_NAME; if (DISPpage == 1) { echo " | Register"; }; ?></title>
<link rel="stylesheet" type="text/css" href="../../theme/style.css">
<script src="https://code..com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<body>

<div class="header">
	<div class="inner-header">
		<h1><?php echo WEBSITE_NAME; if (DISPpage == 1) { echo " | Register"; } ?></h1>
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
<?php
  if (isset($_POST['locked_pass'])) {
    $fetchkey = array();
  $grabkeys = $conn->prepare("SELECT `emailauthverify` FROM `user`");
  $grabkeys->execute();
  while ($gk = $grabkeys->fetch(PDO::FETCH_ASSOC)) {
    $fetchkey[] = $gk['emailauthverify'];
}
  if (in_array($_POST['locked_pass'], $fetchkey)) {
    if ($_POST['locked_pass'] != "0/1 Keys Remaining") {
      $blacklist_key = $_POST['locked_pass']; 
?>
  
  <h1>Register</h1> 
<form action="../libraries/modules/auth/rauth.php" method="post"> 
<div class="admin_input"> 
  <input type="big_input" name="username" placeholder="Username">
  <input type="big_input" name="email" placeholder="Email">
  <input type="big_input" name="blacklist_key" value="<?php echo $blacklist_key; ?>" style="display:none;">
  <input type="password" name="password" placeholder="Password">

  <input type="submit" value="Submit">
</div>
</form>

<?php
} else { echo "<h2>Sorry! The verification key you have entered has already been used!</h2>"
?>
      <form action="register.php" method="post"> 
        <div class="admin_input"> 
        <input type="password" name="locked_pass" placeholder="Verification Key">
        <input type="submit" value="Submit">
        </div>
      </form>
<?php } } else {
 echo "<h2>Sorry! The password that you have entered is incorrect, please try again.</h2>"; ?> 
      <form action="register.php" method="post"> 
        <div class="admin_input"> 
        <input type="password" name="locked_pass" placeholder="Verification Key">
        <input type="submit" value="Submit">
        </div>
      </form>

 <?php } } else {
  ?>
      <h1>Locked Area</h1> 
      <form action="register.php" method="post"> 
        <div class="admin_input"> 
        <input type="password" name="locked_pass" placeholder="Verification Key">
        <input type="submit" value="Submit">
        </div>
      </form>
  <?php
 }
?>

</div>




</body>
</html>
