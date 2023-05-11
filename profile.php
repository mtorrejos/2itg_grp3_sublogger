<?php 
    session_start();
    require_once "connection/connection.php";
    $con = connection();
    createSubTable($_SESSION['email']);
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
    <title>Profile</title>
</head>
<body>
    <?php require_once("headerAndFooter/navbarWithAccount.php"); ?>
    <div style="padding-top:110px; height:215px;" class="section3">
        <label class="center title profileTitle" style="filter: drop-shadow(2px 2px 20px rgba(0,0,0,0.3)) drop-shadow(-2px -2px 20px rgba(0,0,0,0.3)); padding:0;">First Name Last Name</label>
    </div>
    <div class="profileDetails" style="display:block; margin-left:auto; margin-right:auto; width:auto; position:relative; top:-50px;">
        <label for="email" class="form-label profileLabel">Email Address:</label>
        <label for="text" class="form-label profileValue" id=email name=email>irarayzelji@gmail.com</label> <br>
        <label for="text" class="form-label profileLabel">Password:</label>
        <label for="password" class="form-label profileValue" id=password name=password>some password here</label> <br>
        <label for="text" class="form-label profileLabel">Email Reminder Frequency:</label>
        <label for="text" class="form-label profileValue" id=text name=text>once a month</label> <br>
        <label for="text" class="form-label profileLabel">Email Survey Frequency:</label>
        <label for="text" class="form-label profileValue" id=text name=text>once a month</label> <br>

        <div class="contentButton" style="padding-top:30px;">
            <a href="editProfile.php" target="_self" style="color: rgb(0, 0, 0); text-decoration: none; width: 300px;"><input type="button" class="btn btn-primary btn-md btnMid btnProfile center" id="btnReg" name="btnReg" value="Edit"></a>
        </div>
    </div>
    
    <?php require_once("headerAndFooter/footer.php"); ?>

    <!--Turning password into asterisks-->
    <script>
        var pass= document.getElementById("password").innerHTML;
        var char = pass.length;
        var password ="";
        for (i=0;i<char;i++) {
            password += "*"; }
        document.getElementById("password").innerHTML = password;
    </script>
</body>
</html>