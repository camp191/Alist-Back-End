<?php
$page = "contact";
include "./server/include/header.php";
?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Contact Alist
                            <small>ติดต่อ Alist</small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

                <!-- Contact Panel -->
                <div class="row">
                    <div class="col-md-8 col-md-push-2">

                        <?php
                            if (empty($_GET)) {
                                echo "";
                            } else if($_GET["contact"] == "done"){
                                echo "<div class='alert alert-success alert-dismissable'>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                        <i class='fa fa-check'></i>  ข้อมูลการติดต่อได้ถูกบันทึกเรียบร้อยแล้ว
                                    </div>";
                            } else if($_GET["contact"] == "fail"){
                                echo "<div class='alert alert-danger alert-dismissable'>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                        <i class='fa fa-exclamation'></i>  พบความผิดพลาดในการบันทึกกรุณาส่งใหม่อีกครั้ง
                                    </div>";                                
                            } else if($_GET["contact"] == "notfull"){
                                echo "<div class='alert alert-danger alert-dismissable'>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                        <i class='fa fa-exclamation'></i>  กรุณากรอกข้อมูลให้ครบทุกช่องก่อนส่งข้อมูล
                                    </div>";                                
                                
                            }

                        ?>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Contact Form</h3>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-10 col-md-push-1">
                                    <form action="./server/contact/createContact.php" method="post">
                                        <div class="form-group">
                                            <label>Topic:</label>
                                            <input class="form-control" id="topicContact" name="topicContact" value="">
                                        </div>
                                        <div class="form-group">
                                            <label>Message Type:</label>
                                            <select class="form-control" id="typeContact" name="typeContact">
                                                <option>General</option>
                                                <option>Bug and Issue</option>
                                                <option>Subscribe Problem</option>
                                                <option>Suggestion</option>
                                                <option>Other</option>
                                            </select>          
                                        </div> 
                                        <div class="form-group">
                                            <label>Message:</label>
                                            <textarea id="messageContact" class="form-control" rows="8" name="messageContact" value=""></textarea>
                                        </div>                                                    
                                        <div class="col-lg-12 text-center btn-contact">
                                            <input type="button" id="resetBtn" class="btn btn-default" value="Reset Form">
                                            <button class="btn btn-primary">Send Message</button>
                                        </div>
                                    </form>
                                </div>
                                                               
                            </div>
                        </div>                          
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php
include "./server/include/footer.php";
?>
