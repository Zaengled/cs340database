<h2> REVIEWS: </h2>
<?php
echo "<a href='submitreview.php?objid=" .$_GET['objid']."&userName=Zaengru&type=1'><button type='button'>Submit Review</button></a>"
?>
<table width="80%">
    <tr>
        <th>Stars</th>
        <th>User</th>
        <th>Review Date</th>
    </tr>
    <?php
    if($reviews->num_rows > 0){
        while($row = $reviews->fetch_assoc()) {
            echo "<tr onclick='reviewModal(";
            echo json_encode($row);
            echo ")'><td>" . $row["stars"] . "</td><td>" . $row["userName"] . "</td><td class='timestamp'>" . $row["timestamp"] . "</td></tr>";
        }
    } else {
        echo "<tr><td>No reviews yet!</td></tr>";
    }
    ?>
</table>
