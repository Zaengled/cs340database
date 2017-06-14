<?php include 'header.php'?>
<?php
include 'connect.php';
if ($_GET["objid"]){
    $sql = "SELECT * FROM `StoreAndLocation` WHERE `objid` = ".$_GET["objid"];
    $result = mysqli_query($mysqli, $sql);
    $sql2 = "SELECT * FROM `Reviews` WHERE `objid` = ".$_GET["objid"];
    $reviews = mysqli_query($mysqli, $sql2);

}
?>

<div class="row">
    <div class="col-lg-12">
        <h1>Climb On</h1>
        <h2> STORE:
        <?php
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                echo " " . $row["name"] . "</h2>";
                echo "About: " . $row["bio"] . "<br>";
                echo "Address: " . $row["address"] . " " . $row["city"] . ", " . $row["state"] . " " . $row["zip"] . "<br>";
                echo "Rating: " . $row["rating"];
                }
        ?>
        <?php include 'reviews_inset.php'?>

    </div>
</div>
<?php include 'footer.php' ?>