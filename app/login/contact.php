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
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Contact Form</h3>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-10 col-md-push-1">
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label>Topic:</label>
                                            <input class="form-control" name="topicContact" value="">
                                        </div>
                                        <div class="form-group">
                                            <label>Message Type:</label>
                                            <select class="form-control" name="messageType">
                                                <option>General</option>
                                                <option>Bug and Issue</option>
                                                <option>Subscribe Problem</option>
                                                <option>Suggest</option>
                                                <option>Other</option>
                                            </select>          
                                        </div> 
                                        <div class="form-group">
                                            <label>Message:</label>
                                            <textarea class="form-control" rows="8" name="messageContact" value=""></textarea>
                                        </div>                                                    
                                        <div class="col-lg-12 text-center btn-contact">
                                            <input type="button" class="btn btn-default" value="Reset Form">
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
