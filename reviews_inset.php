<h2> REVIEWS: </h2>
<?php
echo "<a href='submitreview.php?objid=" .$_GET['objid']."&userName=Zaengru&type=1'><button type='button'>Submit Review</button></a>"
?>

<div class="panel panel-default">
    <div class="panel-header">
        Reviews
    </div>
    <ul class="list-group">
    <?php
    if($reviews->num_rows > 0){
    while($row = $reviews->fetch_assoc()) {
    echo "<a class='list-group-item' onclick='reviewModal(";
    echo json_encode($row);
    echo ")'><span>" . $row["stars"] . "</span><span>" . $row["userName"] . "</span><span class='timestamp'>" . $row["timestamp"] . "</span></li>";
    }
    } else {
    echo "<tr><td>No reviews yet!</td></tr>";
    }
    ?>
    </ul>

</div>
