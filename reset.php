<?php
    # The password reset form, the link to this page is included from the forgot.php email message
    include_once ('db_connect.php');
    session_start();

    # Make sure email and hash variables aren't empty
    if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['code']) && !empty($_GET['code'])) {
        $email = ($_GET['email']); 
        $code = ($_GET['code']); 
        # Make sure user email with matching hash exist
        $result = mysqli_query($db_connect, "SELECT * FROM users WHERE email = '$email' AND code = '$code'");
        if (mysqli_num_rows($result) == 0 ) { 
            echo "You have entered invalid URL for password reset!";
            #header("location: error.php");
        }
    }
    else {
        echo "Sorry, verification failed, try again!";
        #header("location: error.php");  
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Reset Your Password</title>
        <link rel = "icon" href = "logo.png">
        <?php # include 'css/css.html'; ?>
    </head>

    <body>
        <div class = "form">
            <h1>Choose Your New Password</h1>  
                <form action = "reset_password.php" method = "post">  
                    <div class = "field-wrap">
                        <label>New Password<span class = "req">*</span></label>
                        <input type = "password"required name = "newpassword" autocomplete = "off"/>
                    </div>
                    <div class = "field-wrap">
                        <label>Confirm New Password<span class = "req">*</span></label>
                        <input type = "password"required name = "confirmpassword" autocomplete = "off"/>
                    </div>
                    <!-- This input field is needed, to get the email of the user -->
                    <input type = "hidden" name = "email" value = "<?= $email ?>">    
                    <input type = "hidden" name = "code" value = "<?= $code ?>">
                    <button class="button button-block"/>Apply</button>
              </form>
        </div>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="js/index.js"></script>
    </body>
</html>
