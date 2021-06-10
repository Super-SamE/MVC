<?php

    session_start();
    require_once 'pdoconnect.php';

    $logout = $_POST['logout'];

    if(isset($_POST['logout'])) {
        session_unset();
        header('Location: ../index.php');
    }

?>