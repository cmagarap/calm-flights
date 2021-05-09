<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CALM Flights</title>
	<link rel= "icon" href= "icon.png">
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/animate.css" rel="stylesheet" />
    <!-- Squad theme CSS -->
    <link href="css/style.css" rel="stylesheet">
	<link href="color/default.css" rel="stylesheet">
    <link href="datepicker/css/datepicker.css" rel="stylesheet">
    <!-- =======================================================
        Theme Name: Squadfree
        Theme URL: https://bootstrapmade.com/squadfree-free-bootstrap-template-creative/
        Author: BootstrapMade
        Author URL: https://bootstrapmade.com
    ======================================================= -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body>
<?php
error_reporting(0);
include_once("db_connect.php");
if(isset($_POST['submit'])){
$AQ = $_POST['adult'];
$CQ = $_POST['child'];
$Adult_Price = 200;
$Child_Price = 100;
$Adult_TPrice = $AQ * $Adult_Price;
$Child_TPrice = $CQ * $Child_Price;
$TPP = $Adult_TPrice + $Child_TPrice;
$Dep_ID = $_POST['Dep_ID'];
$Ret_ID = $_POST['Ret_ID'];
$Dep_Price = $_POST['DPrice'];
$Ret_Price = $_POST['RPrice'];
if ($_POST['Chk'] == 1){
$H_ID = $_POST['Hotel'];
$query2 = "SELECT * FROM hotel WHERE Hotel_ID = '$H_ID'";
$result2 = mysqli_query($db_connect,$query2);
$row2 = mysqli_fetch_array($result2);
$H_Name = $row2['H_Name'];
$H_Price = $row2['H_Price'];
$Trans_Price = $_POST['Transpo'];
$Food_Price = $_POST['Food'];
$H_days = $_POST['days'];
}
else if ($_POST['Chk'] == 0){
$H_ID = NULL;
$H_Price = 0;
$Trans_Price = 0;
$Food_Price = 0;
$H_days = 0;
}
$H_TP = $H_Price * $H_days;
$TPrice = $Dep_Price + $Ret_Price + $Trans_Price + $Food_Price + $H_TP + $TPP;
$query = "SELECT * FROM Depart WHERE Flight_ID = '$Dep_ID'";
$result = mysqli_query($db_connect,$query);
$row = mysqli_fetch_array($result);

$query1 = "SELECT * FROM Ret WHERE Flight_ID = '$Ret_ID'";
$result1 = mysqli_query($db_connect,$query1);
$row1 = mysqli_fetch_array($result1);
}?>
<section id="contact" class="home-section text-center">
		<div class="heading-contact">
			<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					
					<div class="section-heading">
					<h2>CONFIRMATION</h2>
					<i class="fa fa-2x fa-angle-down"></i>

					</div>
					</div>
				</div>
			</div>
			</div>
		</div>
		<div class="container">
<form method="post" action="insert.php" enctype="multipart/form-data">
<?php
if ($Ret_ID != NULL) {?>
<center><table  class="table"> 
<tr>
<th><h2> Departure </h2></th>
<th><h2> Returning </h2></th>
<th><h2> Persons </h2></th>
<th><h2> Hotel </h2></th>
<th><h2> Transportation </h2></th>
<th><h2> Food </h2></th>
</tr>
<tr>
<td>Location:<?=$row['Location']?> </td> 
<td>Location:<?=$row1['Location']?></td>
<td>Adult Count:<?=$AQ?></td>  
<td>Hotel Name: <?php if($H_Name != NULL){
echo $H_Name;
}
else{
echo "None";
}?>
<td>Tranportation Type: <?php if($Trans_Price == 1500){
echo "Taxi";
$Transpo_Type = "Taxi";
}
else if($Trans_Price == 1000){
echo "Bus";
$Transpo_Type = "Bus";
}
else{
echo "None";
$Transpo_Type = "None";
}
?> 
</td>
<td>Food Package: <?php if($Food_Price == 200){
echo "Breakfast Buffet";
$Food_Type = "Breakfast Buffet";
}
else if($Food_Price == 300){
echo "Lunch Buffet";
$Food_Type = "Lunch Buffet";
}
else if($Food_Price == 400){
echo "Dinner Buffet";
$Food_Type = "Dinner Buffet";
}
else if($Food_Price == 1000){
echo "Whole day Buffet";
$Food_Type = "Whole day Buffet";
}
else{
echo "None";
$Food_Type = "None";
}?>
</td>
</tr>
<tr>
<td>Destination: <?=$row['Destination']?></td> 
<td>Destination:<?=$row1['Destination']?></td>
<td>Child Count:<?=$CQ?></td>  
<td> Price per day: <?=$H_Price?> </td>
<td> Transportation Price: <?=$Trans_Price?> </td>
<td> Food Package Price: <?=$Food_Price?> </td>
</tr>
<tr>
<td>Leaving Time: <?=$row['D_Time']?></td> 
<td>Leaving Time: <?=$row1['D_Time']?></td> 
<td>Price Per Adult:<?=$Adult_Price?></td>  
<td> Days booked: <?=$H_days?> </td>
</tr>
<tr>
<td>Arriving Time: <?=$row['A_Time']?></td> 
<td>Arriving Time: <?=$row1['A_Time']?></td> 
<td>Price Per Child:<?=$Child_Price?></td>  
<td> Total Hotel Price: <?=$H_TP?> </td>
</tr>
<tr>
<td>Departure Date: <?=$row['D_Date']?></td> 
<td>Return Date: <?=$row1['R_Date']?></td>
<td>Total Person Price:<?=$TPP?></td>  

</tr>
<tr>
<td>Departure Price: <?= $Dep_Price ?> </td> 
<td>Returning Price: <?= $Ret_Price ?> </td>
</tr>
<?php
}
 else{?>
 <table class="table">
<tr>
<th><h2> Departure </h2></th>
<th><h2> Persons </h2></th>
<th><h2> Hotel </h2></th>
<th><h2> Transportation </h2></th>
<th><h2> Food </h2></th>
</tr>
<tr>
<td>Location:<?=$row['Location']?> </td>
<td>Adult Count:<?=$AQ?></td>  
<td>Hotel Name: <?php if($H_Name != NULL){
echo $H_Name;
}
else{
echo "None";
}?></td>
<td>Tranportation Type: <?php if($Trans_Price == 1500){
echo "Taxi";
$Transpo_Type = "Taxi";
}
else if($Trans_Price == 1000){
echo "Bus";
$Transpo_Type = "Bus";
}
else{
echo "None";
$Transpo_Type = "None";
}
?> </td>
<td>Food Package: <?php if($Food_Price == 200){
echo "Breakfast Buffet";
$Food_Type = "Breakfast Buffet";
}
else if($Food_Price == 300){
echo "Lunch Buffet";
$Food_Type = "Lunch Buffet";
}
else if($Food_Price == 400){
echo "Dinner Buffet";
$Food_Type = "Dinner Buffet";
}
else if($Food_Price == 1000){
echo "Whole day Buffet";
$Food_Type = "Whole day Buffet";
}
else{
echo "None";
$Food_Type = "None";
}?>
</td>
</tr>
<tr>
<td>Destination: <?=$row['Destination']?></td>
<td>Child Count:<?=$CQ?></td>
<td> Days booked: <?=$H_days?> </td>
<td> Transportation Price: <?=$Trans_Price?> </td>
<td> Food Package Price: <?=$Food_Price?> </td>
</tr>
<tr>
<td>Leaving Time: <?=$row['D_Time']?></td>
<td>Price Per Adult :<?=$Adult_Price?></td>  
<td> Price per day: <?=$H_Price?> </td>
</tr>
<tr>
<td>Arriving Time: <?=$row['A_Time']?></td>
<td>Price Per Child :<?=$Child_Price?></td>  
<td> Total Hotel Price: <?=$H_TP?> </td>
</tr>
<tr>
<td>Depature Date: <?=$row['D_Date']?></td>
<td>Total Person Price :<?=$TPP?></td>  
</tr>
<tr>
<td>Departure Price: <?= $Dep_Price ?> </td> 
</tr>
</table>
<?php 
}
?>
<table class="table" border = "1px">
<tr>
<th><h2>Total Price: <?=$TPrice?></h2> </th>
</tr>
</table>
<input type="hidden" name="email" value= "vvcalimlim@fit.edu.ph">
<input type="hidden" name="D_Loc" value = <?=$row['Location']?> >
<input type="hidden" name="D_Dest" value = <?=$row['Destination']?> >
<input type="hidden" name="D_LT" value = <?=$row['D_Time']?> >
<input type="hidden" name="D_AT" value = <?=$row['A_Time']?> >
<input type="hidden" name="D_Date" value = <?=$row['D_Date']?> >
<input type="hidden" name="D_Price" value = <?= $Dep_Price ?>  >
<input type="hidden" name="R_Loc" value = <?=$row1['Location']?> > 
<input type="hidden" name="R_Dest" value = <?=$row1['Destination']?> > 
<input type="hidden" name="R_LT" value = <?=$row1['D_Time']?> >
<input type="hidden" name="R_AT" value = <?=$row1['A_Time']?> >
<input type="hidden" name="R_Date" value = <?=$row1['R_Date']?> >
<input type="hidden" name="R_Price" value = <?= $Dep_Price ?>  >
<input type="hidden" name="Adult_Count" value = <?= $AQ ?>  >
<input type="hidden" name="Child_Count" value = <?= $CQ ?>  >
<input type="hidden" name="Total_Person_Price" value = <?= $TPP ?>  >
<input type="hidden" name="H_Name" value = <?= $H_Name ?>  >
<input type="hidden" name="Days_Booked" value = <?= $H_days ?>  >
<input type="hidden" name="Total_Hotel_Price" value = <?= $H_TP ?>  >
<input type="hidden" name="Transpo_Type" value = <?= $Transpo_Type ?>  >
<input type="hidden" name="Transpo_Price" value = <?= $Trans_Price ?>  >
<input type="hidden" name="Transpo_Type" value = <?= $Transpo_Type ?>  >
<input type="hidden" name="Food_Pckg" value = <?= $Food_Type ?>  >
<input type="hidden" name="Food_Price" value = <?= $Food_Price ?>  >
<input type="hidden" name="TPrice" value = <?= $TPrice ?>  >
<input type="hidden" name="H_Price" value = <?= $H_Price ?>  >
<input type="hidden" name="H_days" value = <?= $H_days ?>  >
<input type="hidden" name="Adult_Price" value = <?= $Adult_Price ?>  >
<input type="hidden" name="Child_Price" value = <?= $Child_Price ?>  >
<input type="submit" name="btn_submit" value="Submit">   
</form>
<?php
//include('sendmail.php');
?>
 <!-- Core JavaScript Files -->
	
    <script src="js/jquery.min.js"></script>
	<script src="datepicker/js/bootstrap-datepicker.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>	
	<script src="js/jquery.scrollTo.js"></script>
	<script src="js/wow.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.js"></script>
    <script src="contactform/contactform.js"></script>
</body>
</html>