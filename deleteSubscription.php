<?php
    session_start();
    require_once "connection/connection.php";
    $con = connection();
    $email = $_SESSION['email'];
    $_SESSION['subName'] = $_GET['subName'];
    $subName = $_SESSION['subName'];
    $sql = "DELETE FROM `$email` WHERE sub_Name = '$subName';";
    $con->query($sql); 
    header("Location: homepage.php");
?>