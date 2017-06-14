<?php include 'header.php' ?>
<?php
include 'connect.php';
if ($_GET["objid"]) {
    $sql = "SELECT * FROM `GymAndLocation` WHERE `objid` = " . $_GET["objid"];
    $result = mysqli_query($mysqli, $sql);
    $sql2 = "SELECT * FROM `Reviews` WHERE `objid` = " . $_GET["objid"];
    $reviews = mysqli_query($mysqli, $sql2);
    $sql3 = "SELECT * FROM `Route` WHERE `locationID` = " . $_GET["objid"];
    $result3 = mysqli_query($mysqli, $sql3);


    if ($result->num_rows > 0) {
        $gym = $result->fetch_assoc();
    }

}
?>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default"> <!--Gym info panel-->
                <div class="panel-heading">
                    <h2>
                        <?php echo $gym['name']; ?>
                        <small style="float:right;" class="rating">
                            <span class="glyphicon glyphicon-star"></span>
                            <?php echo $gym['rating']; ?>
                        </small>
                    </h2>
                </div>
                <div class="panel-body">
                    <?php echo $gym['bio']; ?>
                </div>
            </div>

            <?php include 'reviews_inset.php' ?>

            <h2> ROUTES: </h2>

            <table width="80%">
                <tr>
                    <th>Route Number</th>
                    <th>Difficulty</th>
                </tr>
                <?php
                if ($result3->num_rows > 0) {
                    while ($row = $result3->fetch_assoc()) {
                        echo "<tr onclick='routeModal(";
                        echo json_encode($row);
                        echo ") '><td>" . $row["routeID"] . "</td><td>" . $row["difficulty"] . "</td></tr>";
                    }
                } else {
                    echo "<tr><td>No routes yet!</td></tr>";
                }
                ?>
            </table>

        </div>
    </div>
<?php include 'footer.php' ?>