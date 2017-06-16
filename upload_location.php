<?php
include 'connect.php';

if ($_POST['type']) {
    echo "$_POST[type] <br>";

    //Add Location

    if($mysqli->query("INSERT INTO Location (type, city, state, zip, address) "
        . "VALUES ('$_POST[type]', '$_POST[city]', '$_POST[state]', '$_POST[zip]', '$_POST[address]')")){
        echo 'Added location <br>';
    }else{
        echo "Failed to add location<br>";
    }

    //Get location id
    $id = $mysqli->insert_id;

    //Upload Image
    if (isset($_POST["fileToUpload"])) {

        $target_dir = "uploads/";
        $target_file = $target_dir . str_replace(' ', '-', $_POST['name']);
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
                echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
            } else {
                echo "<div class='panel panel-danger'><div class='panel-body'>There was an error uploading your file</div></div>";
            }
        }
    }

    if ($_POST['type'] == '1'){
        if($mysqli->query("INSERT INTO Gym (gymId, name, image, bio, published) VALUES "
            . "('$id', '$_POST[name]', '$target_file','$_POST[description]', '0')") == true){
            echo 'Added Gym';
        }
    }else if ($_POST['type'] == '2'){
        if ($mysqli->query("INSERT INTO Store (storeId, name, image, bio, published) VALUES "
            . "('$id', '$_POST[name]', '$target_file','$_POST[description]', '0')")){
            echo 'Added Store';
        }
    }else if ($_POST['type'] == '3'){
        if ($mysqli->query("INSERT INTO Site (siteId, name, image, bio, lat, lng, directions) VALUES "
            . "('$id', '$_POST[name]', '$target_file','$_POST[description]', '$_POST[lat]', '$_POST[lng]', '$_POST[directions]')")){
            echo 'Added Site';
        }
    }
}