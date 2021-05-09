<?php
include_once("db_connect.php");
session_start();

$email = $_POST['email'];
$pwd = $_POST['pwd'];
$qry = "SELECT * FROM users WHERE email = '$email' AND password = '".md5($pwd)."' AND active = 1";
$result = mysqli_query($db_connect, $qry);
//print_r($result);die();

if($result){
    while($row = mysqli_fetch_array($result)){
        $_SESSION['id'] = $row['id'];
        $_SESSION['fname'] = $row['fname'];
        $_SESSION['lname'] = $row['lname'];
        $_SESSION['status'] = $row['status'];
        $_SESSION['email'] = $row['email'];
    }
    if($_SESSION['status'] == 'admin'){
        header("Location: addret.php");
    }
    else{
        header("Location: index.php");
    }
}
else{
    echo '<script> alert("Enter valid account or activate first!"); ';
    echo 'window.location.href="index.php" </script>';
}
//var_dump($_SESSION['id']);

?>