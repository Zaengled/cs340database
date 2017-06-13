<div class="panel panel-default">
    <div class="panel-heading">
        Reviews
    </div>

    <ul class="list-group">
        <?php
        if ($reviews->num_rows > 0) {
            while ($row = $reviews->fetch_assoc()) {
                echo "<a class='list-group-item review' onclick='reviewModal(";
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
            echo 'Log in to add a review!'
                . '<a style="float:right;" class="btn btn-default" role="button"'
                . "onclick=\"document.getElementById('id01').style.display='block'\">"
                . "Login <span class=\"glyphicon glyphicon-log-in\"</span>"
                . "</a>";
		}
        ?>
    </div>

</div>
