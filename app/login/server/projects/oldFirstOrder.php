<?php
session_start();
include "./../../../assets/server/connection.php";
$id = $_SESSION['id'];

// query project
$sqlProject = "SELECT * FROM project WHERE id='$id' ORDER BY projectID";
$resultSQLProject = mysqli_query($con, $sqlProject);


?>


<div class='row'>
<?php
    // variable for add list
    $resultLoopProject = '';
    // loop project
    while($rowProject = mysqli_fetch_array($resultSQLProject)){
        // color panel
        if($rowProject['projectType'] == 'personal'){
            $colorPanel = 'primary';
            $iconPanel = 'fa-male';
        } else if ($rowProject['projectType'] == 'work'){
            $colorPanel = 'red';
            $iconPanel = 'fa-briefcase';
        } else if ($rowProject['projectType'] == 'travel'){
            $colorPanel = 'green';
            $iconPanel = 'fa-plane';
        } else if ($rowProject['projectType'] == 'other'){
            $colorPanel = 'yellow';
            $iconPanel = 'fa-ellipsis-h';
        }

        echo "
            <div class='col-md-4 col-sm-6'>
            <form action='./project_table.php' method='get'>
                <div class='panel panel-$colorPanel'>
                    <div class='panel-heading box'>
                        <div class='row'>
                            <div class='col-xs-2'>
                                <i class='fa $iconPanel fa-3x'></i>
                            </div>
                            <div class='col-xs-10 text-right'>
                                <div><h4><b>" . $rowProject['projectName'] . "</b></h4></div>
                                <div>" . $rowProject['projectDescription'] . "</div>
                            </div>
                        </div>
                    </div>
                    
                    <a href='#' onclick='this.parentNode.parentNode.submit()'>
                        <input type='hidden' name='projectID' value='" . $rowProject['projectID'] . "' />
                        <div class='panel-footer'>
                            <span class='pull-left'>View Details</span>
                            <span class='pull-right'><i class='fa fa-arrow-circle-right'></i></span>
                            <div class='clearfix'></div>
                        </div>
                    </a>
                    
                </div>
            </form>
            </div>";
            
            // loop for option in addlist
            $resultLoopProject .= "<option value='" . $rowProject['projectID'] . "'>" . $rowProject['projectName'] . "</option>";

    }
?>
</div>
