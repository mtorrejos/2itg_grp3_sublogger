<?php
    session_start();
    require_once "init.php";

    try { mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME); }
    catch(Exception $e) { 
        $con = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS);
        $sql = "CREATE DATABASE IF NOT EXISTS sublogger";
        $con->query($sql);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sublogger</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>

    <div class="banner-area">
        <div class="wrapper">
            <div class="navigation">
                <div class="logo">
                    Sublogger
                </div>
                <?php
                    if(isset($_SESSION['loggedin'])) {
                    }
                    else {
                        echo '<nav>
                        <a href="#">Log In</a>
                        <a href="#">Sign Up</a>
                        </nav>';
                    }
                ?>
            </div>
            <div class="banner-text">
                <div class="text-area">
                    <h2>sublogger</h2>
                    <p>description..</p>
                    <?php
                        if(isset($_SESSION['loggedin'])) {
                        }
                        else {
                            echo '<a href="#">Log In</a>
                            <a href="register.php">Register</a>';
                        }
                    ?>
                </div>
            </div>
        </div>    
    </div>
</body>
</html>