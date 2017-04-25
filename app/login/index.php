<?php
$page = "home";
include "./server/include/header.php";

//query list for today
$sqlTodayRemindList = "SELECT * from list WHERE id='$id' AND endDate='$dateNow' AND isDone='No'";
$resultTodayRemindList = mysqli_query($con, $sqlTodayRemindList);

$alertRemindList = '';
// reminder
while($rowReminder = mysqli_fetch_array($resultTodayRemindList)){
    if($rowReminder['isImportant'] == 'Yes'){
        $listImportant = "<span class='label label-danger'>Important</span>";
    } else {
        $listImportant = "";
    }
    $alertRemindList .= "<button type='button' class='list-group-item'>" . $rowReminder['listName'] . " " . $listImportant . "</button>";
}

    // condition for no today list
    if($alertRemindList == ""){
        $alertRemindList = "<p class='text-center textPanel-done'>All of today lists are done.</p>";
    }


?>
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Welcome <?php echo $nameShow ?>
                </h1>
            </div>
        </div>
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
        <div class="row">
            <div class="col-lg-5 col-lg-push-1">
                <div class="panel panel-default box">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-clock-o"></i> Date and Clock</h3>
                    </div> 
                    <div class="panel-body">   
                        <p id='clock' class="clock-style text-center"><span class="clockText-hidden">A</span></p>
                        <p id='dateNow' class="date-style text-center"></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-lg-push-1">
                <div class="panel panel-default box">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-list-alt"></i> Today Lists Reminder</h3>
                    </div>  
                    <div class="panel-body">
                        <div class="list-group">
                            <?= $alertRemindList ?>
                        </div>
                        <div class="text-right">
                            <a href="./list.php">View All Lists <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>   
                </div>
            </div>
        </div>

        
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<script>
        var myVar = setInterval(function() {
    myTimer();
    }, 1000);

    function myTimer() {
    var d = new Date();
    document.getElementById("clock").innerText = d.toLocaleTimeString();
    }
</script>

<?php
include "./server/include/loopProject.php";
include "./server/include/footer.php";
?>