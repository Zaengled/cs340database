<?php include 'header.php' ?>
<?php
include 'connect.php';
if (!$mysqli) {
    die('Could not connect: ' . mysqli_error());
}
$sql = "SELECT * FROM `SiteAndLocation`";
$result = mysqli_query($mysqli, $sql);
?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>Outdoor Sites</h3>
        </div>
        <ul class="list-group">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<a class='list-group-item' href='site_detail.php?objid=" . $row["objid"] . "'>"
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
                echo "<a href='#'>Add a site <span class='glyphicon glyphicon-plus-sign'></span></a>";
            }else{
                echo "<a onclick=\"document.getElementById('id01').style.display='block'\">Login"
                    ."</a> to add locations!";
            }
            ?>
        </div>
    </div>


<?php include 'footer.php' ?>