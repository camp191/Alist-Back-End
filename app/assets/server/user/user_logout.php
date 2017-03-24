<?php
    session_start();
    echo "Hello";
    unset($_SESSION['name']);
    session_destroy();
    header("Location: ./../../../index.php");
    exit();
?>