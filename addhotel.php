<?php
include('db_connect.php');
echo '
<form method = post action = "addhotel.php" enctype="multipart/form-data">
Hotel Location:  <select name="Hotel_Location" >
      <option disabled value="default" selected="selected" >Select Hotel Location</option>
                    <option>Bohol</option>
				  <option>Boracay</option>
				  <option>Butuan</option>
				  <option>Cotabato</option>
				  <option>Davao</option>
    </select>
</br></br>
Hotel Name: <input type = "text" name = "Hotel_Name"> </br> </br>
 Hotel Price: <input type = "number" name ="Hotel_Price" min = "1"> </br> </br>
 Hotel Image: <input name="uploadedimage" type="file"> </br> </br>
 <input type = "Submit" value = "Submit" name = "ok">
    </form>
    <a href="addret.php">Go to adding of Return Schedules</a> </br>
     <a href="adddepart.php">Go to adding of Depart Schedules</a> </br>
 ';
if(isset($_POST['ok'])){
$H_Loc=$_POST['Hotel_Location'];
$H_Name=$_POST['Hotel_Name'];
$H_Price=$_POST['Hotel_Price'];
 function GetImageExtension($imagetype){
       if(empty($imagetype)) return false;
       switch($imagetype)
       {
           case 'image/bmp': return '.bmp';
           case 'image/gif': return '.gif';
           case 'image/jpeg': return '.jpg';
           case 'image/png': return '.png';
           default: return false;
       }
     }

    if (!empty($_FILES["uploadedimage"]["name"])) {
        
        $file_name=$_FILES["uploadedimage"]["name"];
       
        $temp_name=$_FILES["uploadedimage"]["tmp_name"];
        
        $imgtype = $_FILES["uploadedimage"]["type"];
        

        $ext = GetImageExtension($imgtype);
        $imagename = date("d-m-Y")."-".time();//.$ext;
        
        $target_path = "images/".$imagename.$ext;

        //var_dump($_FILES["uploadedimage"]);die();

        if(move_uploaded_file($temp_name, $target_path)) {
        $insert = "INSERT INTO hotel (H_Loc,H_Name,H_Price,H_Image)  VALUES ('$H_Loc','$H_Name','$H_Price','$target_path')";
        $query = mysqli_query($db_connect,$insert) or die(mysqli_error($db_connect));
        }
        else{
            exit("Error While uploading image on the server");
        }
    }
}
?>