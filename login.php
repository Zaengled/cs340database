<?php
session_start();
include 'connect.php';
if (!$mysqli) {
    die('Could not connect: ' . mysqli_error());
}
$username = $_POST['username'];
$password = $_POST['password'];

if ($_POST['register']=='true'){
    $mysqli->query("INSERT INTO USER (userName, password) VALUES('$_POST[userName]', '$_POST[password]')");
}

$sql = "SELECT * FROM `User` WHERE `userName` = '$username' AND `password` = '$password'";
$result = mysqli_query($mysqli, $sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION["userName"] = $row["userName"];
    $_SESSION["valid"] = true;
    $_SESSION["bio"] = $row["bio"];
    $_SESSION["skill"] = $row["skill"];
    $_SESSION["admin"] = mysqli_query($mysqli,
            "SELECT * FROM `ADMIN` WHERE userName=$row[userName]")->num_rows > 0;
} else {
    session_destroy();
}

header("Location: index.php");
?>