<?php
    session_start();
    unset($_SESSION["Login"]);
    header('Location: ../../index.php');
?>