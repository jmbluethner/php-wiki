<?php

  require "../scripts/php/functions.php";

  if(!isset($_SESSION['role'])) {
    $role = "guest";
  }

  $config = include('../config.php');

  $conn = connectToDatabase($config['SQLhost'],$config['SQLuser'],$config['SQLpass'],$config['SQLdbname']);
  if(!checkConnectionstate()) {
      die('There was a problem with the connection to SQL. Tell the Admin about it!');
  }

  // $username from Session

  if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
  } else {
    $username = "guest";
  }
  if(isset($_SESSION['role'])) {
    $role = $_SESSION['role'];
  } else {
    $role = "guest";
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <title>THE NIGHTTIMEDEV WIKI</title>
    <link rel="stylesheet" href="../styles/skeleton.css" />
    <link rel="stylesheet" href="../styles/main.css" />
    <link rel="stylesheet" href="../styles/navbar.css" />
    <meta charset="utf-8" />
  </head>
  <body>
    <div class="navbar_wrapper">
      <div class="navBar" id="mainNavBar">
        <div class="container">
          <a href="#home">NIGHTTIMEDEV</a>
          <a href="#service">Log In</a>
          <a href="#service">Sign Up</a>
          <a href="javascript:void(0);" class="icon" onClick="openDrawerMenu()">&#9776;</a>
        </div>
      </div>
    </div>
    <div class="debug">
      <?php print_r("User: ".$username."<br>Role: ".$role) ?>
    </div>
    <div class="imagehead">
      <div class="overlay"></div>
    </div>
    <div class="container topmargin">
      <?php
        // Roles: guest, member, root
        // Auch gibt es noch 'private' im Thread

        // Loop thru topics and fill in Threds
        $result = execSQL("SELECT * FROM topics",$conn);

        while($row = $result->fetch_assoc()) {
          ?>
          <div class="topic">
            <h6><?php echo utf8_encode($row['name']); ?></h6>
            <span><?php echo utf8_encode($row['description']); ?></span>
          </div>
          <div class="threadcontainer">
            <?php
              $name = utf8_encode($row['name']);
              if($role == "guest") {
                $result = execSQL("SELECT * FROM threads WHERE NOT private=1 AND visibility='guest' AND topic='$name'",$conn);
              } else if($role == "member") {
                $result = execSQL("SELECT * FROM threads WHERE private='$username' OR visibility='guest' OR visibility='member' AND topic='$name'",$conn);
              } else if($role == "root") {
                $result = execSQL("SELECT * FROM threads WHERE topic='$name'",$conn);
              } else {
                die();
              }
              //$result = execSQL("SELECT * FROM threads WHERE visibility='$role'",$conn);

              while($row = $result->fetch_assoc()) {
                $title = $row["title"];
                $content = $row["content"];


                ?>
                <div class="thread">
                  <h3><?php echo $title ?></h3>
                  <p><?php echo $content ?></p>
                </div>

              <?php
            }
            ?>
          </div>
          <?php
        }
        ?>
    </div>
  </body>
