<?php 

include 'connect.php';

//Using tutorial from https://www.formget.com/login-form-in-php/

session_start();
$error='';
if(isset($_POST['submit'])) {
	if(empty($_POST['username']) || empty($_POST['password'])){
		$error = "Username or Password is invalid";
	}
	else{
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$username = stripcslashes($username);
		$password = stripcslashes($password);
		
		$username = mysqli_real_escape_string($username);
		$password = mysqli_real_escape_string($password);
		
		$sql = "SELECT * FROM `User` WHERE `password` = '$password' AND `username` = '$username'";
		$result = mysqli_query($mysqli, $sql);
		$rows = $result->num_rows;
		
		//Create session if there is only  one result.
		if($rows == 1){
			$_SESSION['login_user'] = $username;
			header("location: index.php");
		} else {
			$error = "Username or Password is invalid";
		}
	}
}
?>