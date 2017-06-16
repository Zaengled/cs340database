<?php include 'header.php' ?>

<?php
include 'connect.php';

if ($_GET["objid"]) {
    $id = $_GET['objid'];
    $sql = "SELECT * FROM `GymAndLocation` WHERE `objid` = " . $id;
    $result = mysqli_query($mysqli, $sql);
    $sql2 = "SELECT * FROM `Reviews` WHERE `objid` = " . $id;
    $reviews = mysqli_query($mysqli, $sql2);
    $sql3 = "SELECT * FROM `Route` WHERE `locationID` = " . $id;
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
                    <table>
                        <tr>
                            <td id="imageslot" style="padding:15px;">
                                <?php echo "<img src='$location[image]'>"?>
                            </td>
                            <td>
                                <p>
                                    <?php echo $location['bio']; ?>
                                </p>
                            </td>
                        </tr>
                    </table>
                    <div class="well" style="margin-bottom:0;">
                        <span class="glyphicon glyphicon-home"></span>
                        <?php $address = "$location[address], $location[city], $location[state] $location[zip]";
                        echo "<a target='_blank' href='https://maps.google.com/?q=$address'>";
                        echo "$address "; ?>
                        <span class="glyphicon glyphicon-new-window"></span>
                        </a>
                    </div>
                </div>
            </div>

            <?php include 'reviews_inset.php' ?>

            <?php include 'routes_inset.php' ?>

        </div>
    </div>
    <script>
        $('document').ready(
            function () {
                if ("<?php echo $location['image'];?>" != "") {
                    document.getElementById("imageslot").innerHTML = "<img style='border:1px solid black;' src='uploads/<?php echo $location['image']; ?>'>"
                }
            }
        )
    </script>
<?php include 'footer.php' ?>