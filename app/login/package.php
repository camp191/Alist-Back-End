<?php
$page = "package";
include "./server/include/header.php";
$sql = "SELECT * FROM user WHERE id='$id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

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
                                <p><strong>Name: </strong> <?=$row["name"] ?></p>
                                <p><strong>Package: </strong> <?=$rowPackage["packageName"]?></p>
                                <p><strong>Exp Date: </strong> <?php echo($row["packageID"] == 0 ? "-" : $row["expDate"]) ?> </p>
                            </div>
                        </div>                        
                    </div>
                    <div class="col-md-push-1 col-md-5">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Payment Information</h3>
                            </div>
                            <div class="panel-body">
                                <p><strong>Name: </strong> <?=$row['namePay']?></p>
                                <p><strong>Card Number: </strong> <?=$row['cardNumber']?></p>
                                <p><strong>CVV: </strong> <?php echo($row['cardNumber'] == '' ? '' : '****') ?></p>
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

                    <?php
                        if (empty($_GET)) {
                            echo "";
                        } else if($_GET["subscribe"] == "done"){
                            echo "<div class='alert alert-success alert-dismissable'>
                                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                    <i class='fa fa-check'></i>  Subscribe Done <3. We wish you happy with Alist.
                                </div>";
                        }

                    ?>

                    <form action="./server/packages/userSubscribe.php" method="post" id="formSubscribe">
                        <div class="col-md-push-3 col-md-6">
                            <div class="form-group">
                                <label>Package:</label>
                                <select class="form-control" name="Package" id="selectPackage">
                                    <option value="1">Basic - 50 Bath/Month</option>
                                    <option value="2">Pro - 80 Bath/Month</option>
                                </select>
                            </div>
                            <hr style="width: 100%; height:2px;" />
                            <p><strong>Basic payment information</strong></p>


                            <div class="form-group">
                                <label>Firstname Lastname:</label>
                                <input class="form-control" name="FSName" value="" id="FLName">
                                <p class="help-block">Example: Thanapat Sorralump</p>
                            </div>
                            <hr style="width: 100%; height:2px;" />

                            <p><strong>Your payment information</strong> <i class="fa fa-cc-visa fa-lg"></i> <i class="fa fa-cc-mastercard fa-lg"></i> <i class="fa fa-cc-amex fa-lg"></i></p>


                            <div class="col-md-8 form-mleft">
                                <div class="form-group">
                                    <label>Card Number:</label>
                                    <input class="form-control" name="CardNumber" value="" id="cardNumber">
                                    <p class="help-block">Example: 1234-5678-9012</p>
                                </div>                            
                            </div>
                            <div class="col-md-4 form-mright">
                                <div class="form-group">
                                    <label>CVV:</label>
                                    <input class="form-control" name="CVV" value="" id="CVV">
                                    <p class="help-block">Example: 1234</p>
                                </div>                            
                            </div>
                            <hr style="width: 100%; height:2px;" />


                            <p><strong>Note: </strong>Please check your information before subscribe package.</p>

                            <div class="text-center">
                                <input type="button" id="submitBtn" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#subModal" value="Subscribe">
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        <!-- Modal -->
        <div class="modal fade" id="subModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close closeSubscribe" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Subscribe Confirm</h4>
            </div>
            <div class="modal-body">
                <!--caution-->
                <span id="formSubmitFail"></span>

                <div id="topicModal">
                    <p><strong>Package: </strong><span id="modalPackage"></span></p>
                    <p><strong>Firstname Lastname: </strong><span id="modalFLName"></span></p>
                    <p><strong>Card Number: </strong><span id="modalCardNumber"></span></p>
                    <p><strong>CVV: </strong><span id="modalCVV"></span></p>
                    <hr style="width: 100%; height:2px;" />
                    <p><strong>Note:</strong> Please check your information before subscribe package. </p>               
                </div>        
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default closeSubscribe" data-dismiss="modal">Close</button>
                <button type="button" id="confirmSubscribe" class="btn btn-primary">Subscribe</button>
            </div>
            </div>
        </div>
        </div>

<?php
include "./server/include/footer.php";
?>
