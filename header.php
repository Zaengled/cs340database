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

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script>
        function openModal(id, data) {
            console.log(id, data);
            var modal = $('#' + id);
            if (modal) {
                modal.css('display','block');
                var keys = Object.keys(data);
                for (var i = 0; i < keys.length; i++) {
                    $('#' + id + '_' + keys[i]).html(data[keys[i]]);
                }
            }
        }
    </script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="id01" class="modal">
    <!-- Modal Content -->
    <div class="modal-content animate content">
        <span class="close" title="Close Modal">x</span>

        <form class="login" action="login.php" method="POST">
            <div class="form-group">
                <input id="name" class="form-control" type="text" placeholder="Username" name="username" required>
            </div>
            <div class="form-group">
                <input id="password" class="form-control" type="password" placeholder="Password" name="password"
                       required>
            </div>
            <div class="form-group">
                <input class="btn btn-block btn-primary" class="form-control" name="submit" type="submit" value="Login">
            </div>
            <div class="form-group">
                <button class="btn btn-block btn-link" class="form-control">
                    Don't have an account? Register
                </button>
            </div>
        </form>
    </div>
</div>

<div id="wrapper" class="active">
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul id="sidebar" class="sidebar-nav">
            <li class="sidebar-brand">
                <a id="menu-toggle" href="#">
                    Menu
                    <span id="main_icon" class="glyphicon glyphicon-menu-hamburger"></span>
                </a>
            </li>
            <li><a href="index.php">Home<span class="sub_icon glyphicon glyphicon-home"></span></a></li>
            <li><a href="gym_list.php">Gym<span class="sub_icon glyphicon glyphicon-map-marker"></span></a></li>
            <li><a href="site_list.php">Outdoor<span class="sub_icon glyphicon glyphicon-leaf"></span></a></li>
            <li><a href="store_list.php">Store<span class="sub_icon glyphicon glyphicon-shopping-cart"></span></a></li>
            <li><a href="about.php">About<span class="sub_icon glyphicon glyphicon-info-sign"></span></a></li>
            <?php if($_SESSION['admin']) {
               echo '<li ><a href = "admin_list.php" > Admin<span class="sub_icon glyphicon glyphicon-cog" ></span ></a ></li>';
            }
            ?>
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
                    <a class="btn btn-default" role="button"
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