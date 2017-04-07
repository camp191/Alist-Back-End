<?php
    session_start();
    $id = $_SESSION["id"];

    // timezone
    date_default_timezone_set("Asia/Bangkok");
    
    // include mysql connection
    include "./../assets/server/connection.php";

    // check if not log in
    if(!isset($id)){
        header("Location: ./../index.php");
        exit();
    }

    // variable
    $dateNow = date("Y-m-d", time());
    $dateTomorrow = date('Y-m-d', time() + 86400);
    $countTodayList = 0;
    $alertTodayList = '';

    // query basic info user
    $sql = "SELECT * from user WHERE id='$id'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $nameShow = $row["name"];

    //query list for today
    $sqlTodayList = "SELECT * from list WHERE id='$id' AND endDate='$dateNow' AND isDone='No'";
    $resultTodayList = mysqli_query($con, $sqlTodayList);
    

    // check condition for avatar picture
    if($row['picture'] == ''){
        $picAvatar = "<img class='media-object image'  src='./../assets/images/profileAvatar.png' alt=''>";
    } else {
        $picAvatar = "<img class='media-object image'  src='./upload/images/" . $row['picture'] . "'>";
    }

    // query package that user use
    $sqlPackage = "SELECT * FROM package WHERE packageID='" . $row['packageID'] . "'";
    $resultPackage = mysqli_query($con, $sqlPackage);
    $rowPackage = mysqli_fetch_array($resultPackage);

    // check expire subscribe date
    if($dateNow == $row["expDate"]){
        $sqlUpdateExpire = "UPDATE user SET packageID='0', namePay='', expDate='0000-00-00', cardNumber='' WHERE id='$id'";
        $resultUpdateExpire = mysqli_query($con, $sqlUpdateExpire);

        header("Location: ./index.php?subscribe=expire");
    }

    // check package id for use right function
    // list function
    if($row['packageID'] != '0'){
        $listLink = "<a href='list.php'><i class='fa fa-fw fa-list'></i> List <span class='label label-success'>Basic</span></a>";
    } else {
        $listLink = "<a data-toggle='modal' href='#packageModal'><i class='fa fa-fw fa-list'></i> List <span class='label label-success'>Basic</span></a>";
    }

    // project function
    if($row['packageID'] == '2'){
        $projectLink = "<a href='project.php'><i class='fa fa-fw fa-table'></i> Project <span class='label label-warning'>Pro</span></a>";
    } else {
        $projectLink = "<a data-toggle='modal' href='#packageModal'><i class='fa fa-fw fa-table'></i> Project <span class='label label-warning'>Pro</span></a>";
    }

    // add list function
    if($row['packageID'] != '0'){
        $addListLink = "<a href='#' data-toggle='modal' data-target='#addListModal'><i class='fa fa-plus'></i> List</a>";
    } else {
        $addListLink = "<a href='#' data-toggle='modal' data-target='#packageModal'><i class='fa fa-plus'></i> List</a>";
    }

    // calculate remain time in today
    $datetime = new DateTime('tomorrow');
    $tomorrow = $datetime->format('Y-m-d');
    $timeLeftHours = floor((strtotime($tomorrow) - time())/(60*60));
    $timeLeftMinutes = floor(((strtotime($tomorrow) - time())/60)%60);
    $timeLeftShow = $timeLeftHours . " Hours " . $timeLeftMinutes . " Minutes";

    //loop today function
    while($rowTodayList = mysqli_fetch_array($resultTodayList)){

        if($rowTodayList['isImportant'] == 'Yes'){
            $listImportant = "<span class='label label-danger'>Important</span>";
        } else {
            $listImportant = "";
        }

        $alertTodayList .= "<li class='message-preview'>
                            <a>
                                <div class='media'>
                                    <span>
                                        <span class='alert-padding'>
                                            <h5 class='media-heading'><strong>" . $rowTodayList['listName'] .  "</strong> " . $listImportant .
                                            "</h5>
                                            <p class='small text-muted'><i class='fa fa-clock-o'></i> $timeLeftShow </p>
                                        </span>
                                        <span class='col-xs-12 alert-padding'>
                                            <p>" . $rowTodayList['listDescription'] . "</p>
                                        </span>
                                        <div class='text-center alert-padding'>
                                            <button onclick=location.href='./server/lists/doneList.php?listID=". $rowTodayList['listID'] . "' type='button' class='btn btn-success btn-sm'><i class='fa fa-calendar-check-o'></i> Done</button>
                                            <button type='button' data-editList='" . $rowTodayList['listID'] . "' data-toggle='modal' data-target='#editListModal' class='btn btn-warning btn-sm modalEditList'><i class='fa fa-edit'></i> Edit</button>
                                            <button onclick=location.href='./server/lists/deleteList.php?listID=". $rowTodayList['listID'] . "' type='button' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i> Delete</button>
                                        </div>                      
                                    </span>
                                </div>
                            </a>
                        </li>";
        $countTodayList++;
    }

    // condition for no today list
    if($alertTodayList == ""){
        $alertTodayList = "<li class='message-preview'>
                            <a>
                                <div class='media'>
                                    <span>
                                        All of Today lists are Done.                      
                                    </span>
                                </div>
                            </a>
                        </li>";
    }

    // condition count today list
    if($countTodayList != 0){
        $showCountTodayList = "<span class='label label-danger'>$countTodayList</span>";
    } else {
        $showCountTodayList = "";
    }

    // query project
    $sqlProject = "SELECT * FROM project WHERE id='$id'";
    $resultSQLProject = mysqli_query($con, $sqlProject);

echo "<!DOCTYPE html>
<html lang='en'>

<head>

    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name='description' content=''>
    <meta name='author' content=''>

    <title>Alist | the best todolist in the world</title>
    <!-- icon -->
    <link rel='icon' href='./../assets/images/logo.png'>

    <!-- Bootstrap Core CSS -->
    <link href='css/bootstrap.min.css' rel='stylesheet'>

    <!-- sb-admin CSS -->
    <link href='css/sb-admin.css' rel='stylesheet'>

    <!-- custom CSS -->
    <link href='css/custom/custom.css' rel='stylesheet'>

    <!-- Morris Charts CSS -->
    <link href='css/plugins/morris.css' rel='stylesheet'>

    <!-- Date and Time Plugin CSS -->
    <link href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css
' rel='stylesheet'>

    <!-- Custom Fonts -->
    <link href='font-awesome/css/font-awesome.min.css' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js'></script>
        <script src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js'></script>
    <![endif]-->

</head>

<body>

    <div id='wrapper'>

        <!-- Navigation -->
        <nav class='navbar navbar-inverse navbar-fixed-top' role='navigation'>
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class='navbar-header'>
                <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-ex1-collapse'>
                    <span class='sr-only'>Toggle navigation</span>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                </button>
                <a class='navbar-brand brand-nav' href='index.php'>
                       <span class='spanimg'><img src='./../assets/images/logo.png'></span>
                       <span class='name'> Alist</span>
                </a>
                <p class='navbar-text'>The best todolist in the world</p>
            </div>
            <!-- Top Menu Items -->
            <ul class='nav navbar-right top-nav'>
                <!-- Add list-->
                <li>$addListLink</li>
                <li class='dropdown'>
                    <a href='#' class='dropdown-toggle' data-toggle='dropdown'><i class='fa fa-calendar'></i> Today $showCountTodayList <b class='caret'></b></a>
                    <ul class='dropdown-menu message-dropdown'>
                        $alertTodayList
                        <li class='message-footer'>
                            <a href='./list.php'>See All Active Lists</a>
                        </li>
                    </ul>
                </li>
                <li class='dropdown'>
                    <a href='#' class='dropdown-toggle' data-toggle='dropdown'><i class='fa fa-user'></i> $nameShow <b class='caret'></b></a>
                    <ul class='dropdown-menu'>
                        <li>
                            <a href='./index.php'><i class='fa fa-fw fa-user'></i> Profile</a>
                        </li>
                        <li>
                            <a href='./package.php'><i class='fa fa-fw fa-cubes'></i> Package</a>
                        </li>
                        <li>
                            <a href='./setting.php'><i class='fa fa-fw fa-gear'></i> Settings</a>
                        </li>
                        <li class='divider'></li>
                        <li>
                            <a href='./../assets/server/user/user_logout.php'><i class='fa fa-fw fa-power-off'></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class='collapse navbar-collapse navbar-ex1-collapse'>
                <ul class='nav navbar-nav side-nav'>
                    <li class='mini-profile'>
                        <div class='media'>
                            <span class='media-left pull-left avatar'>";
                                echo $picAvatar . " </span>
                            <div class='media-body content'>
                                <h5 class='media-heading text-muted'><strong>$nameShow</strong></h5>
                                <p class='small text-muted'>Package:";
                                if($rowPackage["packageName"] == 'Not Subscribe'){
                                    echo " <span class='label label-default'>Not Subscribe</span> </p>";
                                } else if ($rowPackage["packageName"] == 'Basic'){
                                    echo " <span class='label label-success'>Basic</span> </p>";
                                } else {
                                    echo " <span class='label label-warning'>Pro</span> </p>";
                                }
                            echo "</div>
                        </div>
                    </li>
                    <li class='"; echo($page == 'home' ? 'active' : ''); echo"'>
                        <a href='index.php'><i class='fa fa-fw fa-home'></i> Home</a>
                    </li>
                    <li class='"; echo($page == 'list' ? 'active' : ''); echo"'>
                        $listLink
                    </li>
                    <li class='"; echo($page == 'project' ? 'active' : ''); echo"'>
                        $projectLink
                    </li>
                    <li class='"; echo($page == 'package' ? 'active' : ''); echo"'>
                        <a href='package.php'><i class='fa fa-fw fa-cubes'></i> Packages and Subscribe</a>
                    </li>
                    <li class='"; echo($page == 'setting' ? 'active' : ''); echo"'>
                        <a href='setting.php'><i class='fa fa-fw fa-gear'></i> Settings</a>
                    </li>
                    <li class='"; echo($page == 'contact' ? 'active' : ''); echo"'>
                        <a href='contact.php'><i class='fa fa-fw fa-envelope'></i> Contact</a>
                    </li>
                    <li class='"; echo($page == 'about' ? 'active' : ''); echo"'>
                        <a href='about.php'><i class='fa fa-fw fa-info'></i> About Alist</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>";
        ?>