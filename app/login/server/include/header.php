<?php
    session_start();
    $name = $_SESSION["name"];
    $id = $_SESSION["id"];
    
    include "./../assets/server/connection.php";

    if(!isset($name)){
        header("Location: ./../index.php");
        exit();
    }

    $sql = "SELECT * from user WHERE id='$id'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $nameShow = $row["name"];

    if($row['picture'] == ''){
        $picAvatar = "<img class='media-object image'  src='./../assets/images/profileAvatar.png' alt=''>";
    } else {
        $picAvatar = "<img class='media-object image'  src='./upload/images/" . $row['picture'] . "'>";
    }

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
                <li><a href='#' data-toggle='modal' data-target='#myModal'><i class='fa fa-plus'></i> List</a></li>
                <li class='dropdown'>
                    <a href='#' class='dropdown-toggle' data-toggle='dropdown'><i class='fa fa-calendar'></i> Today <span class='label label-danger'>10</span> <b class='caret'></b></a>
                    <ul class='dropdown-menu message-dropdown'>
                        <li class='message-preview'>
                            <a href='#'>
                                <div class='media'>
                                    <span class='pull-left'>
                                        <img class='media-object' src='http://placehold.it/50x50' alt=''>
                                    </span>
                                    <div class='media-body'>
                                        <h5 class='media-heading'><strong>John Smith</strong>
                                        </h5>
                                        <p class='small text-muted'><i class='fa fa-clock-o'></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class='message-preview'>
                            <a href='#'>
                                <div class='media'>
                                    <span class='pull-left'>
                                        <img class='media-object' src='http://placehold.it/50x50' alt=''>
                                    </span>
                                    <div class='media-body'>
                                        <h5 class='media-heading'><strong>John Smith</strong>
                                        </h5>
                                        <p class='small text-muted'><i class='fa fa-clock-o'></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class='message-preview'>
                            <a href='#'>
                                <div class='media'>
                                    <span class='pull-left'>
                                        <img class='media-object' src='http://placehold.it/50x50' alt=''>
                                    </span>
                                    <div class='media-body'>
                                        <h5 class='media-heading'><strong>John Smith</strong>
                                        </h5>
                                        <p class='small text-muted'><i class='fa fa-clock-o'></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class='message-footer'>
                            <a href='#'>Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <!--<li class='dropdown'>
                    <a href='#' class='dropdown-toggle' data-toggle='dropdown'><i class='fa fa-bell'></i> Today <span class='label label-danger'>10</span> <b class='caret'></b></a>
                    <ul class='dropdown-menu alert-dropdown'>
                        <li>
                            <a href='#'>Alert Name <span class='label label-default'>Alert Badge</span></a>
                        </li>
                        <li>
                            <a href='#'>Alert Name <span class='label label-primary'>Alert Badge</span></a>
                        </li>
                        <li>
                            <a href='#'>Alert Name <span class='label label-success'>Alert Badge</span></a>
                        </li>
                        <li>
                            <a href='#'>Alert Name <span class='label label-info'>Alert Badge</span></a>
                        </li>
                        <li>
                            <a href='#'>Alert Name <span class='label label-warning'>Alert Badge</span></a>
                        </li>
                        <li>
                            <a href='#'>Alert Name <span class='label label-danger'>Alert Badge</span></a>
                        </li>
                        <li class='divider'></li>
                        <li>
                            <a href='#'>View All</a>
                        </li>
                    </ul>
                </li>-->
                <li class='dropdown'>
                    <a href='#' class='dropdown-toggle' data-toggle='dropdown'><i class='fa fa-user'></i> $nameShow <b class='caret'></b></a>
                    <ul class='dropdown-menu'>
                        <li>
                            <a href='#'><i class='fa fa-fw fa-user'></i> Profile</a>
                        </li>
                        <li>
                            <a href='#'><i class='fa fa-fw fa-cubes'></i> Package</a>
                        </li>
                        <li>
                            <a href='#'><i class='fa fa-fw fa-gear'></i> Settings</a>
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
                                <p class='small text-muted'>Package: <span class='label label-default'>Not Subscribe</span> </p>
                            </div>
                        </div>
                    </li>
                    <li class='"; echo($page == 'home' ? 'active' : ''); echo"'>
                        <a href='index.php'><i class='fa fa-fw fa-home'></i> Home</a>
                    </li>
                    <li class='"; echo($page == 'list' ? 'active' : ''); echo"'>
                        <a href='list.php'><i class='fa fa-fw fa-list'></i> List <span class='label label-success'>Basic</span></a>
                    </li>
                    <li class='"; echo($page == 'project' ? 'active' : ''); echo"'>
                        <a href='project.php'><i class='fa fa-fw fa-table'></i> Project <span class='label label-warning'>Pro</span></a>
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