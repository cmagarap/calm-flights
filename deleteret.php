<?php
include("db_connect.php");
$ret_id = $_GET["F_ID"];
$delete = "DELETE FROM ret WHERE Flight_ID ='$ret_id'";
$query = mysqli_query($db_connect,$delete) or die(mysqli_error($db_connect));
header("location: addret.php");
?> 