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

                <div class="row">
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


<?php
include "./server/include/footer.php";
?>
