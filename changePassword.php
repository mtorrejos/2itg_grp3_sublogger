<?php 
    session_start();
    require_once "connection/connection.php";
    $con = connection();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $password = getPassword($_SESSION['email']); //to check
        $typedPassword = $_POST['password'];
        $newPassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT); //to store
        $passErr = false;
        
        if(isset($typedPassword)) { 
            if (password_verify($typedPassword, $password)) {
                $sql = "UPDATE users SET user_Password = '$newPassword' WHERE user_Email = '{$_SESSION['email']}';";
                $con->query($sql);
                header("Location: profile.php");
            }
            else {
                $passErr = true;
                $passErrMsg = "Incorrect Password";
            }
        }
        echo '<script>alert("'; echo $typedPassword ." ". $password." ".$_SESSION['email']; echo'")</script>';
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
    <title>Edit Profile</title>
</head>
<body>
    <?php require_once("headerAndFooter/navbarWithAccount.php"); ?>

    <div style="padding-top:110px; height:215px;" class="section3">
        <label class="center title profileTitle" style="filter: drop-shadow(2px 2px 20px rgba(0,0,0,0.3)) drop-shadow(-2px -2px 20px rgba(0,0,0,0.3)); padding:0;">Change Password</label>
    </div>
    <form name="changePassword" id="changePassword" method="POST">
    <div class="profileDetails editProfileDetails" style="display:block; margin-left:auto; margin-right:auto; width:auto; position:relative; top:0px; width:50%;">
        <div class="row" style="margin-top:5px; margin-bottom:5px;">
            <div class="col-lg-5">
                <label for="firstname" class="form-label profileLabel" style="padding:0; margin-top:15px; margin-bottom:0;">Type your old password:<span style="color:#f04148; padding-left:10px;">*</span></label>
                <span class="editProfileSpan">
                <?php if(isset($typedPassword) && $passErr==true) {echo $passErrMsg;} ?></span></label>
                </span>
            </div>
            <div class="col-lg-7">
                <input type="password" class="form-control textbox-blue editProfileTextbox" style="margin-top:8px;" id="password" name="password" required>
            </div>
        </div>
        <div class="row" style="margin-top:5px; margin-bottom:5px;">
            <div class="col-lg-5">
                <label for="lastname" class="form-label profileLabel" style="padding:0; margin-top:15px; margin-bottom:0;">New Password:<span style="color:#f04148; padding-left:10px;">*</span></label>
            </div>
            <div class="col-lg-7">
                <input type="password" class="form-control textbox-blue editProfileTextbox" style="margin-top:8px;" id="newPassword" name="newPassword" required>
            </div>
        </div>
        <div class="contentButton" style="padding-top:30px;">
            <a href="profile.php" target="_self" style="color: rgb(0, 0, 0); text-decoration: none; width: 300px;"><input type="submit" class="btn btn-primary btn-md btnMid btnProfile center" id="btnEditProfile" name="btnEditProfile" value="Save"></a>
        </div>
        <a href="profile.php" style="text-align:center; color:#2e3192; text-decoration:none; width:80%;" class="center link">Cancel</a>
    </div>
    </form>
    <div style="padding-bottom: 20px;"></div>
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