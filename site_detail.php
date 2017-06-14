<?php include 'header.php'?>
<?php
include 'connect.php';
if ($_GET["objid"]){
    $sql = "SELECT * FROM `SiteAndLocation` WHERE `objid` = ".$_GET["objid"];
    $result = mysqli_query($mysqli, $sql);
    $sql2 = "SELECT * FROM `Reviews` WHERE `objid` = ".$_GET["objid"];
    $reviews = mysqli_query($mysqli, $sql2);
    $sql3 = "SELECT * FROM `Route` WHERE `locationID` = ".$_GET["objid"];
    $result3 = mysqli_query($mysqli, $sql3);
}
?>

<div class="row">
    <div class="col-lg-12">
        <h1>Climb On</h1>
        <h2> SITE:
        <?php
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                echo " " . $row["name"] . "</h2>";
                echo "About: " . $row["bio"] . "<br>";
                echo "Address: " . $row["address"] . " " . $row["city"] . ", " . $row["state"] . " " . $row["zip"] . "<br>";
                echo "Rating: " . $row["rating"];
                }
        ?>
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

    </div>
</div>
<?php include 'footer.php' ?>