<?php include 'header.php' ?>
<?php
include 'connect.php';

$sql = "SELECT * FROM `GymAndLocation`";
$result = mysqli_query($mysqli, $sql);
?>
    <div id="new_gym" class="modal">
        <div class="modal-content">
            <div class="modal-body">
                <form action="gym_detail.php" method="post" enctype="multipart/form-data">
                    Select image to upload:
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <input type="submit" value="Upload Image" name="submit">
                </form>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>Gyms</h3>
        </div>
        <ul class="list-group">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<a class='list-group-item' href='gym_detail.php?objid=" . $row["objid"] . "'>"
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
            if ($_SESSION['valid'] == true) {
                echo "<a href='#'"
                    . "onclick=\"document.getElementById('new_gym').style.display='block'\""
                    .">Suggest a gym <span class='glyphicon glyphicon-plus-sign'></span></a>";
            } else {
                echo "<a onclick=\"document.getElementById('id01').style.display='block'\">Login"
                    . "</a> to suggest gyms!";
            }
            ?>
        </div>
    </div>


<?php include 'footer.php' ?>