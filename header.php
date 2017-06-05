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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php
    include 'connect.php';
    if (!$mysqli) {
        die('Could not connect: ' . mysqli_error());
    }
    $sql1 = "SELECT * FROM `GymAndLocation` WHERE City = 'Corvallis' ";
    $sql2 = "SELECT * FROM `SiteAndLocation` WHERE City = 'Corvallis' ";
    $sql3 = "SELECT * FROM `StoreAndLocation` WHERE City = 'Corvallis' ";
    $result1 = mysqli_query($mysqli, $sql1);
    $result2 = mysqli_query($mysqli, $sql2);
    $result3 = mysqli_query($mysqli, $sql3);
    ?>
</head>

<body>

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
            <li><a href="#">Login<span class="sub_icon glyphicon glyphicon-log-in"></span></a></li>
            <li><a href="gyms.php">Gym<span class="sub_icon glyphicon glyphicon-map-marker"></span></a></li>
            <li><a href="#">Outdoor<span class="sub_icon glyphicon glyphicon-leaf"></span></a></li>
            <li><a href="#">Store<span class="sub_icon glyphicon glyphicon-shopping-cart"></span></a></li>
            <li><a href="#">About<span class="sub_icon glyphicon glyphicon-info-sign"></span></a></li>
        </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid page-content inset">