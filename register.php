<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Account Creation</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
	<div>
	<label>Role</label><br>
	<input type="radio" name="role" value="1" checked="checked">Student<br>
	<input type="radio" name="role" value="2">Facilitator<br>
  	
	</div>
  	<div style="text-align:center" class="input-group">
	  <button type="previous" class="btn" name="backToLogin">Back</button>
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	</form>
	</form>
</body>
<?php
if (isset($_POST['backToLogin'])) {
  header('location: login.php');
}
?>
</html>