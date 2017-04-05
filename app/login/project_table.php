<?php
$page = "project";
include "./server/include/header.php";

$projectID = $_REQUEST['projectID'];
$sqlProjectWithID = "SELECT * FROM project WHERE id='$id' AND projectID='$projectID'";
$resultSQLProjectWithID = mysqli_query($con, $sqlProjectWithID);
$rowProjectWithID = mysqli_fetch_array($resultSQLProjectWithID);

?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Project Detail <small>ตารางรายละเอียดโปรเจค</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="./project.php"><i class="fa fa-table"></i> Project</a>  
                            </li>
                            <li class="active">
                                <i class="fa fa-pencil-square"></i> <?= $rowProjectWithID['projectName']?>
                            </li> 
                        </ol>

                        <h2>Lists Table (Project <?= $rowProjectWithID['projectName']  ?>)
                            <button type='button' data-toggle="modal" data-target="#delProjectModal" class="btn btn-danger"><i class="fa fa-trash"></i> Delete Project</button>
                        </h2>
                    </div>
                </div>
                <!-- /.row -->

                <div class='row'>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

        <!-- Modal DeleteProject -->
        <form action="./server/projects/deleteProject.php" method='post'>
        <div class="modal fade" id="delProjectModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close closeSubscribe" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Subscribe Confirm</h4>
            </div>
            <div class="modal-body">
                <div id="topicModal">
                    <input type='hidden' name='projectID' value='<?= $projectID ?>' />
                    <p>Are you sure to <strong>DELETE</strong> <?= $rowProjectWithID['projectName'] ?> project?</p>               
                </div>        
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default closeSubscribe" data-dismiss="modal">Close</button>
                <button type="submit" id="confirmSubscribe" class="btn btn-danger">Yes,I'm sure</button>
            </div>
            </div>
        </div>
        </div>
        </form> 

<?php
include "./server/include/footer.php";
?>
