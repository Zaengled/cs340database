<?php
include 'connect.php';

if ($_POST['type']) {

    //Add Location

    $mysqli->query("INSERT INTO Location (type, city, state, zip, address) "
        . "VALUES ('$_POST[type]', '$_POST[city]', '$_POST[state]', '$_POST[zip]', '$_POST[address]')");

    //Get location id
    $id = $mysqli->insert_id;

    //Upload Image
    if (isset($_FILES["fileToUpload"])) {

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

        if ($uploadOk == 0){
            $target_file = null;
            echo $error;
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