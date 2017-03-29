<?php
    session_start();
    include "./../../../assets/server/connection.php";
    $id = $_SESSION["id"];

    // Delete Picture that user upload
    $sqlPicture = "SELECT picture FROM user WHERE id='$id'";
    $resultPicture = mysqli_query($con, $sqlPicture);
    $rowPicture = mysqli_fetch_array($resultPicture);
    $picture = $rowPicture["picture"];
    if($picture != ""){
        unlink("./../../upload/images/$picture");
    }
    
    // Delete Account
    $sqlDelAccount = "DELETE FROM user WHERE id='$id'";
    mysqli_query($con, $sqlDelAccount);
    mysqli_close($con);
    unset($_SESSION["id"]);
    session_destroy();
    header("Location: ./../../../index.php");
    exit();
?>