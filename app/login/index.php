<?php
$page = "home";
include "./server/include/header.php";
?>
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Hello, <?php echo $nameShow ?>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <?php 
            if($row['packageID'] == 0){
                echo "<div class='row'>
                        <div class='col-lg-12'>
                            <div class='alert alert-warning alert-dismissable'>
                                <button type='button'' class='close'' data-dismiss='alert'' aria-hidden='true'>&times;</button>
                                <i class='fa fa-info-circle'></i>  ตอนนี้คุณยังไม่ได้สมัครแพคเกจ คุณสามารถ <a href='./package.php'' class='alert-link'>คลิกที่นี่</a> เพื่อสมัครได้เลย :D
                            </div>
                        </div>
                    </div>";
            }
        ?>
        
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
<?php
include "./server/include/loopProject.php";
include "./server/include/footer.php";
?>