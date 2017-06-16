<?php
include 'header.php';
include 'connect.php';
if ($_SESSION['admin']) {
    if (isset($_GET['approve'])){
        echo $_GET['approve'];
        $mysqli->query("CALL publishGymOrStore($_GET[approve])");
    }
    if (isset($_GET['delete'])){
        $mysqli->query("DELETE FROM Location WHERE objid='$_GET[delete]'");
    }

    $gyms = mysqli_query($mysqli, 'SELECT * FROM GymAndLocation WHERE published = "0"');
    $stores = mysqli_query($mysqli, 'SELECT * FROM Store where published = "0"');

    ?>
    <h2>Admin Console</h2>
    <div class="panel panel-default">
        <div class="panel-heading">
            Gyms
        </div>
        <ul class="list-group">
            <?php
            foreach ($gyms as $gym) {
                echo "<li class='list-group-item clearfix' >"
                    . "<h4>$gym[name]"
                    . "<div style='float:right;' class='btn-group' role='group'>"
                    . "<a href='admin_list.php?approve=$gym[objid]' class='btn btn-default' title='Publish'>"
                    . "<span class='glyphicon glyphicon-ok'></span></a>"
                    . "<a href='admin_list.php?delete=$gym[objid]' class='btn btn-default' title='Delete'>"
                    . "<span class='glyphicon glyphicon-trash'></span></a>"
                    . "</div></h4>"
                    . "<p>$gym[bio]</p>"
                    . "</li>";
            }
            if ($gyms->num_rows <= 0) {
                echo "<li class='list-group-item'>No suggestions to moderate</li>";
            }
            ?>
        </ul>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            Stores
        </div>
        <ul class="list-group">
            <?php
            foreach ($stores as $gym) {
                echo "<li class='list-group-item clearfix' >"
                    . "<h4>$gym[name]"
                    . "<div style='float:right;' class='btn-group' role='group'>"
                    . "<button class='btn btn-default' title='Publish'>"
                    . "<span class='glyphicon glyphicon-ok'></span></button>"
                    . "<button class='btn btn-default' title='Delete'>"
                    . "<span class='glyphicon glyphicon-trash'></span></button>"
                    . "</div></h4>"
                    . "<p>$gym[bio]</p>"
                    . "</li>";
            }
            if ($stores->num_rows <= 0) {
                echo "<li class='list-group-item'>No suggestions to moderate</li>";
            }
            ?>
        </ul>
    </div>
<?php } else { ?>
    <h2>Unauthorized Access</h2>
    <p>
        This page requires administrator credentials to view.
    </p>
<?php }
include 'footer.php' ?>