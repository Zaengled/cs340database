<?php
include 'header.php';
include 'connect.php';

if ($_GET["objid"]) {
    $id = $_GET["objid"];

    $sql = "SELECT * FROM `StoreAndLocation` WHERE `objid` = " . $id;
    $result = mysqli_query($mysqli, $sql);
    $sql2 = "SELECT * FROM `Reviews` WHERE `objid` = " . $id;
    $reviews = mysqli_query($mysqli, $sql2);
    $sql3 = "SELECT * FROM `Route` WHERE `locationID` = " . $id;
    $routes = mysqli_query($mysqli, $sql3);


    if ($result->num_rows > 0) {
        $location = $result->fetch_assoc();
    }

}

if ($location['published'] == 1 || $_SESSION['admin']) {
    ?>
    <div class="row">
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
                <div class="col-md-3">
                    <?php echo "<img class='img-responsive' src='$location[image]'>"; ?>
                </div>
                <div class="col-md-9">
                    <p>
                        <?php echo $location['bio']; ?>
                    </p>
                </div>
            </div>
            <div class="row well" style="margin-bottom:0;">
                <span class="glyphicon glyphicon-home"></span>
                <?php $address = "$location[address], $location[city], $location[state] $location[zip]";
                echo "<a target='_blank' href='https://maps.google.com/?q=$address'>";
                echo "$address "; ?>
                <span class="glyphicon glyphicon-new-window"></span>
                </a>
            </div>
        </div>
    </div>
    <?php
    include 'reviews_inset.php';
}else {?>
    <h4>Uh Oh!</h4>
    <p>
        This store hasn't been published yet -- check back in a few days
    </p>
    <?php}?>
<?php include 'footer.php'; ?>