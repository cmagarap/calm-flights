<?php
include("db_connect.php");
$dep_id = $_GET["F_ID"];
$delete = "DELETE FROM depart WHERE Flight_ID ='$dep_id'";
$query = mysqli_query($db_connect,$delete) or die(mysqli_error($db_connect));
header("location: adddepart.php");
?> 