<?php

session_start();

// Exit if accessed not from form
if (!isset($_POST['submit'])) {
  header("Location: ../index.php?login=error");
  exit();
}

// Connect to DataBase
include_once 'connect.php';

$login = mysqli_real_escape_string($conn, $_POST['uid']);
$pass = mysqli_real_escape_string($conn, $_POST['pwd']);

if (!empty($login) || !empty($pass)) {
  $sql = "SELECT * FROM users WHERE user_login='$login' OR user_email='$login'";
  $result = mysqli_query($conn, $sql);
  $rCheck = mysqli_num_rows($result);
  if ($rCheck < 1) {
    header("Location: ../index.php?login=error");
    exit();
  } else {
    if ($row = mysqli_fetch_assoc($result)) {
      // Dehashing the password
      $hashedPwdCheck = password_verify($pass, $row['user_password']);
      if ($hashedPwdCheck == false) {
        header("Location: ../index.php?login=error");
        exit();
      } elseif ($hashedPwdCheck == true) {
        // Log in the user here
        $_SESSION['u_id'] = $row['user_id'];
        $_SESSION['u_first'] = $row['user_first'];
        $_SESSION['u_last'] = $row['user_last'];
        $_SESSION['u_email'] = $row['user_email'];
        $_SESSION['u_login'] = $row['user_login'];
        header("Location: ../index.php?login=success");
        exit();
      }
    }
  }
}

?>