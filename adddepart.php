<?php
	session_start();
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
<style>
label{
font-size:15px;
font-weight:700;
}
	
select#org{
background-image:url(img/icons/dep.png);
background-repeat:no-repeat;
background-position:0px center;
background-size:contain;
border:1px solid #DADADA;
margin-top:10px;
padding-left:60px;
width:310px;
height:51px;
font-size:20px;
box-shadow:0 0 2px;
-webkit-box-shadow:0 0 2px;
/* For I.E */
-moz-box-shadow:0 0 2px;
/* For Mozilla Web Browser*/
border-radius:5px;
-webkit-border-radius:5px;
/* For I.E */
-moz-border-radius:5px
/* For Mozilla Web Browser*/
}
	
	
select#des{
background-image:url(img/icons/arr.png);
background-repeat:no-repeat;
background-position:0px center;
background-size:contain;
border:1px solid #DADADA;
margin-top:10px;
padding-left:60px;
width:310px;
height:51px;
font-size:20px;
box-shadow:0 0 2px;
-webkit-box-shadow:0 0 2px;
/* For I.E */
-moz-box-shadow:0 0 2px;
/* For Mozilla Web Browser*/
border-radius:5px;
-webkit-border-radius:5px;
/* For I.E */
-moz-border-radius:5px
/* For Mozilla Web Browser*/
}

input#dpd1{
background-image:url(img/icons/calen.png);
background-repeat:no-repeat;
background-position:110px center;
background-size:contain;
border:1px solid #DADADA;
margin-top:10px;
padding-left:15px;
width:150px;
height:40px;
font-size:15px;
box-shadow:0 0 0px;
-webkit-box-shadow:0 0 0px;
/* For I.E */
-moz-box-shadow:0 0 0px;
/* For Mozilla Web Browser*/
border-radius:0px;
-webkit-border-radius:0px;
/* For I.E */
-moz-border-radius:0px
/* For Mozilla Web Browser*/
}

input#dpd2{
background-image:url(img/icons/calen.png);
background-repeat:no-repeat;
background-position:110px center;
background-size:contain;
border:1px solid #DADADA;
margin-top:10px;
padding-left:15px;
width:150px;
height:40px;
font-size:15px;
box-shadow:0 0 0px;
-webkit-box-shadow:0 0 0px;
/* For I.E */
-moz-box-shadow:0 0 0px;
/* For Mozilla Web Browser*/
border-radius:0px;
-webkit-border-radius:0px;
/* For I.E */
-moz-border-radius:0px
/* For Mozilla Web Browser*/
}

input[type=radio]{
	height: 15px;
	width: 15px;
}

input[type=submit]{
	background-color: red;
    border: none;
    color: white;
    padding: 16px 16px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;

}
</style>

</head>
<body>
<center>
		<form id="trans" name="trans" action = "adddepart.php" method = "post">
		<h1>DEPART</h1>
		<?php
		echo '<a class="btn" href="">Welcome, '.$_SESSION["fname"].'</a> |';
		echo '<a class="btn" href="logout.php">Log Out</a>';	
		?>
		<br><br>

		<label>From:
			<select required id="Loc" name="Loc" id = "Loc" >
			<option value="default" selected="selected" disabled>Select Location</option>
						<option>Bohol</option>
						<option>Boracay</option>
						<option>Butuan</option>
						<option>Cotabato</option>
						<option>Davao</option>
			</select>
		</label>
		</br></br>
		<label>Leaving on:
			<input required type = "date" name = "FDate" id = "FDate" min = "<?php echo date('Y-m-d') ?>" >
		</label>
		</br></br>
		<label>Departing Time:
			<input required type = "time" name = "Dtime" id = "Dtime" >
		</label>
		</br></br>
		<label>To:
			<select required id="Dest" name="Dest" id = "Dest" disabled>
			<option value="default" selected="selected" disabled>Select Destination</option>
						<option>Bohol</option>
						<option>Boracay</option>
						<option>Butuan</option>
						<option>Cotabato</option>
						<option>Davao</option>
			</select>
		</label> 
		</br></br>
		<label>Arriving Time:
			<input required type = "time" name = "Atime" id = "Atime" disabled>
		</br></br>
		<label>Fly Price:
		</br>
			<input required type = "number" name = "FO" id = "FO" min = "2000">
		</br></br>
		</label>
		<BR>
			<input required type="submit" name = "submit" value="Add Depart Schedule" /> 
		</br></br>
			<a href="addret.php">Go to adding of Return Schedules</a> </br>
		</form>


		<h1> Depart Schedules </h1>
		<?php
		include("db_connect.php");
		$query = "SELECT * FROM depart";
		$result = mysqli_query($db_connect,$query);
		echo "<table border = '1px' class='table'>";
				echo '<th>Flight ID</th>';
				echo '<th>Location</th>';
				echo '<th>Destination</th>';
				echo '<th>Departing Date</th>';
				echo '<th>Departure Time</th>';
				echo '<th>Arriving Time</th>';
				echo '<th>Fly Price</th>';
				echo '<th>Command</th>';
			while($row = mysqli_fetch_array($result)){
										{ 
											echo '<tr>';
												echo '<td>'.$row['Flight_ID'].'</td>';								
												echo '<td>'.$row['Location'].'</td>';
												echo '<td>'.$row['Destination'].'</td>';
												echo '<td>'.$row['D_Date'].'</td>';
												echo '<td>'.$row['D_Time'].'</td>';
												echo '<td>'.$row['A_Time'].'</td>';
												echo '<td>'.$row['Fly_Price'].'</td>';
												echo '<td>';
											echo'<a href=deletedepart.php?F_ID=' . $row["Flight_ID"] . '  >' . ' Delete' . '</a>';
											echo '</td>';
											echo '</tr>';
										}
		}
		echo "</table>";
		if(isset($_POST['submit'])){
		include_once("db_connect.php");
		$FO = $_POST['FO'];
		$DT = $_POST['Dtime'];
		$AT = $_POST['Atime'];
		$R_Date = $_POST['FDate'];
		$Location = $_POST['Loc'];
		$Destination = $_POST['Dest'];
		$insert = "INSERT INTO depart (D_Date,D_Time,A_Time,Location,Destination,Fly_Price) VALUES('$R_Date','$DT','$AT','$Location','$Destination','$FO')";
		$query = mysqli_query($db_connect,$insert);
		header("location: adddepart.php");
		}
		?>

<script>
//DO NOT BOTHER THESE CODES ~ Veo Calimlim

document.getElementById("Dtime").onchange = function () {
    document.getElementById("Atime").disabled='';
    var input = document.getElementById("Atime");
    input.setAttribute("min", this.value);
}

document.getElementById("Loc").onchange = function () {
    document.getElementById("Dest").disabled='';
}

$('select').on('change', function(e) {
  
  var vals = $('#trans').serializeArray();
  
  vals = $.map(vals, function (val, i) {
    return val.value;
  });
  
  vals.splice(vals.indexOf($(this).val()), 1);
  
  if(vals.indexOf($(this).val()) !== -1) {
    
    $(this).val('default');

    alert('You cannot select same place!');
  };
});
</script>
</body>