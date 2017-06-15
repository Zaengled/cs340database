<div id="route" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h2 id="route_number">Modal Header</h2>
        </div>
        <div class="modal-body">
			<table style="width:95%">
				<tr>
					<td id="image_box"></td>
					<td style="padding: 15px"><p id="route_body">Some text in the Modal Body</p></td>
				</tr>
			</table>
        </div>
        <div class="modal-footer">
            <h3 id="route_difficulty">Modal Footer</h3>
        </div>
    </div>
</div>

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
                echo "<span class='fill'>Route #" . $row["routeID"] . "</span>";
                echo "<span class='right'>Difficulty: " . $row["difficulty"] . "</span></a>";
            }
        } else {
            echo "<li class='list-group-item'> No routes yet!</li>";
        }
        ?>
    </ul>
    <div class="panel-footer">
    <?php
    if ($_SESSION["valid"] == true) {
        echo "<a href=\"submitroute.php?objid=" . $_GET['objid'] . "&type=" . $location['type'] . "\">";
        echo "Add Route ";
        echo "<span class=\"glyphicon glyphicon-plus-sign\"></span>";
        echo "</a>";
    } else {
        echo '<a role="button"'
            . "onclick=\"document.getElementById('id01').style.display='block'\">"
            . "Login "
            . "</a> to add a route!";
    }
    ?>
    </div>
	<script>
		function routeModal(info){
			var modal = document.getElementById('route');
			modal.style.display = "block";
			document.getElementById("route_number").innerHTML = "Route ID: " + info["routeID"];
			if(info["image"] != null){
				document.getElementById("image_box").innerHTML = "<img src=uploads/" +info["image"]+">";
			}
			document.getElementById("route_body").innerHTML = info["bio"];
			document.getElementById("route_difficulty").innerHTML = "Difficulty: " + info["difficulty"];
		}
	</script>

</div>
