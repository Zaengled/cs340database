<?php
	session_start();
	include 'connect.php';
	if (!$mysqli) {
		die('Could not connect: ' . mysqli_error());
	}
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$sql = "SELECT * FROM `User` WHERE `userName` = '$username' AND `password` = '$password'";
	$result = mysqli_query($mysqli, $sql);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$_SESSION["userName"] = $row["userName"];
		$_SESSION["valid"] = true;
		$_SESSION["bio"] = $row["bio"];
		$_SESSION["skill"] = $row["skill"];
    } else {
		session_destroy();
    }
	
	header("Location: index.php");
?>