<?php include 'header.php'?>
<?php include 'connect.php'?>

<?php 
	if ($_GET["objid"]){
		if ($_GET["type"] == 1){
			$sql = "SELECT * FROM `GymAndLocation` WHERE `objid` = ".$_GET["objid"];
		}
		else if ($_GET["type"] == 2){
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
			}
			echo "</h2>";
		?>
		<form method="post">
			<fieldset>
			<legend>New Route:</legend>
			<h4>Route Description:
				<p>
				<textarea name="description" rows="15" cols="60" required = "true" placeholder="Enter your description here, please use only 500 words."></textarea>
				</p>
			</h4>
			<h4>Difficulty: 
				<p>
				<textarea name="difficulty" rows="1" cols="6" required = "true" placeholder="Enter a difficulty."></textarea>
				</p>
			</h4>
			<button type="submit" name="submityes" value="Submit">Submit</button>
			</fieldset>
		</form>
    </div>
	<?php 
	if($_POST['submityes'] == "Submit"){
		$OBJID = $_GET['objid'];
		$CONTENT = $_POST['description'];
		$DIFFICULTY = $_POST['difficulty'];
		if($OBJID != NULL && $CONTENT != NULL && $DIFFICULTY != NULL){
			$result = $mysqli->query("INSERT INTO `Route` (`locationID`, `bio`, `difficulty`) VALUES ('$OBJID', '$CONTENT', '$DIFFICULTY')");
		}
	}
	?>
</div>
<?php include 'footer.php' ?>