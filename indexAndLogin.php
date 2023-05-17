<?php 
    session_start();
    require_once "connection/connection.php";
    connection();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passErr = false;
        $emailErr = false;

        if(isset($email) && isset($password)) { 
            if(checkAccount($email) <= 0) { //change this to be more in line with the visuals
                $emailErr = true;
                $emailErrMsg = "Account not found!"; //echo '<script>alert("Account not found!")</script>';
            }
            else {
                if (password_verify($password, getPassword($email))) { //if (getPassword($email) === $password)
                    $_SESSION['email'] = $email;
                    header("Location: homepage.php");
                }
                else {
                    $passErr = true;
                    $passErrMsg = "Incorrect Password"; //echo '<script>alert("Incorrect Password")</script>';
                }
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap CSS & JS CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.1/css/all.css">
    <!-- FAVICON -->
    <link rel="icon" href="img/SubLogger_Logo.png" type="image/gif" sizes="16x16">
    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="css/mainStyle.css">
    <title>SubLogger</title>
</head>
<body>
    <?php require_once("headerAndFooter/navbarWithLogin.php"); ?>
    <div>
    <div class="row">
        <div class="col-xxl-6 section1">
            <div class="indexh1div">
                <h1 class="indexh1">Tired of remembering your subscription dues? SubLogger is here to help you track your subscriptions effortlessly!</h1>
                <br><br>
                <ul class="indexul">
                <table>
                    <tr><td><img src="img/Listitem1_Icon.png"></td><td><li class="indexli">Track your subscriptions</li></td></tr>
                    <tr><td><img src="img/Listitem2_Icon.png"></td><td><li class="indexli">Get notified for your dues</li></td></tr>
                    <tr><td><img src="img/Listitem3_Icon.png"></td><td><li class="indexli">Encrypts important data</li></td></tr>
                    <tr><td><img src="img/Listitem4_Icon.png"></td><td><li class="indexli">Organize and edit your subscriptions</li></td></tr>
                    <tr><td><img src="img/Listitem5_Icon.png"></td><td><li class="indexli">Customize frequency of notifications</li></td></tr>
                </table>
                </ul>
            </div>
        </div>
        <div class="col-xxl-6 sectionLogin" style="padding-top:170px;">
            <img src="img/SubLogger_Logo.png" class="center loginLogo" style="width: 200px; height: 200px;">
            <label class="center title">Login to SubLogger</label>
            <form name="login" id="login" method="POST" class="center indexforms">
                <div class="mb-3">
                    <label for="email" class="form-label" style="font-size:18px;">Email Address<span style="color:#f04148; padding-left: 50px;">
                    <?php if(isset($email) && isset($password) && $emailErr==true) {echo $emailErrMsg; }?>
                    </span></label>
                    <input type="email" class="form-control textbox-blue" id="email" name="email" required>
                </div>
                <div class="mb-3" style="padding-top:20px;">
                    <label for="password" class="form-label" style="font-size:18px;">Password<span style="color:#f04148; padding-left: 50px;">
                    <?php if(isset($email) && isset($password) && $passErr==true) {echo $passErrMsg; }?>
                    </span></label>
                    <input type="password" class="form-control textbox-blue" id="password" name="password" required>
                </div>
                <div class="contentButton">
                    <a href="homepage" target="_self" style="color: rgb(0, 0, 0); text-decoration: none; width: 300px;"><input type="submit" class="btn btn-primary btn-md btnMid center" id="btnLogin" name="btnLogin" value="Login"></a>
                </div>
                <a href="register.php" style="text-align:center; color:#2e3192; text-decoration:none; width:80%;" class="center link">No account yet? Register now.</a>
            </form>
            <div style="padding-bottom: 100px;"></div>
        </div>
    </div>
    </div>
    <?php require_once("headerAndFooter/footer.php"); ?>
</body>
</html>