<?php include 'header.php';?>
<?php
include 'connect.php';
if ($_GET["usr"]) {
    $sql = "SELECT * FROM `User` WHERE `userName` = '" . $_GET["usr"]. "'";
    $result = mysqli_query($mysqli, $sql);


    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    }

}
?>

<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default"> <!--User info panel-->
                <div class="panel-heading">
                    <h2>
                        <?php echo htmlspecialchars($user['userName']); ?>
                        <small style="float:right;" class="rating">
                            <?php echo "Skill: " . $user['Skill']; ?>
                        </small>
                    </h2>
                </div>
                <div class="panel-body">
					<table>
						<tr>
							<td id="imageslot" style="padding:15px;"></td>
							<td>
								<p>
									<?php echo htmlspecialchars($user['bio']); ?>
								</p>
							</td>
						</tr>
					</table>
                    <div class="well" style="margin-bottom:0;">
                        <button id="edbutton" onclick="editProfile()" style="display:block">Edit</button>
						<div  id="edit" style="display:none">
						<form action='profile_update.php' method='post'enctype='multipart/form-data'>
							Skill:<br>
							<input type='text' name='skill' value='<?php echo htmlspecialchars($user['Skill']);?>'>
							<br>Bio:<br>
							<input type='text' name='bio'value='<?php echo htmlspecialchars($user['bio']);?>'>
							<br>Select image to upload:
							<input type="file" name="fileToUpload" id="fileToUpload">
							<button type="submit" name="submit" value="Submit">Submit</button>
							<input type="hidden" name="userName" value="<?php echo $_GET['usr']; ?>">
						</form>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<script>
		$('document').ready(
			function(){
				if("<?php echo $user['avatar'];?>" != ""){
					document.getElementById("imageslot").innerHTML = "<img style='border:1px solid black;' src='uploads/<?php echo $user['avatar']; ?>'>"
				}
			}
		)
		function editProfile(){
			
			if('<?php echo $_SESSION['userName']?>' == '<?php echo $user['userName']?>'){
				var myDiv = document.getElementById("edit");
				var myButton = document.getElementById("edbutton");
				myButton.style.display = 'none';
				myDiv.style.display = 'block';
			}
		}
	</script>
	
<?php include 'footer.php'?>