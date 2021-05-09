<?php
include_once("db_connect.php");
$code = $_GET['code'];

$result = mysqli_query($db_connect,"UPDATE users SET active = 1 where code = '$code'");

//print_r($code);

if($result){
    echo "<script>alert('Successfully activated your account!');";
    echo 'window.location.href="index.php" </script>';
}
else{
    echo "<script>alert('Failed to activate your account!') ;" . mysqli_error($db_connect);
    echo 'window.location.href="index.php" </script>';
}

?>