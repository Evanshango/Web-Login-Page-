<?php
    session_start();

    $username = "";
    $email = "";
    $errors = array();
  //connet to the database
  $db = mysqli_connect('localhost', 'root', '', 'mysite');

  //if the register button is clicked
  if (isset($_POST['register'])) {
      // code...
      $username = mysqli_real_escape_string($db, $_POST['username']);
      $email = mysqli_real_escape_string($db, $_POST['email']);
      $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
      $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
      //ensure that form fields are filled properly
      if (empty($username)) {
          // code...
          array_push($errors, "Username is required"); //add error to errors array
      }
      if (empty($email)) {
          // code...
          array_push($errors, "Email is required");
      }
      if (empty($password_1)) {
          // code...
          array_push($errors, "Password is required");
      }
      if ($password_1 != $password_2) {
          // code...
          array_push($errors, "Passwords do not match");
      }
      //if there are no errors, save user to the db
      if (count($errors) == 0) {
          $password = md5($password_1);//encrypt password before storing in db
          $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
          mysqli_query($db, $sql);
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "You are now logged in";
          //redirect to homepage
          header('location: index.php');
      }
  }
  //log user in from login page
  if (isset($_POST['login'])) {
      $username = mysqli_real_escape_string($db, $_POST['username']);
      $password = mysqli_real_escape_string($db, $_POST['password']);
      //ensure that form fields are filled properly
      if (empty($username)) {
          // code...
          array_push($errors, "Username is required"); //add error to errors array
      }
      if (empty($password)) {
          // code...
          array_push($errors, "Password is required");
      }
      if (count($errors) ==0) {
          $password = md5($password); // encrypt password before comparing with that from db
          $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
          $result = mysqli_query($db, $query);
          if (mysqli_num_rows($result) == 1) {
              // log user in
              $_SESSION['username'] = $username;
              $_SESSION['success'] = "You are now logged in";
              header('location: index.php'); //redirect to homepage
          }else {
              array_push($errors, "Wrong Username and Password combination");
              //header('location: login.php');
          }
      }
  }
  //Logout
  if (isset($_GET['logout'])) {
      session_destroy();
      unset($_SESSION['username']);
      header('location: login.php');
  }
?>
