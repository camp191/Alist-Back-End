<?php
    session_start();
    include "./../../../assets/server/connection.php";
    $id = $_SESSION["id"];

    $currentPassword = $_REQUEST['currentPassword'];
    $newPassword = $_REQUEST['newPassword'];
    $confirmPassword= $_REQUEST['confirmPassword'];

    $sqlUser = "SELECT * FROM user WHERE id='$id'";
    $resultUser = mysqli_query($con, $sqlUser);
    $rowUser = mysqli_fetch_array($resultUser);

    $currentPasswordMD5 = md5($currentPassword);

    if($rowUser['password'] === $currentPasswordMD5){
        if($newPassword === $confirmPassword){
            $newPassMD5 = md5($newPassword);
            $sqlUpdatePassword = "UPDATE user SET password='$newPassMD5' WHERE id='$id'";
            mysqli_query($con, $sqlUpdatePassword);
            echo "<script>alert('Update Password Done Please Re-Login');</script>";
            mysqli_close($con);
            unset($_SESSION["id"]);
            session_destroy();
            echo "<script>window.location = './../../../index.php'</script>";
        } else {
           mysqli_close($con);
            header("Location: ./../../setting.php?stage=newPassNotMatch");
            exit(); 
        }
    } else {
        mysqli_close($con);
        header("Location: ./../../setting.php?stage=currentPassWrong");
        exit();
    }
?>