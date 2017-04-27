<?php
    session_start();
    include "./../../../assets/server/connection.php";

    $listID = $_GET['listID'];
    $id = $_SESSION["id"];

    $sqlUser = "SELECT * FROM user WHERE id='$id'";
    $resultSQLUser = mysqli_query($con, $sqlUser);
    $rowUserValue = mysqli_fetch_array($resultSQLUser);

    $sqlListValue = "SELECT * FROM list WHERE id='$id' AND listID='$listID'";
    $result = mysqli_query($con, $sqlListValue);
    $rowListValue = mysqli_fetch_array($result);

    // query project name
    $sqlProject = "SELECT * FROM project WHERE id='$id'";
    $resultSQLProject = mysqli_query($con, $sqlProject);
    
    $resultLoopProject = '';
    while($rowProject = mysqli_fetch_array($resultSQLProject)){

        if($rowProject['projectID'] == $rowListValue['projectID']){
            $selectOption = "selected";
        } else {
            $selectOption = "";
        }

        $resultLoopProject .= "<option value='" . $rowProject['projectID'] . "' " . $selectOption . ">" . $rowProject['projectName'] . "</option>";
    }

    // check package conditon for show on add project function
    if($rowUserValue['packageID'] == 2){
        $projectName = "<div class='form-group'>
                            <label>Project Name:</label>
                            <select class='form-control' name='listProjectName'>
                                <option value='0'>-</option>
                                $resultLoopProject
                            </select>
                        </div>";
    } else {
        $projectName = "";
    }
?>

<form action='./server/lists/editList.php?listID= <?= $listID ?>' method='post'>
            <div class='modal-content'>
            <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                <h4 class='modal-title' id='myModalLabel'>Edit List</h4>
            </div>
            <div class='modal-body'>

            <div class='row'>
                <div class='col-md-10 col-md-push-1'>
                    
                        <div class='form-group'>
                            <label>List Topic:</label>
                            <input class='form-control' name='listTopic' value='<?= $rowListValue['listName'] ?>'>
                        </div>

                        <div class='form-group'>
                            <label>List Description:</label>
                            <textarea rows='4' class='form-control' name='listDescription' value=''><?= $rowListValue['listDescription'] ?></textarea>
                        </div>

                        <div class='row'>
                            <div class='col-md-4'>
                                <div class='form-group'>
                                    <label>End Date:</label>
                                    <input data-provide="datepicker" data-date-format="yyyy-mm-dd" class='form-control dateEdit' name='date' value='<?= $rowListValue['endDate'] ?>'>
                                </div>
                            </div>
                            <div class='col-md-4'>
                                <div class='form-group'>
                                    <label>End Time:</label>
                                    <input class='form-control' type='time' name='endTime' value='<?= $rowListValue['endTime'] ?>'>
                                </div>
                            </div>
                            <div class='col-md-4 important-group'>
                                <div class='form-group'>
                                    <label>Important:</label>
                                    <div class='btn-group' data-toggle='buttons'>
                                        <label class='btn btn-danger <?= $rowListValue['isImportant'] == 'Yes' ?  "active" :  "" ?>'>
                                            <input type='radio' name='listImportant' id='listImportant' value='Yes' <?= $rowListValue['isImportant'] == 'Yes' ?  "checked" :  "" ?>> Yes
                                        </label>
                                        <label class='btn btn-danger <?= $rowListValue['isImportant'] == 'Yes' ?  "" :  "active" ?>'>
                                            <input type='radio' name='listImportant' id='listImportant' value='No' <?= $rowListValue['isImportant'] == 'Yes' ?  "" :  "checked" ?>> No
                                        </label>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <?= $projectName ?>
                </div>
            </div>
            </div>
            <div class='modal-footer'>
                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                <button class='btn btn-primary'>Edit List</button>
            </div>
            </div>
            </form>
<?php
    mysqli_close($con);
?>
