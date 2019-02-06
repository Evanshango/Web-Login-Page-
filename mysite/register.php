<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>User Registration System using PHP and MySQL</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
  <div class="header">
    <h2>Register</h2>
  </div>

  <form method="post" action="register.php">
      <p align = "Right"> <b>* Required fields</b></p>
     <!--display validation here errors -->
     <?php include ('errors.php'); ?>
    <div class="input-group">
      <label><b>Username*</b></label>
      <input type="text" name="username" value="<?php echo $username; ?>">
    </div>
    <div class="input-group">
      <label><b>Email*</b></label>
      <input type="text" name="email" value="<?php echo $email; ?>">
    </div>
    <div class="input-group">
      <label><b>Password*</b></label>
      <input type="password" name="password_1">
    </div>
    <div class="input-group">
      <label><b>Confirm Password*</b></label>
      <input type="password" name="password_2">
    </div>
    <div class="input-group">
      <button type="submit" name="register" class="btn">Register</button>
    </div>
    <p align = "center">
      Already a member? <a href="login.php">Sign in</a>
    </p>
  </form>
  </body>
</html>
