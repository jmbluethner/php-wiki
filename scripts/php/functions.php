<?php

    function isUserLoggedIn() {
        session_start();
        if(isset($_SESSION['login']) && $_SESSION['login']) {
            return true;
        }
        return false; 
    }
        
    function grabUserdata() {
        
    }
    
?>