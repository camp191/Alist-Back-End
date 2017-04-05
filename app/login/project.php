<?php
$page = "project";
include "./server/include/header.php";

// check get process project
if (empty($_GET)) {
    $projectProcessDone = "";
} else if($_GET["process"] == "projectDone"){
    $projectProcessDone = "<div class='alert alert-success alert-dismissable'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            <i class='fa fa-check'></i>  Add Project Done
        </div>";
} else if($_GET["process"] == "projectListDone"){
    $projectProcessDone = "<div class='alert alert-success alert-dismissable'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            <i class='fa fa-check'></i>  Add Project and List Done
        </div>";
}


?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Project <small>โปรเจค</small>
                            <a href="./add_project.php" class="btn btn-primary"><i class="fa fa-plus"></i> Add Project</a>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-table"></i>  Project
                            </li>
                        </ol>
                       <?= $projectProcessDone ?>
                    </div>
                </div>
                <!-- /.row -->

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
                            <form action='./project_table.php' method='post'>
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
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


<?php
include "./server/include/footer.php";
?>
