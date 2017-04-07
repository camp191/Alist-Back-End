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

    // Delete All lists
    $sqlDelList = "DELETE FROM list WHERE id='$id'";
    mysqli_query($con, $sqlDelList);

    // Delete All projects
    $sqlDelProject = "DELETE FROM project WHERE id='$id'";
    mysqli_query($con, $sqlDelProject);
    
    // Delete Account
    $sqlDelAccount = "DELETE FROM user WHERE id='$id'";
    mysqli_query($con, $sqlDelAccount);
    mysqli_close($con);
    unset($_SESSION["id"]);
    echo "<script>alert('Delete abount done. Thank you for used alist.')</script>";
    session_destroy();
    echo "<script>window.location = './../../../index.php'</script>";
?>