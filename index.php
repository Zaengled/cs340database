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

    <div id="wrapper" class="toggled">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <h4 class="sidebar-brand">
                    Climb On!
                    <span class="glyphicon glyphicon-menu-hamburger"></span>
                </h4>
                <li>g
                    <a href="#">Login</a>
                </li>
                <li>
                    <a href="gyms.php">Gym</a>
                </li>
                <li>
                    <a href="#">Outdoors</a>
                </li>
                <li>
                    <a href="#">Store</a>
                </li>
                <li>
                    <a href="about.php">About</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
					    <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Menu</a>
						<h1>Climb On</h1>
						<h2>Quick Info</h2>
						<p>To navigate, use the Menu button above. To view a list of Gyms, Outdoor locations, or stores click one of the links in the menu. To learn more about us or answer any frequently asked questions go to the About page.</p>
						<h2>Nearby</h2>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Gyms
                            </div>
                            <div class="panel-body"></div>
                            <ul class="list-group">
                                <?php
                                    if ($result1->num_rows > 0) {
                                        while($row = $result1->fetch_assoc()) {
                                            echo "<a class='list-group-item' href='#'>".$row["name"]."</a>";
                                        }
                                    } else {
                                        echo "<li class='list-group-item'>Nothing Nearby!</li>";
                                    }
                                ?>
                            </ul>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Stores
                            </div>
                            <div class="panel-body"></div>
                            <ul class="list-group">
                                <?php
                                    if ($result2->num_rows > 0) {
                                        while($row = $result2->fetch_assoc()) {
                                            echo "<a class='list-group-item' href='#'>".$row["name"]."</a>";
                                        }
                                    } else {
                                        echo "<li class='list-group-item'>Nothing Nearby!</li>";
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
