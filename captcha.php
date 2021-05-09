<?php
    session_start();
 
    // Generate Random Number
    $random_number =  rand(1,9).rand(1,9).rand(1,9);
    $_SESSION['captcha_text'] = $random_number;
 
    // Insert random number into image

    
    $captcha_image = imagecreatefromjpeg("captcha.jpg");
    $font_color = imagecolorallocate($captcha_image, 0, 0, 0);
    imagestring($captcha_image, 5, 20, 5, $random_number, $font_color);
    imagejpeg($captcha_image);
    imagedestroy($captcha_image);
?>