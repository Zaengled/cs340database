<?php include 'header.php'; ?>
<div class="row">
    <div class="col-lg-12">
        <h1>Climb On</h1>
        <h2>Nearby</h2>
        <div class="panel panel-default">
            <div class="panel-heading">
                Gyms
            </div>
            <ul class="list-group">
                <?php
                    if ($result1->num_rows > 0) {
                        while($row = $result1->fetch_assoc()) {
                            echo "<a class='list-group-item' href='#'>".$row["name"]."</a>";
                        }
                    } else {
                        echo "<li class='list-group-item'>Nothing Nearby!</li>";
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
                    if ($result2->num_rows > 0) {
                        while($row = $result2->fetch_assoc()) {
                            echo "<a class='list-group-item' href='#'>".$row["name"]."</a>";
                        }
                    } else {
                        echo "<li class='list-group-item'>Nothing Nearby!</li>";
                    }
                ?>
            </ul>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>