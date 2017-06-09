<?php include 'header.php'?>
<?php include 'connect.php'?>
<?php 
	if ($_GET["objid"] && $_GET["userName"]){
		if ($_GET["type"] == 1){
			$sql = "SELECT * FROM `GymAndLocation` WHERE `objid` = ".$_GET["objid"];
		}
		else if ($_GET["type"] == 2){
			$sql = "SELECT * FROM `StoreAndLocation` WHERE `objid` = ".$_GET["objid"];
		}
		else if ($_GET["type"] == 3){
			$sql = "SELECT * FROM `SiteAndLocation` WHERE `objid` = ".$_GET["objid"];
		}
		$result = mysqli_query($mysqli, $sql);
	}
?>

<div class="row">
    <div class="col-lg-12">
		<h1>Climb On</h1>
		<h2>
		<?php 
			if($result->num_rows > 0){
				$row = $result->fetch_assoc();
				echo " " . $row["name"];
				echo "</h2>";
			}
		?>
		<form method="post">
			<fieldset>
			<legend>New Review:</legend>
			<h4>Review Body:
				<p>
				<textarea name="description" rows="15" cols="60" required = "true" placeholder="Enter your description here, please use only 500 words."></textarea>
				</p>
			</h4>
			<h4>Stars: 
				<select name="stars">
					<option value='1' > 1 </option>
					<option value="2" > 2 </option>
					<option value="3" > 3 </option>
					<option value="4" > 4 </option>
					<option value="5" > 5 </option>
				</select>
			</h4>
			<button type="submit" name="submityes" value="Submit">Submit</button>
			</fieldset>
		</form>
    </div>
	<?php 
	if($_POST['submityes'] == "Submit"){
		$OBJID = $_GET['objid'];
		$USERNAME = $_GET['userName'];
		$CONTENT = $_POST['description'];
		$STARS = intval($_POST['stars']);
		if($OBJID != NULL && $USERNAME != NULL && $CONTENT != NULL && $STARS != NULL){
			$result2 = $mysqli->query("DELETE FROM `Reviews` WHERE `Reviews`.`objid` = '$OBJID' AND `Reviews`.`userName` = '$USERNAME'");
			$result = $mysqli->query("INSERT INTO `Reviews` (`userName`, `objid`, `body`, `stars`) VALUES ('$USERNAME', '$OBJID', '$CONTENT', '$STARS')");
		}
	}
	?>
</div>
<?php include 'footer.php' ?>