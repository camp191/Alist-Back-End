<?php
$page = "project";
include "./server/include/header.php";

$projectID = $_REQUEST['projectID'];
$sqlProjectWithID = "SELECT * FROM project WHERE id='$id' AND projectID='$projectID'";
$resultSQLProjectWithID = mysqli_query($con, $sqlProjectWithID);
$rowProjectWithID = mysqli_fetch_array($resultSQLProjectWithID);

$sqlActiveList = "SELECT * FROM list WHERE id='$id' AND isDone='No' AND projectID='$projectID'";
$resultActiveList = mysqli_query($con, $sqlActiveList);

if ($_GET['projectID'] === $projectID && !isset($_GET['edit'])){
    $editDone = "";
} else if($_GET['projectID']=== $projectID && $_GET['edit'] == 'done'){
    $editDone = "<div class='alert alert-success alert-dismissable'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            <i class='fa fa-check'></i>  Your Process is Done
        </div>";
}

// icon type top
if($rowProjectWithID['projectType'] == 'personal'){
    $iconPanel = 'fa-male';
} else if ($rowProjectWithID['projectType'] == 'work'){
    $iconPanel = 'fa-briefcase';
} else if ($rowProjectWithID['projectType'] == 'travel'){
    $iconPanel = 'fa-plane';
} else if ($rowProjectWithID['projectType'] == 'other'){
    $iconPanel = 'fa-ellipsis-h';
}

?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">

                        <h2 class="page-header"><i class="fa <?= $iconPanel ?>"></i> Project <?= $rowProjectWithID['projectName']  ?>
                            <button type='button' data-toggle="modal" data-target="#editProjectModal" class="btn btn-success"><i class="fa fa-edit"></i> Edit Project</button>
                            <button type='button' data-toggle="modal" data-target="#delProjectModal" class="btn btn-danger"><i class="fa fa-trash"></i> Delete Project</button>
                        </h2>

                        <?= $editDone ?>

                        <ol class="breadcrumb">
                            <li>
                                <a href="./project.php"><i class="fa fa-table"></i> Project</a>  
                            </li>
                            <li class="active">
                                <i class="fa fa-pencil-square"></i> <?= $rowProjectWithID['projectName']?>
                            </li> 
                        </ol>

                        <blockquote>
                            <p class="lead"><?= $rowProjectWithID['projectDescription']?></p>
                        </blockquote>


                    </div>
                </div>
                <!-- /.row -->

                <div class='row'>
                    <div class="col-lg-12">
                        <ul class="nav nav-pills nav-justified">
                            <li id="active-table" data-projectID="<?= $projectID ?>" class='active nav-pointer'><a>Active List</a></li>
                            <li id='done-table' data-projectID="<?= $projectID ?>" class="nav-pointer"><a>Done List</a></li>
                        </ul>
                    </div>
                    

                    <div class="col-lg-12">
                    <div class='change-table table-margin'>
                    <!-- Table List -->
                    <table class='table table-hover'>
                        <!-- head table-->
                        <tr>
                            <th class='text-center row-table'>List NO.</th>
                            <th class='text-center row-table'>List Name</th>
                            <th class='text-center row-table'>List Description</th>
                            <th class='text-center row-table'>End Date</th>
                            <th class='text-center row-table'>End Time</th>
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

                                    echo "<td class='col-md-1 row-table text-center'>";
                                        if ( ($rowActiveList['endTime'] < $timeNow) && ($rowActiveList['endDate'] <= $dateNow) ) {
                                            echo "Time Out";
                                        } else {
                                            echo $rowActiveList['endTime'];
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
                            ?> 
                    </table>

                    </div><!-- ChangeTable -->
                    
                    
                    </div>


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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Delete Project Confirm</h4>
            </div>
            <div class="modal-body">
                <div id="topicModal">
                    <input type='hidden' name='projectID' value='<?= $projectID ?>' />
                    <p>Are you sure to <strong>DELETE</strong> <?= $rowProjectWithID['projectName'] ?> project and their lists?</p>               
                </div>        
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Yes,I'm sure</button>
            </div>
            </div>
        </div>
        </div>
        </form> 

        <!-- Modal Edit Project -->
        <form action="./server/projects/editProject.php" method='post'>
        <div class="modal fade" id="editProjectModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Project</h4>
            </div>
            <div class="modal-body">
            <div class="row">
                <div class='col-md-10 col-md-push-1'>
                    <div id="topicModal">
                        <input type='hidden' name='projectID' value='<?= $projectID ?>' />
                        <div class='form-group'>
                            <label>List Topic:</label>
                            <input class='form-control' name='projectName' value='<?= $rowProjectWithID['projectName'] ?>'>
                        </div>

                        <div class="form-group">
                            <label>Project Type:</label>
                            <select class="form-control" id="projectType" name="projectType">
                                <option value="personal" <?= $rowProjectWithID['projectType'] == 'personal' ? 'selected' : '' ?>>Personal</option>
                                <option value="work" <?= $rowProjectWithID['projectType'] == 'work' ? 'selected' : '' ?>>Work</option>
                                <option value="travel" <?= $rowProjectWithID['projectType'] == 'travel' ? 'selected' : '' ?>>Travel</option>
                                <option value="other" <?= $rowProjectWithID['projectType'] == 'other' ? 'selected' : '' ?>>Other</option>
                            </select>          
                        </div> 

                        <div class='form-group'>
                            <label>List Description:</label>
                            <textarea rows='4' class='form-control' name='projectDescription'><?= $rowProjectWithID['projectDescription'] ?></textarea>
                        </div>
                    </div>
                </div> 
            </div>       
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Edit Project</button>
            </div>
            </div>
        </div>
        </div>
        </form> 

<?php
include "./server/include/loopProject.php";
include "./server/include/footer.php";
?>
