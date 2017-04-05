<?php
    session_start();
    include "./../../../assets/server/connection.php";
    $id = $_SESSION["id"];

    // project variable
    $projectName = $_REQUEST["topicProject"];
    $projectType = $_REQUEST["typeProject"];
    $projectDescription = $_REQUEST["descriptionProject"];

    // add project to table
    $sqlAddProject = "INSERT INTO project(projectName,projectDescription,projectType,id) VALUES('$projectName','$projectDescription','$projectType','$id')";
    mysqli_query($con,$sqlAddProject);     

    // add list
    if(isset($_REQUEST["list"])) {

        // get latest project id
        $sqlLatestProject = "SELECT * FROM project WHERE id='$id' ORDER BY projectID DESC LIMIT 1";
        $resultLatestProject = mysqli_query($con, $sqlLatestProject);
        $rowLatestProject = mysqli_fetch_array($resultLatestProject);
       
        $list = $_REQUEST["list"];

        $addValue = array();
        for($i=0; $i < count($list['topic']); $i++){
            $addValue[] = '("' . $_POST['list']['topic'][$i] . '","' . $_POST['list']['description'][$i] . '","' . $_POST['list']['endDate'][$i] . '","' . $_POST['list']['important'][$i] . '","' . 'No' . '","' . "$id" . '","' . $rowLatestProject['projectID'] . '")';
        }

        $valueAddListSQL = implode("," , $addValue);

        $sqlAddList = "INSERT INTO list(listName,listDescription,endDate,isImportant,isDone,id,projectID) VALUES " . $valueAddListSQL;
        $resultAddList = mysqli_query($con, $sqlAddList);

        if($resultAddList){
            mysqli_close($con);
            header("Location: ./../../project.php?process=projectListDone");
            exit();
        }

    } else {
        mysqli_close($con);
        header("Location: ./../../project.php?process=projectDone");
        exit();
    }
?>