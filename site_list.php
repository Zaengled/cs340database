<?php include 'header.php' ?>
<?php
include 'connect.php';
if (!$mysqli) {
    die('Could not connect: ' . mysqli_error());
}
$sql = "SELECT * FROM `SiteAndLocation`";
$result = mysqli_query($mysqli, $sql);
?>
<div class="row">
    <div class="col-lg-12">
        <h1>Climb On</h1>
        <h2>Site List</h2>
        <table>
        <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td><a href='site_detail.php?objid=" .$row["objid"] ."'>".$row["name"]."</a></td></tr>";
                }
            } else {
                echo "<tr><td>0 results</td></tr>";
            }
        ?>
        </table>

    </div>
</div>

<?php include 'footer.php' ?>