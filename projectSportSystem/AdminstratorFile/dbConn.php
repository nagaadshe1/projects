<?php
session_start();
$database = 'localhost';
$database_user = 'root';
$database_password = '';
$database_name = 'test';

// connection 
$con = mysqli_connect($database, $database_user, $database_password, $database_name);
if (!$con) {
  die('Connection Failed' . mysqli_connect_error());
}

if ($stmt = $con->prepare('SELECT id, password FROM  adminlogin  WHERE username = ?')) {
  // now let's bind the parameter
  $stmt->bind_param('s', $_POST['username']);
  $stmt->execute();

  // store the result
  $stmt->store_result();
  if ($stmt->num_rows() > 0) {
    $stmt->bind_result($id, $password);
    $stmt->fetch();

    // verify the password
    if ($_POST['password'] === $password) {
      // user login and create a session to know if they are logged in
      session_regenerate_id();
      $_SESSION['loggedin'] = true;
      $_SESSION['name'] = $_POST['username'];
      $_SESSION['id'] = $id;
      header('location: home.php');
    } else {
      echo " incorrect password";
      header('refresh:2;url=login.php');
    }
  } else {
    echo " incorrect username";
    header('refresh:2;url=login.php');
  }
  $stmt->close();
}
