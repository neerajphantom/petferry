<?php

session_start();
require "connection.php";
$adminid = "";
$username = "";
$password = ""; 


$errors = array();


//if user click login button
if(isset($_POST['login'])){
    // $username = $_POST['username'];
    // $password = $_POST['password']; 
  $username = mysqli_real_escape_string($con, $_POST['username']);
  $password = mysqli_real_escape_string($con, $_POST['password']);
//   $check_admin = "SELECT * FROM admin WHERE  admin_name = '$username' AND admin_password = '$password";
//   $res = mysqli_query($con, $check_admin);
  $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
  $result = mysqli_query($con, $sql);

  if (!$row = mysqli_fetch_assoc($result)) {
      // Store notification in session variable
      $_SESSION['notification'] = "Your username or password is incorrect!";
      // Redirect to the same page after a delay
      header("Refresh:1; url=login-admin.php");
      exit(); // Make sure to call exit after header
    // echo "Your username or password is incorrect!";
    // header('Location: login-admin.php');
  } else {
    // Store notification in session variable
      $_SESSION['notification'] = "You are logged in!";
      // Redirect to the same page after a delay
      header("Refresh:1; url=indexadmin.php");
      exit(); // Make sure to call exit after header
    // echo "You are logged in!";
    // header('Location: indexadmin.php');

  }
}

?>