<?php
session_start();
if(isset($_SESSION['status'] && $_SESSION['active'] == 1)){

}
else{
    echo '<script> alert("You must log in first!"); ';
    echo 'window.location.href="index.php" </script>';
}

?>