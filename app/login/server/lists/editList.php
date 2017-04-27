<?php
    session_start();
    include "./../../../assets/server/connection.php";

    $listID = $_GET['listID'];
    $id = $_SESSION['id'];
    $listName = $_REQUEST['listTopic'];
    $listDescription = $_REQUEST['listDescription'];
    $listDate = $_REQUEST["date"];
    $listTime = $_REQUEST["endTime"];
    $listImportant = $_REQUEST["listImportant"];

    // echo $listID,$id,$listName,$listDescription,$listDate,$listImportant;

    $sqlUser = "SELECT * FROM user WHERE id='$id'";
    $resultUser = mysqli_query($con, $sqlUser);
    $rowUser = mysqli_fetch_array($resultUser);
    $listProjectName = 0;
    if($rowUser["packageID"] == "2"){
        $listProjectName = $_REQUEST["listProjectName"];
    }

    if($rowUser["packageID"] != "2"){
        $sqlEditList = "UPDATE list SET listName='$listName',listDescription='$listDescription', endDate='$listDate', endTime='$listTime', isImportant='$listImportant' WHERE id='$id' AND listID='$listID'";
    } else {
        $sqlEditList = "UPDATE list SET listName='$listName',listDescription='$listDescription', endDate='$listDate', endTime='$listTime', isImportant='$listImportant', projectID='$listProjectName' WHERE id='$id' AND listID='$listID'";
    }

    $resultEditList = mysqli_query($con, $sqlEditList);

    if($resultEditList){
        if($listProjectName == 0){
            mysqli_close($con);
            header("Location: ./../../list.php?addList=done");
            exit();
        } else {
            mysqli_close($con);
            header("Location: ./../../project_table.php?projectID=$listProjectName&edit=done");
            exit();
        }
    } 
    
?>