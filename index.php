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
        <div class="col-md-6 col-md-offset-3">
            <form action='#' onsubmit="grabResults()">
                <div class="input-group">
                    <span class="input-group-btn">
                        <button class="btn btn-default">
                            <span class="glyphicon glyphicon-screenshot"></span>
                        </button>
                    </span>
                    <input class="form-control" type="text" id="city" placeholder="Enter City...">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </span>
                </div>
            </form>
        </div>
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
