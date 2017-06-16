<?php include 'header.php' ?>

<?php
include 'connect.php';

$mysqli->query("INSERT INTO Location (type, city, state, zip, address) "
                ."VALUES ('1', '$_POST[city]', '$_POST[state]', '$_POST[zip]', '$_POST[street]')");
$id = $mysqli->insert_id;

if (isset($_POST["fileToUpload"])) {

    $target_dir = "uploads/";
    $target_file = $target_dir . htmlspecialchars($_POST['name']);
    $uploadOk = 1;
    $error = null;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $error = "File is not an image.";
            $uploadOk = 0;
        }
    }
// Check if file already exists
    if (file_exists($target_file)) {
        $error = "This file already exists.";
        $uploadOk = 0;
    }
// Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
// Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        $error = "Only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<div class='panel panel-danger'><div class='panel-body'>$error</div></div>";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            $location['image'] = $target_file;
        } else {
            echo "<div class='panel panel-danger'><div class='panel-body'>There was an error uploading your file</div></div>";
        }
    }
}

$mysqli->query("INSERT INTO Gym (gymId, name, bio, published) VALUES ".
        "('$id', '$_POST[title]','$_POST[gym_body]', '0')");

if ($_GET["objid"] || $id) {
    if ($_GET["objid"]){$id=$_GET["objid"];}

    $sql = "SELECT * FROM `GymAndLocation` WHERE `objid` = " . $id;
    $result = mysqli_query($mysqli, $sql);
    $sql2 = "SELECT * FROM `Reviews` WHERE `objid` = " . $id;
    $reviews = mysqli_query($mysqli, $sql2);
    $sql3 = "SELECT * FROM `Route` WHERE `locationID` = " . $id;
    $routes = mysqli_query($mysqli, $sql3);


    if ($result->num_rows > 0) {
        $location = $result->fetch_assoc();
    }

}
?>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default"> <!--Gym info panel-->
                <div class="panel-heading">
                    <h2>
                        <?php echo $location['name']; ?>
                        <small style="float:right;" class="rating">
                            <span class="glyphicon glyphicon-star"></span>
                            <?php echo $location['rating']; ?>
                        </small>
                    </h2>
                </div>
                <div class="panel-body">
                    <table>
                        <tr>
                            <td id="imageslot" style="padding:15px;"></td>
                            <td>
                                <p>
                                    <?php echo $location['bio']; ?>
                                </p>
                            </td>
                        </tr>
                    </table>
                    <div class="well" style="margin-bottom:0;">
                        <span class="glyphicon glyphicon-home"></span>
                        <?php $address = "$location[address], $location[city], $location[state] $location[zip]";
                        echo "<a target='_blank' href='https://maps.google.com/?q=$address'>";
                        echo "$address "; ?>
                        <span class="glyphicon glyphicon-new-window"></span>
                        </a>
                    </div>
                </div>
            </div>

            <?php include 'reviews_inset.php' ?>

            <?php include 'routes_inset.php' ?>

        </div>
    </div>
    <script>
        $('document').ready(
            function () {
                if ("<?php echo $location['image'];?>" != "") {
                    document.getElementById("imageslot").innerHTML = "<img style='border:1px solid black;' src='uploads/<?php echo $location['image']; ?>'>"
                }
            }
        )
    </script>
<?php include 'footer.php' ?>