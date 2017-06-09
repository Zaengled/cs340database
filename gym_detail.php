<?php include 'header.php'?>
<?php
include 'connect.php';
if ($_GET["objid"]){
    $sql = "SELECT * FROM `GymAndLocation` WHERE `objid` = ".$_GET["objid"];
    $result = mysqli_query($mysqli, $sql);
    $sql2 = "SELECT * FROM `Reviews` WHERE `objid` = ".$_GET["objid"];
    $reviews = mysqli_query($mysqli, $sql2);
    $sql3 = "SELECT * FROM `Route` WHERE `locationID` = ".$_GET["objid"];
    $result3 = mysqli_query($mysqli, $sql3);


    if($result->num_rows > 0){
        $gym = $result->fetch_assoc();
    }

}
?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default"> <!--Gym info panel-->
            <div class="panel-heading">
                <h1><?php echo $gym['name'];?></h1>
                <span style="float:right;" class="rating">
                    <?php echo $gym['rating']; ?>
                </span>
            </div>
            <div class="panel-body">
                <?php echo $gym['bio']; ?>
            </div>
        </div>

        <?php include 'reviews_inset.php'?>

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