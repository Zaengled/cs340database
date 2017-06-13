<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<!--Test change-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ClimbOn - Your climbing location resource!</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link href="css/modal.css" rel="stylesheet">
    <link href="css/loginmodal.css" rel="stylesheet">
    <link href="css/climbOn.css" rel="stylesheet">

    <!-- Moment -->
    <script src="js/moment.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="id01" class="modal">
    <span onclick="document.getElementById('id01').style.display='none'" class="close"
          title="Close Modal">&times;</span>

    <!-- Modal Content -->
    <div class="modal-content animate content">
        <form class="login" action="login.php" method="POST">

            <div class="input-group">
                <input id="name" class="form-control" type="text" placeholder="Username" name="username" required>
            </div>
            <div class="input-group">
                <input id="password" class="form-control" type="password" placeholder="Password" name="password"
                       required>
            </div>
            <div class="input-group">
                <input class="btn" class="form-control" name="submit" type="submit" value="Login">
            </div>
        </form>
    </div>
</div>

<div id="wrapper" class="active">
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul id="sidebar_menu" class="sidebar-nav">
            <li class="sidebar-brand">
                <a id="menu-toggle" href="#">
                    Menu
                    <span id="main_icon" class="glyphicon glyphicon-menu-hamburger"></span>
                </a>
            </li>
        </ul>
        <ul class="sidebar-nav" id="sidebar">
            <li><a href="index.php">Home<span class="sub_icon glyphicon glyphicon-home"</a></li>
            <li><a href="gym_list.php">Gym<span class="sub_icon glyphicon glyphicon-map-marker"></span></a></li>
            <li><a href="site_list.php">Outdoor<span class="sub_icon glyphicon glyphicon-leaf"></span></a></li>
            <li><a href="store_list.php">Store<span class="sub_icon glyphicon glyphicon-shopping-cart"></span></a></li>
            <li><a href="about.php">About<span class="sub_icon glyphicon glyphicon-info-sign"></span></a></li>
        </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid page-content inset">
            <div class="content-header">
                <h1>Climb On</h1>
                <?php
                if ($_SESSION["valid"] == true) {
                    echo " Logged in as: " . $_SESSION["userName"];
                }
                ?>
                <div style="float:right">
                    <a class="btn"
                        <?php
                        if ($_SESSION["valid"] == false) {
                            echo "onclick=\"document.getElementById('id01').style.display='block'\">";
                            echo "Login <span class=\"glyphicon glyphicon-log-in\"</span>";
                        } else {
                            echo "href='logout.php>'";
                            echo "Logout <span class=\"glyphicon glyphicon-log-out\"</span>";
                        }
                        ?>

                    </a>
                </div>
            </div>