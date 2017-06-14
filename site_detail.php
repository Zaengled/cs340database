<?php include 'header.php' ?>
<?php
include 'connect.php';
if ($_GET["objid"]) {
    $sql = "SELECT * FROM `SiteAndLocation` WHERE `objid` = " . $_GET["objid"];
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

    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo $location["name"]; ?>
            <span class='stars' style="float:right;">
            <?php
            echo "$location[stars] ";
            for ($i = 1; $i <= 5; $i++) {
                if ($i <= $location['stars']) {
                    echo "<span class='glyphicon glyphicon-star'></span>";
                } else {
                    echo "<span class='glyphicon glyphicon-star-empty'></span>";
                }
            } ?>
        </span>
        </div>
        <div class="panel-body">
            <?php echo $location['bio']; ?>
            <div class="well">
                <h4>Address</h4>
                <?php echo "$location[address] $location[city], $location[state] $location[zip]"; ?>
            </div>
        </div>
    </div>

<?php include 'reviews_inset.php' ?>

<?php include 'routes_inset.php' ?>


<?php include 'footer.php' ?>