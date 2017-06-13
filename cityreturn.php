<!DOCTYPE html>
<?php include 'connect.php'; ?>
<html>
<head>

</head>
<body>
<?php
	$t = intval($_GET['t']);
	$q = $_GET['q'];
	
	if($t == 1){
		
		$sql1 = "SELECT * FROM `GymAndLocation` WHERE City = '".$q."'";
		$result1 = mysqli_query($mysqli, $sql1);
		if($result1->num_rows > 0){
			while($row = $result1->fetch_assoc()){
				echo "<a class='list-group-item' href='gym_detail.php?objid=".htmlspecialchars($row["objid"])."'>".htmlspecialchars($row["name"])."</a>";
			} 
		} else {
			echo "<li class='list-group-item'>Nothing Nearby!</li>";
		}
	}
	
	if($t == 2){
		$sql2 = "SELECT * FROM `StoreAndLocation` WHERE City = '".$q."'";
		$result2 = mysqli_query($mysqli, $sql2);
		if ($result2->num_rows > 0) {
            while($row = $result2->fetch_assoc()) {
                echo "<a class='list-group-item' href='store_detail.php?objid=".htmlspecialchars($row["objid"])."'>".htmlspecialchars($row["name"])."</a>";
            }
        } else {
            echo "<li class='list-group-item'>Nothing Nearby!</li>";
        }
	}
	
	if($t == 3){
		$sql3 = "SELECT * FROM `SiteAndLocation` WHERE city = '".$q."'";
		$result3 = mysqli_query($mysqli, $sql3);
		if ($result3->num_rows > 0) {
            while($row = $result3->fetch_assoc()) {
                echo "<a class='list-group-item' href='site_detail.php?objid=".htmlspecialchars($row["objid"])."'>".htmlspecialchars($row["name"])."</a>";
            }
        } else {
            echo "<li class='list-group-item'>Nothing Nearby!</li>";
        }
	}
?>
</body>
</html>