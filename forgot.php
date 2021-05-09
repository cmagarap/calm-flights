<?php 
    # Reset your password form, sends reset.php password link
    include_once ('db_connect.php');
    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {   
        $email = $_POST['email'];
        $result = mysqli_query($db_connect, "SELECT * FROM users WHERE email = '$email'");
        if(mysqli_num_rows($result) == 0) { # User doesn't exist  
            echo "User with that email doesn't exist!";
            
        }
        else { # User exists (num_rows != 0)
            $user = mysqli_fetch_assoc($result);
            $email = $user['email'];
            $code = $user['code'];
            $first_name = $user['fname'];

            # Session message to display on success.php
            echo "<p>Please check your email <span>$email</span>"
            . " for a confirmation link to complete your password reset!</p>";

            include('send_passreset.php');
            # header("location: success.php");
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Reset Your Password</title>
    </head>

    <body>
        <div class="form">
            <h1>Reset Your Password</h1>
            <form action="forgot.php" method="post">
                <div class="field-wrap">
                    <label>Email Address<span class="req">*</span></label>
                    <input type="email"required autocomplete="off" name="email"/>
                </div>
                <button class="button button-block"/>Reset</button>
            </form>
        </div>

        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="js/index.js"></script>
    </body>
</html>