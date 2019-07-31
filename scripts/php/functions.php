<?php

    function connectToDatabase($SQLhost,$SQLuser,$SQLpass,$SQLdbname) {
        $conn = new mysqli($SQLhost, $SQLuser, $SQLpass, $SQLdbname);
        if ($conn->connect_error) {
            return 'Connection failed: '.$conn->connect_eror;
            die();
        }
        return $conn;
    }
    function disconnectFromDatabase() {
        if(isset($conn)) {
            $conn -> close();
            return 'closed';
        } else {
            return 'there was no connection';
        }
    }

    function checkConnectionstate() {
        if(!isset($conn)) {
            return 'There is no connection to an SQL database!';
         }
         if ($conn->connect_error) {
             return 'Connection failed: '.$conn->connect_eror;
         }
         return true;
    }
    function execSQL($sql,$conn) {
        if(checkConnectionstate()) {
            $result = $conn->query($sql);
            return $result;
        }
        return 'Connection error!';
    }

    function isUserLoggedIn() {
        session_start();
        if(isset($_SESSION['login']) && $_SESSION['login']) {
            return true;
        }
        return false; 
    }

?>