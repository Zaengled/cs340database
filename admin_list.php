<?php
include 'header.php';
include 'connect.php';
$gyms = mysqli_query($mysqli, 'SELECT * FROM Gym WHERE published = "0"');
$stores = mysqli_query($mysqli, 'SELECT * FROM Store where published = "0"');

if ($_SESSION['admin']) { ?>
    <h2>Admin Console</h2>
    <div class="panel panel-default">
        <div class="panel-heading">
            Gyms
        </div>
        <ul class="list-group">
            <?php
            foreach ($gyms as $gym) {
                echo "<a class='list-group-item' href='gym_detail.php?objid=$gym[objid]'>$gym[name]"
                    ."<div style='float:right;' class='btn-group' role='group'>"
                    . "<button class='btn btn-default' title='Publish'>"
                        . "<span class='glyphicon glyphicon-ok'></span></button>"
                    . "<button class='btn btn-default' title='Delete'>"
                        . "<span class='glyphicon glyphicon-trash'></span></button>"
                    . "</a>"
                    . "</div>";
            }
            if ($gyms->num_rows <= 0){
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
            foreach ($stores as $store) {
                echo "<a class='list-group-item' href='gym_detail.php?objid=$store[objid]>$store[name]"
                    . "<button style='float:right;' class='btn btn-default' title='Publish'>"
                    . "<span class='glyphicon glyphicon-ok'></span></button>"
                    . "<button style='float:right;' class='btn btn-default' title='Delete'>"
                    . "<span class='glyphicon glyphicon-trash'></span></button>"
                    . "</a>";
            }
            if ($stores->num_rows <= 0){
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