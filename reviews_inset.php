<!-- The Modal -->
<div id="review" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h2 id="review_userName">Modal Header</h2>
        </div>
        <div class="modal-body">
            <p id="review_body">Some text in the Modal Body</p>
        </div>
        <div class="modal-footer">
            <h3 id="review_stars">Modal Footer</h3>
        </div>
    </div>
</div>


<div class="panel panel-default">
    <div class="panel-heading">
        Reviews
    </div>

    <ul class="list-group">
        <?php
        if ($reviews->num_rows > 0) {
            while ($row = $reviews->fetch_assoc()) {
                echo "<a class='list-group-item review' onclick='openModal(\"review\",";
                echo json_encode($row);
                echo ")'>";
                echo "<span class='stars'>";
                for ($i = 1; $i <= 5; $i++) {
                    if ($i <= (int)$row["stars"]) {
                        echo "<span class='glyphicon glyphicon-star'></span>";
                    } else {
                        echo "<span class='glyphicon glyphicon-star-empty'></span>";
                    }
                }
                echo "</span>";
                echo "<span class='fill'>" . $row["userName"] . "</span>";
                echo "<span class='timestamp'>" . $row["timestamp"] . "</span></a>";
            }
        } else {
            echo "<li class='list-group-item'> No reviews yet!</li>";
        }
        ?>
    </ul>
    <div class="panel-footer">
        <?php
        if ($_SESSION["valid"] == true) {
            echo "<a href=\"submitreview.php?objid=" . $_GET['objid'] . "&userName=" . $_SESSION["userName"] . "&type=1\">";
            echo "Add Review ";
            echo "<span class=\"glyphicon glyphicon-plus-sign\"></span>";
            echo "</a>";
        } else {
            echo '<a role="button"'
                . "onclick=\"document.getElementById('id01').style.display='block'\">"
                . "Login "
                . "</a> to add a review!";
		}
        ?>
    </div>

</div>
