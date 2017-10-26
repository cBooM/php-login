<?php

if (!isset($_POST['submit'])) {

  header("Location: ../signup.php");
  exit();
}

include_once "connect.php";

$first = mysqli_real_escape_string($conn, $_POST['first']);
$last = mysqli_real_escape_string($conn, $_POST['last']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$uid = mysqli_real_escape_string($conn, $_POST['login']);
$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

// Eror hanlders
// Check for empty fields
if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)) {
  header("Location: ../signup.php?signup=empty");
  exit();
} else {
  // Check if input characters are valid
  if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
    header("Location: ../signup.php?signup=invalid");
    exit();
  } else {
    // Check if email is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      header("Location: ../signup.php?signup=invalid_email");
      exit();
    } else {
      $sql = "SELECT * FROM users WHERE user_login='$uid'";
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);

      if ($resultCheck > 0) {
        header("Location: ../signup.php?signup=invalid_usertaken");
        exit();
      } else {
        // Heshing the password
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        // Insert the user into the database
        $sql = "INSERT INTO users (user_first, user_last, user_email, user_login, user_password) VALUES ('$first', '$last', '$email', '$uid', '$hashedPwd');";
        mysqli_query($conn, $sql);

        // Go back to Signup page
        header("Location: ../signup.php?signup=success");
        exit();
      }
    }
  }
}
