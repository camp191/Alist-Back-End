<?php
$page = "list";
include "./server/include/header.php";
?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            List <small>รายการสิ่งที่ต้องทำ</small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <ul class="nav nav-pills nav-justified">
                            <li class="active"><a href="#">Active List</a></li>
                            <li><a href="#">Done List</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php
include "./server/include/footer.php";
?>
