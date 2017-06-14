<div class="panel panel-default">
    <div class="panel-heading">
        Routes
    </div>

    <ul class="list-group">
        <?php
        if ($routes->num_rows > 0) {
            while ($row = $routes->fetch_assoc()) {
                echo "<a class='list-group-item review' onclick='routeModal(";
                echo json_encode($row);
                echo ")'>";
                echo "</span>";
                echo "<span class='fill'>RouteID: " . $row["routeID"] . "</span>";
                echo "<span class='right'>Difficulty: " . $row["difficulty"] . "</span></a>";
            }
        } else {
            echo "<li class='list-group-item'> No routes yet!</li>";
        }
        ?>
    </ul>
	<?php 
		if($_SESSION["valid"] == true){
			echo '<div class="panel-footer">';
			echo "<a href=\"submitroute.php?objid=" . $_GET['objid'] . "&type=" . $location['type']."\">";
            echo "Add Route ";
            echo "<span class=\"glyphicon glyphicon-plus-sign\"></span>";
			echo "</a>";
			echo '</div>';
		}
	?>
    
</div>
