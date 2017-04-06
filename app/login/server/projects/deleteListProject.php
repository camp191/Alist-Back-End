<?php
    session_start();
    include "./../../../assets/server/connection.php";

    $id = $_SESSION["id"];
    $listID = $_GET["listID"];
    $projectID = $_GET["projectID"];

    $sqlDeleteList = "DELETE FROM list WHERE id='$id' AND listID='$listID'";
    $result = mysqli_query($con, $sqlDeleteList);

    if($result){
        mysqli_close($con);
        header("Location: ./../../project_table.php?projectID=$projectID&edit=done");
        exit();
    }
?>