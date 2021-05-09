<?php
    # Password reset process, updates database with new user password
    include ('db_connect.php');
    session_start();

    # Make sure the form is being submitted with method="post"
    if($_SERVER['REQUEST_METHOD'] == 'POST') { 
        # Make sure the two passwords match
        if($_POST['newpassword'] == $_POST['confirmpassword']) { 
            $new_password = md5($_POST['newpassword']);
            # $_POST['email'] and $_POST['hash'] from the hidden input field of reset.php form
            $email = ($_POST['email']);
            $code = ($_POST['code']);
            
            $sql = "UPDATE users SET password = '$new_password', code = '$code' WHERE email = '$email'";

            if(mysqli_query($db_connect, $sql)) {
                echo "<script>Your password has been reset successfully!</script>";
                header("location: index.php");    
            }
        }
        else {
            echo "<script>alert('Two passwords you entered don't match, try again!')</script>";
                
        }
    }
?>