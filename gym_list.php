<?php include 'header.php' ?>
<?php
include 'connect.php';
if (!$mysqli) {
    die('Could not connect: ' . mysqli_error());
}
$sql = "SELECT * FROM `GymAndLocation`";
$result = mysqli_query($mysqli, $sql);
?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>Gym Locations</h3>
        </div>
        <ul class="list-group">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<a style='text-transform:capitalize;' class='list-group-item' href='gym_detail.php?objid="
                        . $row["objid"] . "'>" . $row["name"]
                        . '<small style="float:right;" class="rating">'
                        . '<span class="glyphicon glyphicon-star"></span> '
                        . $row['rating']
                        . '</small>'
                        . "</a>";
                }
            } else {
                echo "<li>No results found</li>";
            }
            ?>
        </ul>
    </div>


<?php include 'footer.php' ?>