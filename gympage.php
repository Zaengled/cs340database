<!DOCTYPE html>
<html lang="en">

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
		if ($_GET["objid"]){
			$sql = "SELECT * FROM `GymAndLocation` WHERE `objid` = ".$_GET["objid"];
			$result = mysqli_query($mysqli, $sql);
		}
	?>
</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Login
                    </a>
                </li>
				<li>
                    <a href="index.php">Home</a>
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
						<h2> GYM: 
						<?php 
							if($result->num_rows > 0){
								$row = $result->fetch_assoc();
								echo " " . $row["name"] . "</h2>";
								echo "About: " . $row["bio"] . "<br>";
								echo "Address: " . $row["address"] . " " . $row["city"] . ", " . $row["state"] . " " . $row["zip"] . "<br>";
								echo "Rating: " . $row["stars"];
								}
						?>
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