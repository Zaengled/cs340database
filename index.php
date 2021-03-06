<?php include 'header.php'; ?>
<?php
include 'connect.php';
if (!$mysqli) {
    die('Could not connect: ' . mysqli_error());
}

?>
<script src="js/locationgrab.js"></script>
<div class="row" style="margin-top:10px; margin-bottom:10px;">
    <div class="col-md-6 col-md-offset-3">
            <div class="input-group">
                <input class="form-control" type="text" id="city" placeholder="Enter City...">
                <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit" onclick="grabResults()">Search</button>
                    </span>
            </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">

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
