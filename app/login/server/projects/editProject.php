<?php
    session_start();
    include "./../../../assets/server/connection.php";
    $id = $_SESSION["id"];

    $projectID = $_REQUEST['projectID'];
    $projectName = $_REQUEST['projectName'];
    $projectDescription = $_REQUEST['projectDescription'];
    $projectType = $_REQUEST['projectType'];

    $sqlEditProject = "UPDATE project SET projectName='$projectName',projectDescription='$projectDescription', projectType='$projectType' WHERE id='$id' AND projectID='$projectID'";
    
    if(mysqli_query($con, $sqlEditProject)){
        mysqli_close($con);
        header("Location: ./../../project_table.php?projectID=" . $projectID . "&edit=done");
    }


    
?>