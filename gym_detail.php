<?php include 'header.php' ?>
<?php
include 'connect.php';
if ($_GET["objid"]) {
    $sql = "SELECT * FROM `GymAndLocation` WHERE `objid` = " . $_GET["objid"];
    $result = mysqli_query($mysqli, $sql);
    $sql2 = "SELECT * FROM `Reviews` WHERE `objid` = " . $_GET["objid"];
    $reviews = mysqli_query($mysqli, $sql2);
    $sql3 = "SELECT * FROM `Route` WHERE `locationID` = " . $_GET["objid"];
    $routes = mysqli_query($mysqli, $sql3);


    if ($result->num_rows > 0) {
        $location = $result->fetch_assoc();
    }

}
?>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default"> <!--Gym info panel-->
                <div class="panel-heading">
                    <h2>
                        <?php echo $location['name']; ?>
                        <small style="float:right;" class="rating">
                            <span class="glyphicon glyphicon-star"></span>
                            <?php echo $location['rating']; ?>
                        </small>
                    </h2>
                </div>
                <div class="panel-body">
                    <?php echo $location['bio']; ?>
                </div>
            </div>

            <?php include 'reviews_inset.php' ?>

            <?php include 'routes_inset.php' ?>

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