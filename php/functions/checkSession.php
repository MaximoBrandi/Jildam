<?php
    function checkSession($typeOP){
        if ($typeOP == 0) {
            if (!isset($_SESSION["Login"])) {
                header('Location: index.php');
            }
        }
        if ($typeOP == 1) {
            if (isset($_SESSION["Login"])) {
                header('Location: inicio.php');
            }
        }  
    }
?>