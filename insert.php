<?php
include("db_connect.php");
require 'PHPMailer/PHPMailerAutoload.php';
session_start();
if(isset($_POST['btn_submit'])){
$Adult_Price = $_POST['Adult_Price'];
$Child_Price = $_POST['Child_Price'];
$H_days = $_POST['H_days'];
$D_Loc = $_POST['D_Loc'];
$D_Dest = $_POST['D_Dest'];
$D_LT = $_POST['D_LT'];
$D_AT = $_POST['D_AT'];
$D_Date = $_POST['D_Date'];
$D_Price = $_POST['D_Price'];
$R_Loc = $_POST['R_Loc'];
$R_Dest = $_POST['R_Dest'];
$R_LT = $_POST['R_LT'];
$R_AT = $_POST['R_AT'];
$R_Date = $_POST['R_Date'];
$R_Price = $_POST['R_Price'];
$Adult_Count = $_POST['Adult_Count'];
$Child_Count = $_POST['Child_Count'];
$Total_Person_Price = $_POST['Total_Person_Price'];
$H_Name = $_POST['H_Name'];
$Days_Booked = $_POST['Days_Booked'];
$Total_Hotel_Price = $_POST['Total_Hotel_Price'];
$Transpo_Type = $_POST['Transpo_Type'];
$Transpo_Price = $_POST['Transpo_Price'];
$Food_Pckg = $_POST['Food_Pckg'];
$Food_Price = $_POST['Food_Price'];
$TPrice = $_POST['TPrice'];
$H_Price = $_POST['H_Price'];
$ID = $_SESSION['id'];

$query = "INSERT INTO trans_table (Customer_ID,D_Loc,D_Dest,D_LT,D_AT,D_Date,D_Price,R_Loc,R_Dest,R_LT,R_AT,R_Date,R_Price,Adult_Count,Child_Count,Total_Person_Price,H_Name,Days_Booked,Total_Hotel_Price,Transpo_Type,Transpo_Price,Food_Pckg,Food_Price,Total_Price) 
VALUES ('$ID','$D_Loc','$D_Dest','$D_LT','$D_AT','$D_Date','$D_Price','$R_Loc','$R_Dest','$R_LT','$R_AT','$R_Date','$R_Price','$Adult_Count','$Child_Count','$Total_Person_Price','$H_Name','$Days_Booked','$Total_Hotel_Price','$Transpo_Type','$Transpo_Price','$Food_Pckg','$Food_Price','$TPrice')";
$result = mysqli_query($db_connect,$query) or die(mysqli_error($db_connect));

if($R_Loc != NULL){
$table = "
<table border = '0'> 
<tr>
<th><h2> Departure </h2></th>
<th><h2> Returning </h2></th>
<th><h2> Persons </h2></th>
<th><h2> Hotel </h2></th>
<th><h2> Transportation </h2></th>
<th><h2> Food </h2></th>
</tr>
<tr>
<td>Location:$D_Loc</td> 
<td>Location:$R_Loc</td>
<td>Adult Count:$Adult_Count</td>  
<td>Hotel Name:$H_Name</td>
<td>Tranportation Type:$Transpo_Type</td>
<td>Food Package: $Food_Pckg </td>
</tr>
<tr>
<td>Destination:$D_Dest</td> 
<td>Destination:$R_Dest</td>
<td>Child Count:$Child_Count</td>  
<td> Price per day:$H_Price </td>
<td> Transportation Price:$Transpo_Price</td>
<td> Food Package Price:$Food_Price</td>
</tr>
<tr>
<td>Leaving Time:$D_LT</td> 
<td>Leaving Time:$R_LT </td> 
<td>Price Per Adult:$Adult_Price</td>  
<td> Days booked:$H_days</td>
</tr>
<tr>
<td>Arriving Time:$D_AT</td> 
<td>Arriving Time:$R_AT</td> 
<td>Price Per Child:$Child_Price</td>  
<td> Total Hotel Price:$Total_Hotel_Price</td>
</tr>
<tr>
<td>Departure Date:$D_Date</td> 
<td>Return Date:$R_Date </td>
<td>Total Person Price:$Total_Person_Price</td>  

</tr>
<tr>
<td>Departure Price:$D_Price</td> 
<td>Returning Price:$R_Price</td>
</tr>
</table>
<br><br>
<table border = '0'>
<tr>
<th><h2>Total Price: $TPrice</h2> </th>
</tr>
</table>";
}
else{
$table = "
<table border = '0'>
<tr>
<th><h2> Departure </h2></th>
<th><h2> Persons </h2></th>
<th><h2> Hotel </h2></th>
<th><h2> Transportation </h2></th>
<th><h2> Food </h2></th>
</tr>
<tr>
<td>Location:$D_Loc</td>
<td>Adult Count:$Adult_Count</td>  
<td>Hotel Name: $H_Name</td>
<td>Tranportation Type:$Transpo_Type</td>
<td>Food Package:$Food_Pckg</td>
</tr>
<tr>
<td>Destination:$D_Dest</td>
<td>Child Count:$Child_Count</td>
<td> Days booked:$H_days</td>
<td> Transportation Price:$Transpo_Price</td>
<td> Food Package Price:$Food_Price</td>
</tr>
<tr>
<td>Leaving Time: $D_LT</td>
<td>Price Per Adult :$Adult_Price</td>  
<td> Price per day:$H_Price</td>
</tr>
<tr>
<td>Arriving Time: $D_AT</td>
<td>Price Per Child :$Child_Price</td>  
<td> Total Hotel Price: $Total_Hotel_Price </td>
</tr>
<tr>
<td>Depature Date: $D_Date</td>
<td>Total Person Price :$Total_Person_Price</td>  
</tr>
<tr>
<td>Departure Price: $D_Price </td> 
</tr>
</table>
<br><br>
<table border = '0'>
<tr>
<th><h2>Total Price:$TPrice</h2> </th>
</tr>
</table>";
}
}

$mail = new PHPMailer(); 
$mail->IsSMTP(); 
$mail->SMTPAuth = true; 
$mail->SMTPSecure = 'ssl'; // 
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "veocalimlim@gmail.com";
$mail->Password = "elevenunitedcrowns";

$mail->setFrom('veocalimlim@gmail.com', 'CALM Flights');
$mail->addAddress($_SESSION['email'], $_SESSION['fname'] . " ". $_SESSION['lname']);
$mail->Subject  = 'CALM Flights Account Activation';

$mail->Body     = 'Thank you for reserving with CALM Flights! Here are the details of your reserved flight! <br><br>'.$table ;

if(!$mail->send()) {
  echo 'Message was not sent.';
  echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
  echo "<script>alert('Your schedule has been reserved! Please check your email.');</script>";
}

header("Location: index.php");

?>
