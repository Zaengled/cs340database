<?php include 'header.php' ?>
<?php
include 'connect.php';

$sql = "SELECT * FROM `GymAndLocation`";
$result = mysqli_query($mysqli, $sql);
?>
    <div id="new_gym" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Suggest a Gym</h4>
            </div>
            <div class="modal-body">
                <form action="gym_detail.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="body">Add a description</textarea>
                    </div>
                    <div class="form-group">
                        <label for="gym_image">Gym Image</label>
                        <input type="file" name="fileToUpload" id="gym_image">
                    </div>
                    <button class="btn btn-primary" type="submit">Submit</button>
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