<?php
$page = "project";
include "./server/include/header.php";
?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Add Project <small>เพิ่มโปรเจค</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="./project.php"><i class="fa fa-table"></i> Project</a>  
                            </li>
                            <li class="active">
                                <i class="fa fa-plus"></i>  Add Project
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <form action="./server/projects/addProject.php" method="post">
                    <div class="row">
                        <div class="col-md-8 col-md-push-2">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">1. Add Project Detail</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-10 col-md-push-1">
                                        <div class="form-group">
                                            <label>Topic:</label>
                                            <input class="form-control" id="topicProject" name="topicProject" value="">
                                        </div>

                                        <div class="form-group">
                                            <label>Project Type:</label>
                                            <select class="form-control" id="typeProject" name="typeProject">
                                                <option value="personal" selected="selected">Personal</option>
                                                <option value="work">Work</option>
                                                <option value="travel">Travel</option>
                                                <option value="other">Other</option>
                                            </select>          
                                        </div> 

                                        <div class="form-group">
                                            <label>Description:</label>
                                            <textarea class="form-control" id="descriptionProject" rows="3" name="descriptionProject" value=""></textarea>
                                        </div>                                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-md-8 col-md-push-2">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">2. Add List (Optional)</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-10 col-md-push-1">
                                        <div class="form-group">
                                            <label>Template:</label>
                                            <select class="form-control" id="templateList" name="templateList">
                                                <option value="no">No Template</option>
                                                <option value="travel">Travel</option>
                                            </select>          
                                        </div>
                                        <h4>Add List <button type="button" id="add-list" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Add</button></h4>

                                        <div class="template-project">
                                        </div><!--- list-template -->

                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-md-8 col-md-push-2">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">3. Confirm</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-10 col-md-push-1 text-center">
                                        <button type="button" id="resetAddProject" class="btn btn-default">Reset Form</button>
                                        <button type="submit" class="btn btn-primary">Confirm</button>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </form>


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


<?php
include "./server/include/footer.php";
?>
