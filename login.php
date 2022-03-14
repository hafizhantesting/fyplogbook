<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login to Logbook</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
  	<h1>Co-curricular Logbook</h1>
  </div>
  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>ID</label>
  		<input type="text" name="id" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div style="text-align:center" class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
		  
  	</div>
	  <p>
  		Create account <a href="register.php">here</a>
  	</p>
  </form>
</body>
</html>