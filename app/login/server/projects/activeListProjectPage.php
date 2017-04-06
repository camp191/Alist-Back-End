<?php
    session_start();
    include "./../../../assets/server/connection.php";

    // timezone
    date_default_timezone_set("Asia/Bangkok");

    $projectID = $_REQUEST['projectID'];
    $id = $_SESSION['id'];
    $dateNow = date("Y-m-d", time());
    $dateTomorrow = date('Y-m-d', time() + 86400);

    $sqlActiveList = "SELECT * FROM list WHERE id='$id' AND isDone='No' AND projectID='$projectID'";
    $resultActiveList = mysqli_query($con, $sqlActiveList);
?>

<!-- Table List -->
<table class='table table-hover'>
    <!-- head table-->
    <tr>
        <th class='text-center row-table'>List NO.</th>
        <th class='text-center row-table'>List Name</th>
        <th class='text-center row-table'>List Description</th>
        <th class='text-center row-table'>End Date</th>
        <th class='text-center row-table'>Control</th>
    </tr>
    <?php
        $listNumber = 1;

        while($rowActiveList = mysqli_fetch_array($resultActiveList)){

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
                                                                    
                echo "
                    <td class='col-md-1 text-center row-table'>
                        <div class='btn-group dropup'>
                            <button class='btn btn-primary btn-sm dropdown-toggle' type='button' id='MenuList' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                Menu
                                <span class='caret'></span>
                            </button>
                            <ul class='dropdown-menu dropdown-menu-right' aria-labelledby='MenuList'>
                                <li><a href='#' class='modalEditList' data-editList='" . $rowActiveList['listID'] . "' data-toggle='modal' data-target='#editListModal'><i class='fa fa-edit'></i> Edit</a></li>
                                <li><a href='./server/projects/doneListProject.php?listID=" . $rowActiveList['listID'] . "&projectID=" . $projectID;
                                echo "'><i class='fa fa-check-square-o'></i> Done</a></li>
                                <li><a href='./server/projects/deleteListProject.php?listID=" . $rowActiveList['listID'] . "&projectID=" . $projectID;
                                echo "'><i class='fa fa-trash'></i> Delete</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>";
                $listNumber++;
        }
        mysqli_close($con);
        ?> 
</table>
