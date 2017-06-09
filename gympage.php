<?php include 'header.php'?>
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

<div class="row">
    <div class="col-lg-12">
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
		<?php 
			echo "<a href='submitreview.php?objid=" .$_GET['objid']."&userName=Zaengru&type=1'><button type='button'>Submit Review</button></a>"
		?>
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
<?php include 'footer.php' ?>