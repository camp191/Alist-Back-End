<?php
    session_start();
    include "./../../../assets/server/connection.php";

    $listID = $_GET['listID'];
    $id = $_SESSION['id'];
    $listName = $_REQUEST['listTopic'];
    $listDescription = $_REQUEST['listDescription'];
    $listDate = $_REQUEST["date"];
    $listImportant = $_REQUEST["listImportant"];

    echo $listID,$id,$listName,$listDescription,$listDate,$listImportant;

    $sqlUser = "SELECT * FROM user WHERE id='$id'";
    $resultUser = mysqli_query($con, $sqlUser);
    $rowUser = mysqli_fetch_array($resultUser);

    if($rowUser["packageID"] == "2"){
        $listProjectName = $_REQUEST["listProjectName"];
    }

    if($rowUser["packageID"] != "2"){
        $sqlEditList = "UPDATE list SET listName='$listName',listDescription='$listDescription', endDate='$listDate', isImportant='$listImportant' WHERE id='$id' AND listID='$listID'";
    } else {
        $sqlEditList = "UPDATE list SET listName='$listName',listDescription='$listDescription', endDate='$listDate', isImportant='$listImportant' WHERE id='$id' AND listID='$listID'";
    }

    $resultEditList = mysqli_query($con, $sqlEditList);

    if($resultEditList){
        mysqli_close($con);
        echo "Done";
        header("Location: ./../../list.php?addList=done");
        exit();
    } else {
        mysqli_close($con);
        echo "not Done";
    }
    
?>