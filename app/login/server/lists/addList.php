<?php
    session_start();
    include "./../../../assets/server/connection.php";

    $id = $_SESSION["id"];
    $listTopic = $_REQUEST["listTopic"];
    $listDescription = $_REQUEST["listDescription"];
    $listDate = $_REQUEST["date"];
    $listImportant = $_REQUEST["listImportant"];
    $listProjectName = $_REQUEST["listProjectName"];

    $sqlUser = "SELECT * FROM user WHERE id='$id'";
    $resultUser = mysqli_query($con, $sqlUser);
    $rowUser = mysqli_fetch_array($resultUser);

    if($rowUser["packageID"] != "2"){
        $sqlAddList = "INSERT INTO list(listName,listDescription, endDate, isImportant, isDone, id) VALUES('$listTopic','$listDescription','$listDate','$listImportant','No','$id')";
    } else {
        $sqlAddList = "INSERT INTO list(listName,listDescription, endDate, isImportant, isDone, id, projectID) VALUES('$listTopic','$listDescription','$listDate','$listImportant','No','$id','$listProjectName')";        
    }

    $resultAddList = mysqli_query($con, $sqlAddList);

    if($resultAddList){
        mysqli_close($con);
        header("Location: ./../../list.php?addList=done");
        exit();
    }
?>