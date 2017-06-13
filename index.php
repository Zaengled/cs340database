<?php include 'header.php'; ?>
<?php
include 'connect.php';
if (!$mysqli) {
    die('Could not connect: ' . mysqli_error());
}
<<<<<<< HEAD
=======
$sql1 = "SELECT * FROM `GymAndLocation` WHERE City = 'Corvallis' ";
$sql2 = "SELECT * FROM `SiteAndLocation` WHERE City = 'Corvallis' ";
$sql3 = "SELECT * FROM `StoreAndLocation` WHERE city = 'Corvallis' ";
$result1 = mysqli_query($mysqli, $sql1);
$result2 = mysqli_query($mysqli, $sql2);
$result3 = mysqli_query($mysqli, $sql3);
>>>>>>> f7752c491947b5d9a829c598ae9e02a15a2c7f9f
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="js/locationgrab.js"></script>
<div class="row">
    <div class="col-lg-12">
        <h1>Climb On</h1>
        <h2 id="enterC">Enter City: <input type="text" id="city"> <button type="button" onclick="grabResults()">Submit</button></h2>
        <div class="panel panel-default">
            <div class="panel-heading">
                Gyms
            </div>
            <ul class="list-group" id="gyms">
                <?php
<<<<<<< HEAD
                    echo "<li class='list-group-item'>Nothing Nearby!</li>";
=======
                    if ($result1->num_rows > 0) {
                        while($row = $result1->fetch_assoc()) {
                            echo "<a class='list-group-item' href='gym_detail.php?objid=".$row["objid"]."'>".$row["name"]."</a>";
                        }
                    } else {
                        echo "<li class='list-group-item'>Nothing Nearby!</li>";
                    }
>>>>>>> f7752c491947b5d9a829c598ae9e02a15a2c7f9f
                ?>
            </ul>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                Stores
            </div>
            <ul class="list-group" id="stores">
                <?php
<<<<<<< HEAD
                    echo "<li class='list-group-item'>Nothing Nearby!</li>";
=======
                    if ($result3->num_rows > 0) {
                        while($row = $result3->fetch_assoc()) {
                            echo "<a class='list-group-item' href='#'>".$row["name"]."</a>";
                        }
                    } else {
                        echo "<li class='list-group-item'>Nothing Nearby!</li>";
                    }
                ?>
            </ul>
        </div>
		<div class="panel panel-default">
            <div class="panel-heading">
                Outdoor Sites
            </div>
            <ul class="list-group">
                <?php
                    if ($result2->num_rows > 0) {
                        while($row = $result2->fetch_assoc()) {
                            echo "<a class='list-group-item' href='#'>".$row["name"]."</a>";
                        }
                    } else {
                        echo "<li class='list-group-item'>Nothing Nearby!</li>";
                    }
>>>>>>> f7752c491947b5d9a829c598ae9e02a15a2c7f9f
                ?>
            </ul>
        </div>
		<div class="panel panel-default">
            <div class="panel-heading">
                Outdoor Sites
            </div>
            <ul class="list-group" id="outdoor">
                <?php
                    echo "<li class='list-group-item'>Nothing Nearby!</li>";
                ?>
            </ul>
			<div style="display: none;" id="city"><span id="city"></span></div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>