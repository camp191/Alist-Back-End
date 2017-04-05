<?php

    // loop option for package name
    $resultLoopProject = '';
    while($rowProject = mysqli_fetch_array($resultSQLProject)){
        $resultLoopProject .= "<option value='" . $rowProject['projectID'] . "'>" . $rowProject['projectName'] . "</option>";
    }

?>