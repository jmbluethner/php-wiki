<?php

    require "./scripts/php/functions.php";

    $mail = $_POST['mail'];
    $pass = $_POST['pass'];

    $config = include('./config.php');

    $conn = connectToDatabase($config['SQLhost'],$config['SQLuser'],$config['SQLpass'],$config['SQLdbname']);
    if(!checkConnectionstate()) {
        die('There was a problem with the connection to SQL. Tell the Admin about it!');
    }

    $result_mail = execSQL("SELECT mail FROM users WHERE mail='$mail'",$conn);
    $result_name = execSQL("SELECT username FROM users WHERE username='$mail'",$conn);

    if ($result_mail->num_rows == 0 && $result_name->num_rows == 0) {
      // Neither Mail nor Username exists
      header('Location: ./login.php?error=Wrong%20login%20data');
      die();
    } else {
      if($result_mail->num_rows != 0) {
        $logintype = "mail";
      } else if($result_name->num_rows != 0) {
        $logintype = "username";
      } else {
        die("Error checking logintype");
      }
    }

    if($logintype == "mail") {
      $setPW = execSQL("SELECT pass FROM users WHERE mail='$mail'",$conn);
    } else {
      $setPW = execSQL("SELECT pass FROM users WHERE username='$mail'",$conn);
    }

    while($row = $setPW->fetch_assoc()) {
      $dbPW = $row["pass"];
    }

    if($dbPW != $pass) {
      // Wrong pass
      header('Location: ./login/index.php?error=Wrong%20login%20data');
      die();
    }

    // Get all data
    if($logintype == "mail") {
      $sql = execSQL("SELECT * FROM users WHERE mail='$mail'",$conn);
    } else {
      $sql = execSQL("SELECT * FROM users WHERE username='$mail'",$conn);
    }

    while($row = $sql->fetch_assoc()) {
      $_SESSION['username'] = $row["username"];
      $_SESSION['mail'] = $row["mail"];
      $_SESSION['role'] = $row["role"];
      $_SESSION['avatar'] = $row["avatar"];
      $_SESSION['firstname'] = $row["firstname"];
      $_SESSION['surname'] = $row["surname"];
    }

    // Logged in!
    logUserIn();

    header('Location: ./index.php');
?>
