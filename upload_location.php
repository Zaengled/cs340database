<?php
include 'connect.php';

if ($_POST['type']) {

    //Add Location

    $mysqli->query("INSERT INTO Location (type, city, state, zip, address) "
        . "VALUES ('$_POST[type]', '$_POST[city]', '$_POST[state]', '$_POST[zip]', '$_POST[address]')");

    //Get location id
    $id = $mysqli->insert_id;


    $target_dir = "uploads/";
    $file_extension = pathinfo($_FILES["fileToUpload"]["name"])['extension'];

    $target_file = $target_dir . basename(str_replace(' ', '-', $_POST['name'].'.'.$file_extension));
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $uploadOk = 1;
    // Check if image file is a actual image or fake image
    if(isset($_POST["type"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 1) {
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        chmod($target_file, 0755);

    }else{
        $location['image'] = null;
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