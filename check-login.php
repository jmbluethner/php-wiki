<?php

    require "./scripts/php/functions.php";

    $mail = $_POST['mail'];
    $pass = $_POST['pass'];

    $config = include('./config.php');

    $conn = connectToDatabase($config['SQLhost'],$config['SQLuser'],$config['SQLpass'],$config['SQLdbname']);
    if(!checkConnectionstate()) {
        die('There was a problem with the connection to SQL. Tell the Admin about it!');
    }

    $result = execSQL('SELECT * FROM users WHERE mail="$mail"',$conn);

    if ($result->num_rows == 0) {
        echo "Mail not found in database!";
    } else {
        echo "Mail exists";
    }

?>