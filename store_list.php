<?php include 'header.php' ?>
<?php
include 'connect.php';
if (!$mysqli) {
    die('Could not connect: ' . mysqli_error());
}
$sql = "SELECT * FROM `StoreAndLocation`";
$result = mysqli_query($mysqli, $sql);
?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>Stores</h3>
        </div>
        <ul class="list-group">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<a class='list-group-item' href='store_detail.php?objid=" . $row["objid"] . "'>"
                        . $row["name"]
                        . '<small style="float:right;" class="rating">'
                        . '<span class="glyphicon glyphicon-star"></span> '
                        . $row['rating']
                        . '</small>'
                        . "</a>";
                }
            } else {
                echo "<li class='list-group-item'>0 results</li>";
            }
            ?>
        </ul>
        <div class="panel-footer">
            <?php
            if ($_SESSION['valid']==true){
                echo "<a href='#'>Suggest a store <span class='glyphicon glyphicon-plus-sign'></span></a>";
            }else{
                echo "<a href='#'>Login to suggest stores <span class='glypicon glyphicon-log-in'></span></a>";
            }
            ?>
        </div>
    </div>

<?php include 'footer.php' ?>