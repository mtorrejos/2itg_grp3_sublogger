<?php
    session_start();
    require_once "connection/connection.php";
    $con = connection();
    $email = $_SESSION['email'];
    $_SESSION['subName'] = $_GET['subName'];
    $subName = $_SESSION['subName'];
    $sql = "DELETE FROM `$email` WHERE sub_Name = '$subName';";
    $con->query($sql);

    if($_SERVER['REQUEST_METHOD'] == 'GET') {
        if(isset($_GET['sortAccordingTo']) && isset($_GET['order'])) {
            $_SESSION['sortAccordingTo'] = $_GET['sortAccordingTo'];
            $_SESSION['order'] = $_GET['order'];
            $sortAccordingTo = $_SESSION['sortAccordingTo'];
            $order = $_SESSION['order'];
            //echo '<script>alert("sort1: '.$_GET['sortAccordingTo'].' order1: '.$_GET['order'].'</script>';
        }
    }

    if(isset($sortAccordingTo) && isset($order)) {
        $link = 'homepageSorted.php?sortAccordingTo='.$sortAccordingTo.'&order='.$order;
    } else {
        $link = 'homepage.php';}
    header("Location: $link");
?>