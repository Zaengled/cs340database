<?php 

	include 'connect.php';

	//Pulled from https://www.formget.com/login-form-in-php/

	$user_check = $_SESSION['login_user'];
	$sql = "SELECT userName from USER where userName = '$user_check'";
	$result = mysqli_query($mysqli, $sql);
	$row = $result->fetch_assoc();
	$login_session = $row['userName'];
	if(!isset($login_session)){
		header('Location : index.php');
	}
?>