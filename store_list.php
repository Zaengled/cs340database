<?php include 'header.php' ?>
<?php
include 'connect.php';
if (!$mysqli) {
    die('Could not connect: ' . mysqli_error());
}
$sql = "SELECT * FROM `StoreAndLocation` WHERE published='1'";
$result = mysqli_query($mysqli, $sql);
?>
    <div id="new_store" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Suggest a Store</h4>
            </div>
            <div class="modal-body">
                <form action="upload_location.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="type" value="2">
                    <div class="form-group">
                        <label for="store_name">Name</label>
                        <input id="store_name" type="text" class="form-control" name="name" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="store_image">Store Image</label>
                        <input type="file" name="fileToUpload" id="store_image">
                    </div>
                    <div class="form-group">
                        <label for="store_desc">Description</label>
                        <textarea class="form-control" id="store_desc" name="description" placeholder="Add a description"></textarea>
                    </div>
                    <fieldset class="form-group" id="address" name="address">
                        <label for="address">Address</label>
                        <div class="row">
                            <div class="form-group">
                                <input type="text" class="form-control" name="address" placeholder="Street">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control" name="city" placeholder="City">
                            </div>
                            <div class="col-md-4 form-group">
                                <input type="text" class="form-control" name="state" placeholder="State">
                            </div>
                            <div class="col-md-4 form-group">
                                <input type="text" class="form-control" name="zip" placeholder="Zip"
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>Stores</h3>
        </div>
        <ul class="list-group">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<a class='list-group-item' href='store_detail.php?objid=" . $row["objid"] . "'>"
                        . htmlspecialchars($row["name"])
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
                    . "onclick=\"document.getElementById('new_store').style.display='block'\""
                    .">Suggest a store <span class='glyphicon glyphicon-plus-sign'></span></a>";
            } else {
                echo "<a onclick=\"document.getElementById('id01').style.display='block'\">Login"
                    . "</a> to suggest stores!";
            }
            ?>
        </div>
    </div>

<?php include 'footer.php' ?>