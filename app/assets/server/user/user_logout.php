<?php
    session_start();
    echo "Hello";
    unset($_SESSION["name"]);
    unset($_SESSION["id"]);
    session_destroy();
    header("Location: ./../../../index.php");
    exit();
?>