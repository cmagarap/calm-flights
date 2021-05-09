<?php
	session_start();
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!DOCTYPE html>
<head>
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

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
	<!-- Preloader -->
	<div id="preloader">
	  <div id="load"></div>
	</div>

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.php">
					<h1 style="color: gray;">CALM FLIGHTS ✈️</h1>
            
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#intro">Home</a></li>

		<?php
			if (isset($_SESSION['status'])){
				echo '<li><a href="">Welcome, '.$_SESSION["fname"].'</a></li>';
				echo '<li><a href="logout.php">Log Out</a></li>';
			}
			else{
				echo '<li><a data-toggle="modal" data-target="#signupForm" href="#">Sign Up</a></li>';
        		echo '<li><a data-toggle="modal" data-target="#loginForm" href="#">Log In</a></li>';
			}
		?>
		<!-- <li><a href="#contact">Contact</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Example menu</a></li>
            <li><a href="#">Example menu</a></li>
            <li><a href="#">Example menu</a></li>
          </ul>
        </li> -->
      </ul>
	  
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

	<!-- Section: intro -->
    <section id="intro" class="intro">
		
		<div class="slogan">
		<img src = "calm.png" width = "25%">
<form id="trans" name="trans" action = "index.php" method = "post">
			<h6 style="color: black;">
<input type="radio" id="chkYes" name="chkFT" onclick="ShowHideDiv(); enableBtn();" value = "1" /> Round Trip </input>
<input type="radio" id="chkNo" name="chkFT" onclick="ShowHideDiv(); disableBtn();" checked="checked" value = "0"/> One Way </input> </h6>

			<select required id="org" name="Loc">
      <option value="" selected="selected" disabled>Origin</option>
   <option>Bacolod</option>
				  <option>Bohol</option>
				  <option>Boracay</option>
				  <option>Butuan</option>
				  <option>Cotabato</option>
				  <option>Davao</option>
    </select>
			&emsp;<img width='6%'src="img/icons/arrow.png"> &emsp;
			<select required id="des" name="Dest" >
      <option value="" selected= "selected" disabled>Destination</option>
       <option>Bacolod</option>
				  <option>Bohol</option>
				  <option>Boracay</option>
				  <option>Butuan</option>
				  <option>Cotabato</option>
				  <option>Davao</option>
    </select>
			<br><br>
			<div>
			<center><table>
			<th>
			<tr>
			<td><h6 style="color: black;">Leaving on 
			 <input type="text" data-date-format="yyyy-mm-dd" class="span2"  name="FDate" id="dpd1" onkeydown="return false;" onclick = "enable()"> &emsp;&emsp; </td>
			 <td>
			 <label id="dvPassport" style="display: none" >
			<h6 style="color: black;">Returning on
			<input disabled type="text" data-date-format="yyyy-mm-dd" class="span2"  name="SDate" id="dpd2" onkeydown="return false;"> </h6> </label> </td>
			</tr>
			</th>
			</table>
			</div>
			<div>
			<h6 style="color: black;">Adult:
 <input type = "number" min = "1" max="10"onkeydown = "return false;" value = "1" name = "adult" style="width: 3em; height: 2em;" required>
&emsp;&emsp;&emsp;Child: 
<input type = "number" min = "0" max="5" onkeydown = "return false;" value = "0" name = "child" style="width: 3em; height: 2em;"></br></br>		
			</div>
			<h4><input type="submit" name="submit" value="SEARCH FLIGHTS"></h4>
		</div>
		</form>
<?php
if(isset($_POST['submit'])){
include_once("db_connect.php");
$AQ = $_POST['adult'];
$CQ = $_POST['child'];
$Location = $_POST['Loc'];
$Destination = $_POST['Dest'];
$D_Date = $_POST['FDate'];
$R_Date = $_POST['SDate'];
echo '<form name= "Schedule" action = "transaction.php" method = "post">';
	                            $query = "SELECT * FROM depart where Location = '$Location' AND Destination = '$Destination'AND D_Date = '$D_Date' ";
								$result = mysqli_query($db_connect,$query) or die("Error: ".mysqli_error($db_connect));
								?>
<section id="contact" class="home-section text-center">
		<div class="heading-contact">
			<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow bounceInDown" data-wow-delay="0.4s">
					<div class="section-heading">
					<h2>FLIGHT RESERVATION</h2>
					<i class="fa fa-2x fa-angle-down"></i>

					</div>
					</div>
				</div>
			</div>
			</div>
		</div>
		<div class="container">
		<div class="row">
								<?php
								 echo '<h1>DEPARTURE</h1>';
								if (mysqli_num_rows($result) > 0){
                                   echo '<br><br><table class="table table-hover" border = "1px">';
                                    echo '<tr>';
										echo '<th> Select </th>';
										echo '<th> Flight ID </th>';
                                        echo '<th> Location </th>';
                                        echo '<th> Destination </th>';
                                        echo '<th> Date </th>';
                                        echo '<th> Departure Time </th>';
                                        echo '<th> Arriving Time </th>';
										echo '<th> Flight Price</th>';
                                    echo '</tr>';     
								while($row = mysqli_fetch_array($result))
								  { 
								    echo '<tr>';
                                        echo '<td><input required type = "radio" name = "Dep_ID" value = '.$row['Flight_ID'].'></td>';
										echo '<td>'.$row['Flight_ID'].'</td>';								
								        echo '<td>'.$row['Location'].'</td>';
								        echo '<td>'.$row['Destination'].'</td>';
								        echo '<td>'.$row['D_Date'].'</td>';
								        echo '<td>'.$row['D_Time'].'</td>';
                                        echo '<td>'.$row['A_Time'].'</td>';
										echo '<td>'.$row['Fly_Price'].'</td>';
									 echo '</tr>';
								  }
                                   echo '</table>';
								}
								else{
									echo "Sorry, flights for this day are either sold out or unavailable. Please choose another date, or search again.";
								}
                                $query1 = "SELECT * FROM ret where Location = '$Destination' AND Destination = '$Location' AND R_Date = '$R_Date' ";
								$result1= mysqli_query($db_connect,$query1) or die("Error: ".mysqli_error($db_connect));
								if ($_POST['chkFT'] == 1 ){
									echo '<h1>RETURNING</h1>';  
									if (mysqli_num_rows($result1) > 0){ 
                                  echo '<table class="table table-hover" border = "1px">';
                                    echo '<tr>';
										echo '<th> Select </th>';
										echo '<th> Flight ID </th>';
                                        echo '<th> Location </th>';
                                        echo '<th> Destination </th>';
                                        echo '<th> Date </th>';
                                        echo '<th> Departure Time </th>';
                                        echo '<th> Arriving Time </th>';
										echo '<th> Flight Price</th>';
                                    echo '</tr>'; 
								while($row1 = mysqli_fetch_array($result1))
								  {  
								    echo '<tr>';
                                      	echo '<td><input required type = "radio" name = "Ret_ID" value = '.$row1['Flight_ID'].'></td>';
										echo '<td>'.$row1['Flight_ID'].'</td>';										
								        echo '<td>'.$row1['Location'].'</td>';
								        echo '<td>'.$row1['Destination'].'</td>';
								        echo '<td>'.$row1['R_Date'].'</td>';
								        echo '<td>'.$row1['D_Time'].'</td>';
                                        echo '<td>'.$row1['A_Time'].'</td>';
										echo '<td>'.$row1['Fly_Price'].'</td>';
								    echo '</tr>';
								  }
                                  echo '</table>';
								}
								else {
									echo "Sorry, flights for this day are either sold out or unavailable. Please choose another date, or search again.";
								}
								}
								else{
									//blank
								}
								echo '<input required type = "hidden" name = "adult" value = '.$AQ.'>';
								echo '<input required type = "hidden" name = "child" value = '.$CQ.'>';	
								echo '</br> </br><input type="submit" name = "submit1" value="Proceed" />';
								
								}
echo '</form>';
?>
    </section>
	<!-- /Section: intro -->

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<div class="wow shake" data-wow-delay="0.4s">
					<div class="page-scroll marginbot-30">
						<a href="#intro" id="totop" class="btn btn-circle">
							<i class="fa fa-angle-double-up animated"></i>
						</a>
					</div>
					</div>
					<p>&copy; CALM FLIGHTS 2017</p>
                    <div class="credits">
                        <!-- 
                            All the links in the footer should remain intact. 
                            You can delete the links only if you purchased the pro version.
                            Licensing information: https://bootstrapmade.com/license/
                            Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Squadfree
                        -->
                        
                    </div>
				</div>
			</div>	
		</div>
	</footer>
	<!--Start Modal -->
	<div id="signupForm" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"><center>SIGN-UP</h4>
				</div>

				<div class="modal-body">
					<form method="POST" action="signup.php">

						<div class="form-group">
							<label for="usr">First Name:</label>
							<input required type="text" class="form-control" name="fname">
						</div>

						<div class="form-group">
							<label for="usr">Last Name:</label>
							<input required type="text" class="form-control" name="lname">
						</div>

						<div class="form-group">
							<label for="usr">Email Address:</label>
							<input required type="email" class="form-control" name="email">
						</div>

						<div class="form-group">
							<label for="usr">Password:</label>
							<input required type="password" id="pass" class="form-control" name="pwd">
						</div>

						<div class="form-group">
							<label for="usr">Confirm Password:</label>
							<input required type="password" id="repass" class="form-control" name="repwd">
						</div>

						<div class="form-group">
							<label id="message"></label>
						</div>

						<div class="form-group">
							<label for="usr">Captcha:</label> <br>
							<center><img src="captcha.php" /></center> 
						</div>

						<div class="form-group">
							<input required type="text" class="form-control" name="txtCaptcha" value="" placeholder="Enter the number you see in the image" />
						</div>
						<center><input type="submit" name="register" class="btn btn-success" value="Get Started !">
					</form>
				</div>

			</div>

		</div>
	</div>
	<!--End Modal -->

	<!--Start Modal -->
	<div id="loginForm" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"><center>LOG-IN</h4>
				</div>

				<div class="modal-body">
					<form method="POST" action="login.php">

						<div class="form-group">
							<label for="usr">Email Address:</label>
							<input required type="email" class="form-control" name="email">
						</div>
						<div class="form-group">
							<label for="usr">Password:</label>
							<input required type="password" class="form-control" name="pwd">
						</div>
						<div class="form-group">
							<a href = "forgot.php">Forgot Password?</a>
							
						</div>
						<CENTER><input type="submit" class="btn btn-success" value="Log In">
					</form>
				</div>

				
			</div>

		</div>
	</div>
	<!--End Modal -->

    <!-- Core JavaScript Files -->
	
    <script src="js/jquery.min.js"></script>
	<script src="datepicker/js/bootstrap-datepicker.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>	
	<script src="js/jquery.scrollTo.js"></script>
	<script src="js/wow.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.js"></script>
	
	<script>

function ShowHideDiv() {
    var chkYes = document.getElementById("chkYes");
    var dvPassport = document.getElementById("dvPassport");
	dvPassport.style.display = chkYes.checked ? "block" : "none";
}

function disableBtn() {
      document.getElementById("dpd1").required = true;
      document.getElementById("dpd2").required = false;
}

function enableBtn() {
      document.getElementById("dpd1").required = true;
       document.getElementById("dpd2").required = true;
}

function enable() {
      document.getElementById("dpd2").disabled = false;
}
var nowTemp = new Date();
var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
 
var checkin = $('#dpd1').datepicker({
  onRender: function(date) {
    return date.valueOf() < now.valueOf() ? 'disabled' : '';
  }
}).on('changeDate', function(ev) {
  if (ev.date.valueOf() > checkout.date.valueOf()) {
    var newDate = new Date(ev.date)
    newDate.setDate(newDate.getDate() + 1);
    checkout.setValue(newDate);
  }
  checkin.hide();
  $('#dpd2')[0].focus();
}).data('datepicker');
var checkout = $('#dpd2').datepicker({
  onRender: function(date) {
    return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
  }
}).on('changeDate', function(ev) {
  checkout.hide();
}).data('datepicker');



$('#pass, #repass').on('keyup', function () {
  if ($('#pass').val() == $('#repass').val()) {
    $('#message').html('Matching').css('color', 'green');
  } else 
    $('#message').html('Not Matching').css('color', 'red');
});


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

//|| $.trim($("#txtCaptcha").val()) === "<?= $_SESSION['captcha_text'] ?>"
</script> <!-- -->
    
</body>

</html>
