<?php
session_start();
include "./../../../assets/server/connection.php";

// timezone
date_default_timezone_set("Asia/Bangkok");

$id = $_SESSION['id'];
$dateNow = date("Y-m-d", time());
$dateTomorrow = date('Y-m-d', time() + 86400);

$sqlActiveList = "SELECT * FROM list WHERE id='$id' AND isDone='No' ORDER BY endDate";
$resultActiveList = mysqli_query($con, $sqlActiveList);

$sql = "SELECT * from user WHERE id='$id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);


echo "<table class='table table-hover'>
    <!-- head table-->
    <tr>
        <th class='text-center row-table'>List NO.</th>
        <th class='text-center row-table'>List Name</th>
        <th class='text-center row-table'>List Description</th>
        <th class='text-center row-table'>End Date</th>";
            // check package id for add column Project Name
            if($row['packageID'] == 2){
                echo "<th class='text-center row-table'>Project Name</th>";
            }
        echo "<th class='text-center row-table'>Control</th>
    </tr>";

        $listNumber = 1;

        while($rowActiveList = mysqli_fetch_array($resultActiveList)){

                //query project name
                $sqlProjectName = "SELECT * FROM project WHERE id='$id' AND projectID='" . $rowActiveList['projectID'] . "'";
                $ProjectNameResult = mysqli_query($con, $sqlProjectName);
                $rowProjectName = mysqli_fetch_array($ProjectNameResult);

                if($rowProjectName['projectName'] == ''){
                    $projectNameShow = "-";
                } else {
                    $projectNameShow = $rowProjectName['projectName'];
                }
            
                echo "<tr";

                if($rowActiveList['endDate'] == $dateNow){
                    echo " class='danger'";
                } else if($rowActiveList['endDate'] == $dateTomorrow){
                    echo " class='warning'";
                } else if(strtotime($rowActiveList['endDate']) < time()){
                    echo " class='active'";
                }

                echo ">
                    <td class='col-md-1 text-center row-table'> $listNumber </td>
                    <td class='col-md-2 row-table'>" . $rowActiveList['listName']; 
                    
                    if($rowActiveList['isImportant'] == 'Yes'){
                        echo " <span class='label label-danger label-tooltip' data-toggle='tooltip' data-placement='top' title='Important'><i class='fa fa-exclamation-triangle'></i></span>";
                    }
                
                echo "</td>
                    <td class='col-md-4 row-table'>" . $rowActiveList['listDescription'] . "</td>
                    <td class='col-md-1 text-center row-table'>";
                        if($rowActiveList['endDate'] == $dateNow){
                        echo "Today";
                    } else if($rowActiveList['endDate'] == $dateTomorrow){
                        echo "Tomorrow";
                    } else {
                        echo $rowActiveList['endDate'];
                    }
                        echo "</td>";
                
                if($row['packageID'] == 2){
                    echo "<td class='col-md-2 text-center row-table'>" . $projectNameShow . "</td>";
                }
                                
                echo "
                    <td class='col-md-1 text-center row-table'>
                        <div class='btn-group dropup'>
                            <button class='btn btn-primary btn-sm dropdown-toggle' type='button' id='MenuList' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                Menu
                                <span class='caret'></span>
                            </button>
                            <ul class='dropdown-menu dropdown-menu-right' aria-labelledby='MenuList'>
                                <li><a href='#' class='modalEditList' data-editList='" . $rowActiveList['listID'] . "' data-toggle='modal' data-target='#editListModal'><i class='fa fa-edit'></i> Edit</a></li>
                                <li><a href='./server/lists/doneList.php?listID=" . $rowActiveList['listID'];
                                echo "'><i class='fa fa-check-square-o'></i> Done</a></li>
                                <li><a href='./server/lists/deleteList.php?listID=" . $rowActiveList['listID'];
                                echo "'><i class='fa fa-trash'></i> Delete</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>";
                $listNumber++;
        } 
echo "</table>";
mysqli_close($con);
?>