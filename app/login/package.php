<?php
$page = "package";
include "./server/include/header.php";
?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Subscribe Status
                            <small> สถานะการใช้งาน</small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-md-push-1 col-md-5">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Subscribe Status</h3>
                            </div>
                            <div class="panel-body">
                                <p><strong>Name: </strong> Thanapat Sorralump</p>
                                <p><strong>Package: </strong> Not Subscribe</p>
                                <p><strong>Exp Date: </strong> 2017-06-01</p>
                            </div>
                        </div>                        
                    </div>
                    <div class="col-md-push-1 col-md-5">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Payment Information</h3>
                            </div>
                            <div class="panel-body">
                                <p><strong>Name: </strong> Thanapat Sorralump</p>
                                <p><strong>Card Number: </strong> 1234-5678-9012</p>
                                <p><strong>CVV: </strong> * * * *</p>
                            </div>
                        </div>                    
                    </div>
                </div>

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Subscribe Package
                            <small> เลือกใช้งานแพคเกจ</small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                
                <div class="row">
                    <form action="">
                        <div class="col-md-push-3 col-md-6">
                            <div class="form-group">
                                <label>Package:</label>
                                <select class="form-control" name="Package">
                                    <option>Basic - 50 Bath/Month</option>
                                    <option>Pro - 80 Bath/Month</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Firstname Lastname:</label>
                                <input class="form-control" name="FSName" value="">
                                <p class="help-block">Example: Thanapat Sorralump</p>
                            </div>

                            <div class="col-md-8 form-mleft">
                                <div class="form-group">
                                    <label>Card Number:</label>
                                    <input class="form-control" name="CardName" value="">
                                    <p class="help-block">Example: 1234-5678-9012</p>
                                </div>                            
                            </div>
                            <div class="col-md-4 form-mright">
                                <div class="form-group">
                                    <label>CVV:</label>
                                    <input class="form-control" name="CVV" value="">
                                    <p class="help-block">Example: 1234</p>
                                </div>                            
                            </div>
                            <hr style="width: 100%; height:2px;" />


                            <p><strong>Note: </strong>Please check your information before subscribe package.</p>

                            <div class="text-center">
                                <button class="btn btn-primary btn-lg">Subscribe</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php
include "./server/include/footer.php";
?>
