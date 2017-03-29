<?php
    session_start();
    include "./../../../assets/server/connection.php";

    $now = time();
    $plusMonth = date("Y-m-d",$now + 2629743);
    $id = $_SESSION['id'];
    $package = $_REQUEST['Package'];
    $namePay = $_REQUEST['FSName'];
    $cardNumber = $_REQUEST['CardNumber'];

    $subscribeSQL = "UPDATE user SET namePay='$namePay', packageID='$package', cardNumber='$cardNumber', expDate='$plusMonth' WHERE id='$id'";
    $result = mysqli_query($con,$subscribeSQL);

    if($result){
        mysqli_close($con);
        header("Location: ./../../package.php?subscribe=done");
    }
    
?>