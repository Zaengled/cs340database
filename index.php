<?php include 'header.php'; ?>
<?php
include 'connect.php';
if (!$mysqli) {
    die('Could not connect: ' . mysqli_error());
}
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="js/locationgrab.js"></script>
<div class="row">
    <div class="col-lg-12">
        <h2 id="enterC">Enter City: <input type="text" id="city"> <button type="button" onclick="grabResults()">Submit</button></h2>
        <div class="panel panel-default">
            <div class="panel-heading">
                Gyms
            </div>
            <ul class="list-group" id="gyms">
                <?php
                    echo "<li class='list-group-item'>Nothing Nearby!</li>";
                ?>
            </ul>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                Stores
            </div>
            <ul class="list-group" id="stores">
                <?php
                    echo "<li class='list-group-item'>Nothing Nearby!</li>";
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
