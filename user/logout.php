<?php
    session_start();
    if ($_SESSION['loggedIn'] == 'true') {
        // $_SESSION['loggedIn'] = 'false';
        // remove all session variables
        session_unset();

        // destroy the session
        session_destroy(); 
        header('location: ./');
    }    
?>