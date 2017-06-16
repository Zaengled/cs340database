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
            <h4><?php echo $location["name"]; ?>
                <span class='stars' style="float:right;">
                <?php echo "$location[rating] "; ?>
                <span class="glyphicon glyphicon-star"></span>
                </span>
            </h4>
        </div>
        <div class="panel-body">
            <div class="col-md-3">
                <?php echo "<img class='img-responsive' src='$location[image]'>";?>
            </div>
            <div class="col-md-9">
                <p>
                    <?php echo $location['bio'];?>
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

<?php include 'reviews_inset.php' ?>

<?php include 'routes_inset.php' ?>

<script>
		$('document').ready(
			function(){
				if("<?php echo $location['image'];?>" != ""){
					document.getElementById("imageslot").innerHTML = "<img style='border:1px solid black;' src='uploads/<?php echo $location['image']; ?>'>"
				}
			}
		)
	</script>

<?php include 'footer.php' ?>