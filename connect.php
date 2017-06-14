<?php
$hostname = "classmysql.engr.oregonstate.edu";
$dbname = "cs340_zaengled";
$dbuser = "cs340_zaengled";
$dbpass = "1867";

$mysqli = mysqli_connect($hostname, $dbname, $dbpass, $dbuser);
if (!$mysqli) {
    die('Could not connect: ' . mysqli_error());
}
?>
