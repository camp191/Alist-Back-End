<?php
    session_start();
    include "./../../../assets/server/connection.php";
    $id = $_SESSION["id"];

    // post variable
    $projectID = $_REQUEST['projectID'];
    echo $projectID;
    // delete list in project
    $sqlDeleteList = "DELETE FROM list WHERE id='$id' AND projectID='$projectID'";
    mysqli_query($con, $sqlDeleteList);

    // delete project
    $sqlDeleteProject = "DELETE FROM project WHERE id='$id' AND projectID='$projectID'";
    mysqli_query($con, $sqlDeleteProject);

    mysqli_close($con);
    header("Location: ./../../project.php?process=deleteDone");
    exit();

?>