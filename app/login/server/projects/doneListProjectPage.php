<?php
    session_start();
    include "./../../../assets/server/connection.php";

    // timezone
    date_default_timezone_set("Asia/Bangkok");
    $projectID = $_REQUEST['projectID'];
    $id = $_SESSION['id'];

    $sqlDoneList = "SELECT * FROM list WHERE id='$id' AND isDone='Yes' AND projectID='$projectID'";
    $resultDoneList = mysqli_query($con, $sqlDoneList);
?>

<table class='table table-hover'>
    <!-- head table-->
    <tr>
        <th class='text-center row-table'>List NO.</th>
        <th class='text-center row-table'>List Name</th>
        <th class='text-center row-table'>List Description</th>
        <th class='text-center row-table'>End Date</th>
        <th class='text-center row-table'>Done Date</th>        
        <th class='text-center row-table'>Control</th>
    </tr>
    <?php
        $listNumber = 1;

        while($rowDoneList = mysqli_fetch_array($resultDoneList)){

                echo "<tr>
                    <td class='col-md-1 text-center row-table'> $listNumber </td>
                    <td class='col-md-2 row-table'>" . $rowDoneList['listName']; 
                    
                    if($rowDoneList['isImportant'] == 'Yes'){
                        echo " <span class='label label-danger label-tooltip' data-toggle='tooltip' data-placement='top' title='Important'><i class='fa fa-exclamation-triangle'></i></span>";
                    }
                
                echo "</td>
                    <td class='col-md-4 row-table'>" . $rowDoneList['listDescription'] . "</td>
                    <td class='col-md-1 text-center row-table'>" . $rowDoneList['endDate'];

                echo "</td>
                    <td class='col-md-1 text-center row-table'>" . $rowDoneList['doneDate'] . "</td>";
                                                                    
                echo "
                <td class='text-center col-md-1 row-table'><a class='btn btn-danger' href='./server/projects/deleteListProject.php?listID=" . $rowDoneList['listID'] . "&projectID=" . $projectID .
                    "'><i class='fa fa-trash'></i> Delete</a></td>
                
                </tr>";
                $listNumber++;
        }
        mysqli_close($con);
        ?> 
</table>
