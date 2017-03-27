<?php
$page = "setting";
include "./server/include/header.php";
$sql = "SELECT * from user WHERE id='$id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Update Account Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Account Settings
                            <small>ตั้งค่าต่างๆข้อมูล Account</small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <form action="">
                    <div class="col-md-6">
                        <div class="text-center">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Picture Preview</h3>
                                </div>
                                <div class="panel-body">
                                    <img src="./../assets/images/profileAvatar.png" id="previewImg" height="150px" accept="image/gif, image/jpeg, image/png">
                                </div>
                            </div>
                            <div class="text-center btn btn-default file-upload">
                                <span>Upload Picture</span>
                                <input type="file" onchange="previewFile()" class="upload">
                            </div>                           
                            
                        </div>
                    </div>
                    <div class="col-md-6">

                            <div class="form-group">
                                <label for="disabledSelect">Email:</label>
                                <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input" disabled>
                            </div>

                            <div class="form-group">
                                <label>Name-Surname:</label>
                                <input class="form-control">
                                <p class="help-block">Example: Thanapat Sorralump</p>
                            </div>

                            <div class="form-group">
                                <label>Sex:</label>
                                <select class="form-control">
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>


                             <div class="form-group">
                                <label>Job:</label>
                                <input class="form-control">
                                <p class="help-block">Example: Student, Teacher, Engineer etc.</p>
                            </div>                           

                            <div class="form-group">
                                <label>Birthdate:</label>
                                <input class="form-control" id="date" name="date">
                                <p class="help-block">Example: yyyy/mm/dd Format</p>
                            </div>


                    </div>
                    <div class="col-lg-12 text-center btn-update">
                        <button class="btn btn-primary btn-lg">Update Your Profile </button>
                    </div>
                    </form>
                </div>


                <!-- Update Password Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Password Setting
                            <small>เปลี่ยนแปลงรหัสผ่าน</small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                
                <div class="row">
                    <form action="">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Current Password:</label>
                                <input class="form-control" type="password">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>New Password:</label>
                                <input class="form-control" type="password">
                            </div>                        
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Confirm New Password:</label>
                                <input class="form-control" type="password">
                            </div>                        
                        </div>

                       <div class="col-lg-3 text-center">
                            <button class="btn btn-primary btn-lg btn-update">Update Password</button>
                        </div>
                    </form>
                    
                </div>
                <!-- row -->

                <!-- Delete Account -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Delete Account
                            <small>ลบบัญชี</small>
                        </h1>
                    </div>
                </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h4>Once you delete your account, there is no going back. Please be certain.</h4>
                            <button class="btn btn-danger btn-lg btn-update">Delete Your Account</button>
                        </div>
                    </div>
                <!-- /.row -->


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php
include "./server/include/footer.php";
?>


