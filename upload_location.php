<?php
include 'connect.php';

if ($_POST['type']) {

    //Add Location

    $mysqli->query("INSERT INTO Location (type, city, state, zip, address) "
        . "VALUES ('$_POST[type]', '$_POST[city]', '$_POST[state]', '$_POST[zip]', '$_POST[address]')");

    //Get location id
    $id = $mysqli->insert_id;

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST["type"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }


    if ($_POST['type'] == '1') {
        $mysqli->query("INSERT INTO Gym (gymId, name, image, bio, published) VALUES "
            . "('$id', '$_POST[name]', '$target_file','$_POST[description]', '0')");
        header("Location: gym_list.php");

    } else if ($_POST['type'] == '2') {
        $mysqli->query("INSERT INTO Store (storeId, name, image, bio, published) VALUES "
            . "('$id', '$_POST[name]', '$target_file','$_POST[description]', '0')");
        header("Location: store_list.php");
    } else if ($_POST['type'] == '3') {
        $mysqli->query("INSERT INTO Site (siteId, name, image, bio, lat, lng, directions) VALUES "
            . "('$id', '$_POST[name]', '$target_file','$_POST[description]', '$_POST[lat]', '$_POST[lng]', '$_POST[directions]')");
        header("Location: site_detail.php?objid=$id");
    } else {
        header( "Location: index.php");
    }
}