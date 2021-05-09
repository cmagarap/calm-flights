<?php
    include('check_session.php');
?>

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
include_once("db_connect.php");
error_reporting(0);
if(isset($_POST['submit1'])){
$AQ = $_POST['adult'];
$CQ = $_POST['child'];
$D_ID = $_POST['Dep_ID'];
$R_ID = $_POST['Ret_ID'];
$query = "SELECT * FROM depart WHERE Flight_ID = '$D_ID'";
$result = mysqli_query($db_connect,$query);
$query1 = "SELECT * FROM ret WHERE Flight_ID = '$R_ID'";
$result1 = mysqli_query($db_connect,$query1);
$row1 = mysqli_fetch_array($result1); 
$row = mysqli_fetch_array($result);
$DPrice = $row['Fly_Price'];
$RPrice = $row1['Fly_Price'];
echo '<section id="contact" class="home-section text-center">
		<div class="heading-contact">
			<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					
					<div class="section-heading">
					<h2>CHOSEN SCHEDULE</h2>
					<i class="fa fa-2x fa-angle-down"></i>

					</div>
					</div>
				</div>
			</div>
			</div>
		</div>
		<div class="container">
'; 
 echo '<center><table class="table" border 1px>';
echo '<tr>';
                    echo '<th> Location </th>';
                    echo '<th> Destination </th>';
                    echo '<th> Date </th>';
                    echo '<th> Departure Time </th>';
                    echo '<th> Arriving Time </th>';
echo '</tr>'; 
                echo '<tr>';						
                    echo '<td>'.$row['Location'].'</td>';
                    echo '<td>'.$row['Destination'].'</td>';
                    echo '<td>'.$row['D_Date'].'</td>';
                    echo '<td>'.$row['D_Time'].'</td>';
                    echo '<td>'.$row['A_Time'].'</td>';
               echo '</tr>';
echo '</br>';

if (mysqli_num_rows($result1) > 0 ){ 
                echo '<tr>';						
                    echo '<td>'.$row1['Location'].'</td>';
                    echo '<td>'.$row1['Destination'].'</td>';
                    echo '<td>'.$row1['R_Date'].'</td>';
                    echo '<td>'.$row1['D_Time'].'</td>';
                    echo '<td>'.$row1['A_Time'].'</td>';
               echo '</tr>';   
               
}
else{

}
    echo "</table>";
}
?><br>
<form action = "Submit.php" method = "post">
<h1> Do you want to book a hotel? </h1>
<h6><input  type="radio" id="chkYes" name="Chk" onclick="ShowHideDiv(); enableBtn();" value = "1"/> Yes &emsp;&emsp; 
<input  type="radio" id="chkNo" name="Chk" onclick="ShowHideDiv(); disableBtn();"  checked value = "0"/> No </h6>
    <div id = "show" style="display: none">
    <table class="table table-hover">
        <tr>
            <th> Select </th>
            <th> Hotel </th>
            <th> Hotel Name </th>
            <th> Hotel Price per day </th>
        </tr>
        <?php 
            $query2 = "SELECT * FROM hotel WHERE H_Loc = '".$row['Destination']."'";
            $result2 = mysqli_query($db_connect,$query2);
            while($row2 = mysqli_fetch_array($result2)){
        ?>
        <tr>
            <td><input type="radio" id = "Hotel" name = "Hotel" value =<?=$row2['Hotel_ID']?>> </td>
            <td><img width = "150px" height = "150px" src=<?=$row2['H_Image']?>></td>	
            <td><center><?=$row2['H_Name']?> </center></td>
            <td><center><?=$row2['H_Price']?>/per day </br>
        </tr>
    <?php
    } ?>
    </table>

    <input type = "number" id = "days" name = "days" min = "1" max = "30" style="width: 3em"> Days
    <br><br>
	<h2>Transportation</h2>
    <input required type="radio" id = "Transpo" name = "Transpo" value = "1000" >Bus  &emsp;
    <input required type="radio" id = "Transpo" name = "Transpo"  value = "1500"  > Taxi  &emsp;
    <input required type="radio" id = "Transpo" name = "Transpo"  value = "0" Checked > None  &emsp;
	<br><br>
    <h3>Select Food Package</h3>
    <input required type="radio" id = "Food" name="Food" value = "200" > Break Fast Buffet  &emsp;
    <input required type="radio" id = "Food" name="Food" value = "300" > Lunch Buffet  &emsp;
    <input required type="radio" id = "Food" name="Food" value = "400" > Dinner Buffet   &emsp;
    <input required type="radio" id = "Food" name="Food" value = "1000" > Whole day Buffet  &emsp;
    <input required type="radio" id = "Food" name="Food" value = "0" Checked > None 
    </div>
</br>
<input type = "hidden" name = "adult" value =<?= $AQ?>>
<input type = "hidden" name = "child" value =<?= $CQ?>>
<input type = "hidden" name = "Dep_ID" value =<?= $D_ID?>>
<input type = "hidden" name = "Ret_ID" value =<?= $R_ID?>>
<input type = "hidden" name = "DPrice" value =<?= $DPrice?>>
<input type = "hidden" name = "RPrice" value =<?= $RPrice?>>
<input type = "Submit" name = "submit" class="btn btn-success" value = "Submit">
</form>
<script>
function ShowHideDiv() {
    var chkYes = document.getElementById("chkYes");
    var show = document.getElementById("show");
	show.style.display = chkYes.checked ? "block" : "none";
}

function disableBtn() {
      document.getElementById("days").required = false;
      document.getElementById("Hotel").required = false;
}

function enableBtn() {
      document.getElementById("days").required = true;
       document.getElementById("Hotel").required = true;
}
</script>
 <!-- Core JavaScript Files -->
	
    <script src="js/jquery.min.js"></script>
	<script src="datepicker/js/bootstrap-datepicker.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>	
	<script src="js/jquery.scrollTo.js"></script>
	<script src="js/wow.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.js"></script>
</body>
</html>