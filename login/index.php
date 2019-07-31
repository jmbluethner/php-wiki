<?php

  require "../scripts/php/functions.php";

  if(checkLoginstate()) {
    echo "Logged in!";
    header('Location: ./index.php');
    die();
  }

?>

<form action="../check-login.php" method="POST">
    <input type="text" name="mail" placeholder="Mail"></input>
    <input type="password" name="pass" placeholder="password"></input>
    <button type="submit">Senden</button>
</form>
