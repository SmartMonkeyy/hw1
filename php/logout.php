<?php
    disconnect();

    function disconnect(){
        session_start();
        session_destroy();
    }
    
    header("Location: ../home.php");
?>