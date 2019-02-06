<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>User Registration System using PHP and MySQL</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
  <div class="header">
    <h2>Login</h2>
  </div>
  <form method="post" action="login.php">
      <!--display validation here errors -->
      <?php include ('errors.php'); ?>
    <div class="input-group">
      <label><b>Username</b></label>
      <input type="text" name="username">
    </div>
    <div class="input-group">
      <label><b>Password</b></label>
      <input type="password" name="password">
    </div>
    <div class="input-group">
      <button type="submit" name="login" class="btn">Login</button>
    </div>
    <p align = "center">
      Not yet a member? <a href="register.php">Sign up</a>
    </p>
  </form>
  </body>
</html>
