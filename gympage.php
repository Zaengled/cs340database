<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ClimbOn - Your climbing location resource!</title>
	
	<!-- popup modal CSS -->
	<link href="css/modal.css" rel="stylesheet">

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
			$sql2 = "SELECT * FROM `Reviews` WHERE `objid` = ".$_GET["objid"];
			$result2 = mysqli_query($mysqli, $sql2);
			$sql3 = "SELECT * FROM `Route` WHERE `locationID` = ".$_GET["objid"];
			$result3 = mysqli_query($mysqli, $sql3);
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
						<h2> REVEIWS: </h2>
						<table width="80%">
						<tr>
							<th>Stars</th>
							<th>User</th>
							<th>Review Date</th>
						</tr>
						<?php
							if($result2->num_rows > 0){
								while($row = $result2->fetch_assoc()) {
									echo "<tr onclick='reviewModal(";
									echo json_encode($row);
									echo ")'><td>" . $row["stars"] . "</td><td>" . $row["userName"] . "</td><td>" . $row["timestamp"] . "</td></tr>";
								}
							} else {
								echo "<tr><td>No reveiws yet!</td></tr>";
							}
						?>
						</table>
						
						<h2> ROUTES: </h2>
						
						<table width="80%">
						<tr>
							<th>Route Number</th>
							<th>Difficulty</th>
						</tr>
						<?php 
							if($result3->num_rows > 0){
								while($row = $result3->fetch_assoc()) {
									echo "<tr onclick='routeModal(";
									echo json_encode($row);
									echo ") '><td>" . $row["routeID"] . "</td><td>" . $row["difficulty"] . "</td></tr>";
								}
							} else {
								echo "<tr><td>No routes yet!</td></tr>";
							}
						?>
						</table>
						
						<!-- The Modal -->
						<div id="myModal" class="modal">
							<!-- Modal content -->
							<div class="modal-content">
								<div class="modal-header">
									<span class="close">&times;</span>
									<h2 id="mh1">Modal Header</h2>
								</div>
								<div class="modal-body">
									<p id="cont">Some text in the Modal Body</p>
								</div>
								<div class="modal-footer">
									<h3 id="mh2">Modal Footer</h3>
								</div>
							</div>
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

	<!-- Modal JavaScript -->
    <script src="js/modal.js"></script>
	
    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>