<?php
session_start();
if (isset($_POST['signin'])) {
    require 'dbconnect.php';

    $username = $_POST['username'];
    $password = $_POST['password'];
    if (empty($username) || empty($password)) {
      header("Location: ../index.php?error=emptyfields");
      exit();
    }else {
      $sql = "SELECT * FROM users WHERE username=? OR email=? AND confirmation_att IS NOT NULL";
      $stmt = mysqli_stmt_init($dbconnect);
      if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("Location: ../index.php?error=sqlerror");
        exit();
      }else {
        mysqli_stmt_bind_param($stmt , "ss" , $username , $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)) {
          $pwdCheck = password_verify($password,$row['password']);
          if ($pwdCheck == false) {
            header("Location: ../index.php?error=wrongpassword");
            exit();
          }
          elseif ($pwdCheck == true) {
            session_start();
            $_SESSION['auth']=$username;
            header("Location: index.php?login=success");
            exit();
          }
        }else {
          header("Location: ../index.php?error=nouser");
          exit();
        }
      }
    }
}else {
  header("Location: ../index.php");
  exit();
}

 ?>
