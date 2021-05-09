<?php
	//filename db_connect.php
	$db_connect = mysqli_connect(
	"localhost","root","","flight"	
	);
	if(mysqli_connect_errno()){
		echo mysqli_connect_error();
		exit();
	}
	else{
		//echo "<script>alert('Success')</script>";
	}
?>