<?php
include('login.php');

if(isset($_SESSION['login_user'])){
    header("location: menu.php");
}
?>
<!DOCTYPE html>
<html >
  <head>
      <link href="css/style.css" rel="bootstrap.min.css">
          <link href="css/style.css" rel="stylesheet">

      <link rel="stylesheet" href="css/loginmodel.css.css">
</head>
<body>
<a href="#" data-toggle="modal" data-target="#login-modal">Login</a>

<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="loginmodal-container">
					<h1>Login to Your Account</h1><br>
                                  <form method="post">
					<input type="text" name="username" placeholder="Username">
					<input type="password" name="password" placeholder="Password">
					<input type="submit" name="submit" class="login loginmodal-submit" value="Login">
				  </form>
					
				  <div class="login-help">
					<a href="index.php">Cancelar</a>
				  </div>
				</div>
			</div>
		  </div>
</body>
</html>